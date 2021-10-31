<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 18:04
 */

namespace whereof\easyIm\Tests\Tencent;

use whereof\easyIm\Tencent\Request\TencentClient;
use whereof\easyIm\Tests\TestCase;

class RequestTest extends TestCase
{
    public function testAccountImport()
    {
        $app = $this->Tencent();
        $client = $this->mockApiClient(TencentClient::class, $app);
        $params = [
            'Identifier' => 'test',
        ];
        $resp = $client->send('im_open_login_svc/account_import', $params);
        $data = json_decode($resp, true);
        $this->assertIsArray($data);
    }
}
