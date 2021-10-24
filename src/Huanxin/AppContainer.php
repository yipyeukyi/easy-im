<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-17 17:18
 */

namespace whereof\easyIm\Huanxin;

use whereof\easyIm\Kernel\ServiceContainer;

/**
 * Class AppContainer
 * @author zhiqiang
 * @package whereof\easyIm\Huanxin
 * @property Request\HuanxinClient request
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        HuanxinProvider::class,
    ];
}