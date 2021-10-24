<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 17:44
 */

namespace whereof\easyIm\Tests;


/**
 * Class FactoryTest
 * @author zhiqiang
 * @package whereof\easyIm\Tests
 */
class FactoryTest extends TestCase
{
    public function testHuanxin()
    {
        $app = $this->Huanxin();
        $this->assertInstanceOf(\whereof\easyIm\Huanxin\AppContainer::class, $app);
        $this->assertInstanceOf(\whereof\easyIm\Huanxin\Request\HuanxinClient::class, $app->request);
    }

    public function testJiguang()
    {
        $app = $this->Jiguang();
        $this->assertInstanceOf(\whereof\easyIm\Jiguang\AppContainer::class, $app);
        $this->assertInstanceOf(\whereof\easyIm\Jiguang\Request\JiguangClient::class, $app->request);
    }

    public function testRongCloud()
    {
        $app = $this->RongCloud();
        $this->assertInstanceOf(\whereof\easyIm\RongCloud\AppContainer::class, $app);
        $this->assertInstanceOf(\whereof\easyIm\RongCloud\Request\RongCloudClient::class, $app->request);
    }

    public function testTencent()
    {
        $app = $this->Tencent();
        $this->assertInstanceOf(\whereof\easyIm\Tencent\AppContainer::class, $app);
        $this->assertInstanceOf(\whereof\easyIm\Tencent\Request\TencentClient::class, $app->request);
    }

    public function testYunxin()
    {
        $app = $this->Yunxin();
        $this->assertInstanceOf(\whereof\easyIm\Yunxin\AppContainer::class, $app);
        $this->assertInstanceOf(\whereof\easyIm\Yunxin\Request\YunxinClient::class, $app->request);
    }
}