<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:27
 */

namespace whereof\easyIm\Jiguang;

use whereof\easyIm\Kernel\ServiceContainer;

/**
 * Class AppContainer.
 *
 * @author zhiqiang
 *
 * @property Request\JiguangClient request
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        JiguangProvider::class,
    ];
}
