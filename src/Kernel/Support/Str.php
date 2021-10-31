<?php
/*
 * Desc:
 * User: zhiqiang
 * Date: 2021-10-26 00:01
 */

namespace whereof\easyIm\Kernel\Support;

/**
 * Class Str.
 * @author zhiqiang
 */
class Str
{

    /**
     * @param $str
     * @return bool|string
     */
    public static function removeFristSlash($str)
    {
        if (substr($str, 0, 1) === '/') {
            return substr($str, 1);
        }
        return $str;
    }
}
