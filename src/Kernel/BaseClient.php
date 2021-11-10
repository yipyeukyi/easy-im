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
    use HttpClient;
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
     * @param $message
     * @param $request
     * @param $response
     */
    public function requestLog($message, $request, $response)
    {
        BaseClient::$request_log && $this->app->logger->debug($message, ['request' => $request, 'response' => $response]);
    }
}
