<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 15:08
 */

namespace whereof\easyIm\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use whereof\Logger\Logger;

/**
 * Class BaseClient.
 *
 * @author zhiqiang
 */
class BaseClient
{
    /**
     * @var bool
     */
    public static $request_log = false;
    /**
     * @var ServiceContainer
     */
    protected $app;
    /**
     * @var array
     */
    protected $config = [];

    /**
     * BaseClient constructor.
     *
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app    = $app;
        $this->config = $app->getConfig();
    }

    /**
     * @param string $url
     * @param array $query
     * @param array $headers
     *
     * @return string
     * @throws GuzzleException
     *
     */
    protected function httpGet(string $url, array $query = [], array $headers = [])
    {
        $options = [
            'headers' => $headers,
            'query'   => $query,
        ];

        return $this->httpRequest('GET', $url, $options);
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return string
     * @throws GuzzleException
     *
     */
    protected function httpPost(string $url, array $params = [], array $headers = [])
    {
        $options = [
            'headers'     => $headers,
            'form_params' => $params,
        ];

        return $this->httpRequest('POST', $url, $options);
    }

    /**
     * @param string $url
     * @param array $params
     * @param array $headers
     *
     * @return string
     * @throws GuzzleException
     *
     */
    protected function httpPostJson(string $url, array $params = [], array $headers = [])
    {
        $options = [
            'headers' => $headers,
            'json'    => $params,
        ];

        return $this->httpRequest('POST', $url, $options);
    }

    /**
     * @param $method
     * @param $url
     * @param $options
     *
     * @return string
     * @throws GuzzleException
     *
     */
    protected function httpRequest($method, $url, $options)
    {
        $output = $this->httpClient()->request($method, $url, $options);
        $resp   = $output->getBody()->getContents();
        $this->log($method . ':' . $url, ['request' => $options, 'response' => $resp]);

        return $resp;
    }

    /**
     * @return Client
     */
    protected function httpClient()
    {
        return new Client($this->config['http'] ?? []);
    }

    /**
     * @param $message
     * @param array $context
     */
    protected function log($message, $context = [])
    {
        $conf = array_merge($this->config['log'] ?? [], [
            'logfile' => './.runtime/easy-im.log',
        ]);
        BaseClient::$request_log && Logger::File($conf)->debug($message, $context);
    }
}
