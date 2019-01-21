<?php

namespace app\utils;


class RetUtil extends BaseUtil {
    
    private static function _ret($success, $data, $msg, $debug) {
        return [
            'success' => $success,
            'data'    => $data,
            'msg'     => $msg,
            'debug'   => $debug,
        ];
    }
    
    public static function success($data = [], $msg = '', $debug = []) {
        return self::_ret(true, $msg, $data, $debug);
    }
    
    public static function fail($msg = '', $data = [], $debug = []) {
        return self::_ret(false, $msg, $data, $debug);
    }
    
    public static function retList($list, $total, $page_size = DEFAULT_PAGE_SIZE) {
        $result['list']      = $list;
        $result['total']     = $total;
        $result['pageTotal'] = ceil($total / $page_size);
        return $result;
    }
}
