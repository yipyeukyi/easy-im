<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:28
 */

namespace whereof\easyIm\Jiguang\Request;

use CURLFile;
use GuzzleHttp\Exception\GuzzleException;
use whereof\easyIm\Kernel\BaseClient;
use whereof\easyIm\Kernel\Support\Str;

/**
 * Class JiguangClient
 * 极光IM
 * https://www.jiguang.cn/im
 * https://docs.jiguang.cn/jmessage/guideline/jmessage_guide/
 * $config = [
 *   'appKey'       => '',
 *   'masterSecret' => '',
 * ];
 * Class JiguangClient.
 *
 * @author zhiqiang
 */
class JiguangClient extends BaseClient
{
    /**
     * @var string
     */
    public static $host = 'https://api.im.jpush.cn';

    /**
     * @var string
     */
    public static $reportHost = 'https://report.im.jpush.cn';

    /**
     * @param $method
     * @param $action
     * @param array $params
     * @param bool $report
     *
     * @return string
     * @throws GuzzleException
     *
     */
    public function send($method, $action, array $params = [], $report = false)
    {
        $url    = $this->buildHost(Str::removeFristSlash($action), $report);
        $method = strtoupper($method);
        if ($method == 'UPLOAD') {
            return $this->upload($url, $params['file']);
        }
        $options = $this->buildGuzzleOptions();
        if ($method == 'GET') {
            $options['query'] = $params;
        } elseif ($method == 'POST' || $method == 'PUT') {
            $options['json'] = $params;
        }
        $this->config['http']['http_errors'] = false;

        return $this->httpRequest($method, $url, $options);
    }

    /**
     * 资源上传.
     *
     * @param $uri
     * @param $filepath
     *
     * @return bool|string
     */
    private function upload($uri, $filepath)
    {
        $ch      = curl_init();
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_HTTPHEADER     => [
                'Content-Type: multipart/form-data',
                'Connection: Keep-Alive',
            ],
            CURLOPT_USERAGENT      => 'JMessage-Api-easyIm-php-Client',
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
            CURLOPT_USERPWD        => $this->getAuth(),
            CURLOPT_URL            => $uri,
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 0,
        ];
        if (class_exists('\CURLFile')) {
            $options[CURLOPT_SAFE_UPLOAD] = true;
            $options[CURLOPT_POSTFIELDS]  = ['filename' => new CURLFile($filepath)];
        } else {
            if (defined('CURLOPT_SAFE_UPLOAD')) {
                $options[CURLOPT_SAFE_UPLOAD] = false;
            }
            $options[CURLOPT_POSTFIELDS] = ['filename' => '@' . $filepath];
        }
        curl_setopt_array($ch, $options);
        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

    /**
     * @param $action
     * @param bool $report
     *
     * @return string
     */
    private function buildHost($action, $report = false)
    {
        if ($report) {
            return JiguangClient::$reportHost . '/' . $action;
        }

        return JiguangClient::$host . '/' . $action;
    }

    /**
     * @return array
     */
    private function buildGuzzleOptions()
    {
        return [
            'auth'    => [
                $this->config['appKey'],
                $this->config['masterSecret'],
            ],
            'headers' => [
                'Connection'   => 'Keep-Alive',
                'User-Agent'   => 'JMessage-Api-easyIm-php-Client',
                'Content-Type' => 'application/json',
            ],
        ];
    }

    /**
     * @return string
     */
    private function getAuth()
    {
        return $this->config['appKey'] . ':' . $this->config['masterSecret'];
    }
}