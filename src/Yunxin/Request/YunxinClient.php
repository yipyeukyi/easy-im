<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:39
 */

namespace whereof\easyIm\Yunxin\Request;

use GuzzleHttp\Exception\GuzzleException;
use whereof\easyIm\Kernel\BaseClient;
use whereof\easyIm\Kernel\Support\Str;

/**
 * 网易云信 客户端
 * https://yunxin.163.com/
 * https://doc.yunxin.163.com/docs/TM5MzM5Njk/jk3MzY2MTI?platformId=60353.
 *
 * $config = [
 *  'appKey' => '',
 *  'appSecret' => '',
 * ]
 * Class YunxinClient
 * @author zhiqiang
 */
class YunxinClient extends BaseClient
{
    /**
     * @var string
     */
    public static $host = 'https://api.netease.im';

    /**
     * @param $action
     * @param $params
     *
     * @return string
     * @throws GuzzleException
     *
     */
    public function send($action, $params)
    {
        $url     = $this->buildHost(Str::removeFristSlash($action));
        $headers = $this->buildHeaders();

        return $this->httpPost($url, $params, $headers);
    }

    /**
     * @param $action
     *
     * @return string
     */
    public function buildHost($action)
    {
        return YunxinClient::$host . '/' . $action;
    }

    /**
     * @return array
     */
    private function buildHeaders()
    {
        $nonce       = uniqid('easyIm_');
        $curTime     = (string)(time());
        $checkSum    = sha1($this->config['appSecret'] . $nonce . $curTime);
        $http_header = [
            'AppKey'       => $this->config['appKey'],
            'Nonce'        => $nonce,
            'CurTime'      => $curTime,
            'CheckSum'     => $checkSum,
            'Content-Type' => 'application/x-www-form-urlencoded;charset=utf-8',
        ];
        return $http_header;
    }
}