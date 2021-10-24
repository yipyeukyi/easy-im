<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 17:39
 */

namespace whereof\easyIm\Yunxin\Request;

use GuzzleHttp\Exception\GuzzleException;
use whereof\easyIm\Kernel\BaseClient;

/**
 * 网易云信 客户端
 * https://yunxin.163.com/
 * https://doc.yunxin.163.com/docs/TM5MzM5Njk/jk3MzY2MTI?platformId=60353
 *
 * $config = [
 *  'appKey' => '',
 *  'appSecret' => '',
 * ]
 * Class YunxinClient
 * @author zhiqiang
 * @package whereof\easyIm\Yunxin\Request
 */
class YunxinClient extends BaseClient
{
    /**
     * @var string
     */
    protected $host = 'https://api.netease.im';

    /**
     * @param $action
     * @param $params
     * @return string
     * @throws GuzzleException
     */
    public function send($action, $params)
    {
        $url     = $this->config['host'] ?? $this->host . '/';
        $headers = $this->buildHeaders();
        return $this->httpPost($url . $action, $params, $headers);
    }

    /**
     * @return array
     */
    private function buildHeaders()
    {
        $nonce       = uniqid('easyIm_');
        $curTime     = (string)(time());
        $checkSum    = sha1($this->config['appSecret'] . $nonce . $curTime);
        $http_header = array(
            'AppKey'       => $this->config['appKey'],
            'Nonce'        => $nonce,
            'CurTime'      => $curTime,
            'CheckSum'     => $checkSum,
            'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8'
        );
        return $http_header;
    }
}