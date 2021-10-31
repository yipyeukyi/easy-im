<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 18:45
 */

namespace whereof\easyIm\Tests\Jiguang;

use whereof\easyIm\Jiguang\Request\JiguangClient;
use whereof\easyIm\Tests\TestCase;

class RequestTest extends TestCase
{
    public function testUserCreate()
    {
        $app = $this->Jiguang();
        $client = $this->mockApiClient(JiguangClient::class, $app);
        $params = [[
            'username' => 'easy_im',
        ]];
        $resp = $client->send('post', 'users/', $params);
        $data = json_decode($resp, true);
        $this->assertIsArray($data);
    }
}
