<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 16:14
 */

namespace whereof\easyIm\Tencent;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class TencentProvider.
 *
 * @author zhiqiang
 */
class TencentProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $app
     */
    public function register(Container $app)
    {
        // TODO: Implement register() method.
        $app['request'] = function ($app) {
            return new Request\TencentClient($app);
        };
    }
}
