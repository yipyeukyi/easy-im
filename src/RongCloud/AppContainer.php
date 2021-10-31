<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:33
 */

namespace whereof\easyIm\RongCloud;

use whereof\easyIm\Kernel\ServiceContainer;

/**
 * Class AppContainer.
 *
 * @author zhiqiang
 *
 * @property Request\RongCloudClient request
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        RongCloudProvider::class,
    ];
}
