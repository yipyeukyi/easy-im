<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 16:13
 */

namespace whereof\easyIm\Tencent;

use whereof\easyIm\Kernel\ServiceContainer;

/**
 * Class AppContainer
 * @author zhiqiang
 * @package whereof\easyIm\Tencent
 * @property Request\TencentClient request
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        TencentProvider::class,
    ];
}