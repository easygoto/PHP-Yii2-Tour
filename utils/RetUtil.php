<?php

namespace app\utils;


class RetUtil {
    
    public static function success($data = '', $debug = []) {
        return ['success' => true, 'data' => $data, 'debug' => $debug];
    }
    
    public static function fail($msg = '', $debug = []) {
        return ['sucess' => false, 'msg' => $msg, 'debug' => $debug];
    }
    
    public static function retList($list, $total, $pageSize = DEFAULT_PAGE_SIZE) {
        $result['list']      = $list;
        $result['total']     = $total;
        $result['pageTotal'] = ceil($total / $pageSize);
        return $result;
    }
}
