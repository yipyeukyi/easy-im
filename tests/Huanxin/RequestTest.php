<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 22:15
 */

namespace whereof\easyIm\Tests\Huanxin;

use whereof\easyIm\Huanxin\Request\HuanxinClient;
use whereof\easyIm\Tests\TestCase;

class RequestTest extends TestCase
{
    public function testGetToken()
    {
        $app = $this->Huanxin();
        $client = $this->mockApiClient(HuanxinClient::class, $app);
        $resp = $client->getToken();
        $data = json_decode($resp, true);
        $this->assertIsArray($data);
    }
}
