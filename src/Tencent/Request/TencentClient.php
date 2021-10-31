<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:11
 */

namespace whereof\easyIm\Tencent\Request;

use GuzzleHttp\Exception\GuzzleException;
use whereof\easyIm\Kernel\BaseClient;

/**
 * 腾讯即时通信 IM 客户端
 * https://cloud.tencent.com/product/im
 * https://cloud.tencent.com/document/product/269/.
 *
 * $config = [
 *  'appId' => '',
 *  'identifier' => '',
 *  'secretKey' => '',
 * ];
 *
 * Class Client
 *
 * @author zhiqiang
 */
class TencentClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'https://console.tim.qq.com';

    /**
     * @var string
     */
    protected $version = 'v4';

    /**
     * @var string
     */
    protected $contentType = 'json';

    /**
     * 发送请求
     *
     * @param $action
     * @param $params
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function send($action, $params)
    {
        $url = $this->buildHost($action);

        return $this->httpPostJson($url, $params);
    }

    /**
     * @param string $action
     *
     * @return string
     */
    private function buildHost(string $action)
    {
        $query = http_build_query([
            'sdkappid'    => $this->config['appId'],
            'identifier'  => $this->config['identifier'],
            'usersig'     => $this->userSig(),
            'random'      => mt_rand(0, 4294967295),
            'contenttype' => $this->contentType,
        ]);
        $url = $this->config['host'] ?? $this->host;
        if (strpos($action, $this->version) !== false) {
            $url .= '/'.$action;
        } else {
            $url .= '/'.$this->version.'/'.$action;
        }

        return $url.'?'.$query;
    }

    /**
     * 签名算法生成.
     *
     * @param $expire
     *
     * @return string
     */
    private function userSig($expire = 15552000)
    {
        $curr_time = time();
        $sig_array = [
            'TLS.ver'        => '2.0',
            'TLS.identifier' => strval($this->config['identifier']),
            'TLS.sdkappid'   => intval($this->config['appId']),
            'TLS.expire'     => intval($expire),
            'TLS.time'       => intval($curr_time),
        ];
        $content_to_be_signed = 'TLS.identifier:'.$this->config['identifier']."\n"
            .'TLS.sdkappid:'.$this->config['appId']."\n"
            .'TLS.time:'.$curr_time."\n"
            .'TLS.expire:'.$expire."\n";
        $sig_array['TLS.sig'] = base64_encode(hash_hmac('sha256', $content_to_be_signed, $this->config['secretKey'], true));
        $compressed = gzcompress(json_encode($sig_array));
        $replace = ['+' => '*', '/' => '-', '=' => '_'];

        return str_replace(array_keys($replace), array_values($replace), base64_encode($compressed));
    }
}
