<?php

namespace app\service;

class BaseService {
    
    public static function success($data='') {
        return ['success' => true, 'data' => $data];
    }
    
    public static function fail($msg='', $debug=[]) {
        return ['sucess' => false, 'msg' => $msg, 'debug' => $debug];
    }
    
    public static function retList($list, $total, $pageSize = DEFAULT_PAGE_SIZE) {
        $result['list']      = $list;
        $result['total']     = $total;
        $result['pageTotal'] = ceil($total / $pageSize);
        return $result;
    }
}
