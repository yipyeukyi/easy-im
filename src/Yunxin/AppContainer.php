<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-17 17:37
 */

namespace whereof\easyIm\Yunxin;

use whereof\easyIm\Kernel\ServiceContainer;

/**
 * Class AppContainer.
 *
 * @author zhiqiang
 *
 * @property Request\YunxinClient request
 */
class AppContainer extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        YunxinProvider::class,
    ];
}
