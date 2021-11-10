<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 15:14
 */

namespace whereof\easyIm\Kernel;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use whereof\easyIm\Kernel\Clients\CacheClient;
use whereof\easyIm\Kernel\Clients\LoggerClient;

/**
 * Class ServiceProvider.
 *
 * @author zhiqiang
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $app A container instance
     */
    public function register(Container $app)
    {
        $app['cache'] = function ($app) {
            return new CacheClient($app);
        };
        $app['logger'] = function ($app) {
            return new LoggerClient($app);
        };
    }
}
