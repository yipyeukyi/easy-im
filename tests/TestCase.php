<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 17:43
 */

namespace whereof\easyIm\Tests;

use GuzzleHttp\Client;
use whereof\easyIm\Factory;
use whereof\Helper\StrHelper;

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
        $orgName = StrHelper::randString(16, 1);
        $config  = [
            'appKey'       => $orgName . '#demo',
            'clientId'     => StrHelper::randString(26),
            'clientSecret' => StrHelper::randString(31),
            'orgName'      => $orgName,
            'appName'      => 'demo',
        ];
        return Factory::Huanxin($config);
    }

    /**
     * @return \whereof\easyIm\Jiguang\AppContainer
     */
    public function Jiguang()
    {
        $config = [
            'appKey'       => StrHelper::randString(24),
            'masterSecret' => StrHelper::randString(24),
        ];
        return Factory::Jiguang($config);
    }

    /**
     * @return \whereof\easyIm\RongCloud\AppContainer
     */
    public function RongCloud()
    {
        $config = [
            'appKey'    => StrHelper::randString(13),
            'appSecret' => StrHelper::randString(14),
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
            'appKey'    => StrHelper::randString(32),
            'appSecret' => StrHelper::randString(12),
        ];
        return Factory::Yunxin($config);
    }
}