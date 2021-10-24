<?php
/*
 * Desc: 
 * User: zhiqiang
 * Date: 2021-10-18 23:25
 */

namespace whereof\easyIm\Kernel\Support;

/**
 * Class Str
 * @author zhiqiang
 * @package whereof\easyIm\Kernel\Support
 */
class Str
{
    /**
     * @return float|int
     */
    public static function microTime()
    {
        return microtime(true) * 10000;
    }

    /**
     * @param null $s
     * @param null $e
     * @param bool $timestamp
     * @return array
     */
    public static function beginEndTime($s = null, $e = null, $timestamp = false)
    {
        $s = $s ?? time();
        $e = $e ?? strtotime(date("Y-m-d H:i:s", strtotime("-7 day")));
        if ($timestamp) {
            return [
                date("Y-m-d H:i:s", $s),
                date("Y-m-d H:i:s", $e)
            ];
        }
        return [$s, $e];
    }
}