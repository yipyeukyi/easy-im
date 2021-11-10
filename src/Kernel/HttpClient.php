<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-11-10 23:33
 */

namespace whereof\easyIm\Kernel;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

trait HttpClient
{
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
        $this->requestLog($method . ':' . $url, $options, $resp);
        return $resp;
    }

    /**
     * @return Client
     */
    protected function httpClient()
    {
        return new Client($this->config['http'] ?? []);
    }
}