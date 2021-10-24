<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 17:43
 */

namespace whereof\easyIm\Tests;

use GuzzleHttp\Client;
use whereof\easyIm\Factory;

/**
 * Class TestCase
 * @author zhiqiang
 * @package whereof\easyIm\Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @param $name
     * @param $app
     * @return \Mockery\Mock
     */
    public function mockApiClient($name, $app)
    {
        $client = \Mockery::mock($name, [$app])->makePartial();
        $client->allows()->getHttpClient()->andReturn(\Mockery::mock(Client::class));
        return $client;
    }

    /**
     * @return \whereof\easyIm\Huanxin\AppContainer
     */
    public function Huanxin()
    {
        $config = [
            'appKey'       => '',
            'clientId'     => '',
            'clientSecret' => '',
            'orgName'      => '',
            'appName'      => '',
        ];
        return Factory::Huanxin($config);
    }

    /**
     * @return \whereof\easyIm\Jiguang\AppContainer
     */
    public function Jiguang()
    {
        $config = [
            'appKey'       => '',
            'masterSecret' => '',
        ];
        return Factory::Jiguang($config);
    }

    /**
     * @return \whereof\easyIm\RongCloud\AppContainer
     */
    public function RongCloud()
    {
        $config = [
            'appKey'    => '',
            'appSecret' => '',
        ];
        return Factory::RongCloud($config);
    }

    /**
     * @return \whereof\easyIm\Tencent\AppContainer
     */
    public function Tencent()
    {
        $config = [
            'appId'      => '5978322198',
            'identifier' => 'administrator',
            'secretKey'  => 'nfugb53xtlhyfq2kgiriganruyoagh93it1zwysmh2tmj5tnnmuqhd2og5ofktjt',
        ];
        return Factory::Tencent($config);
    }

    /**
     * @return \whereof\easyIm\Yunxin\AppContainer
     */
    public function Yunxin()
    {
        $config = [
            'appKey'    => '',
            'appSecret' => '',
        ];
        return Factory::Yunxin($config);
    }
}