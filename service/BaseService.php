<?php

namespace app\service;

class BaseService {
    
    public static function success($data='') {
        return ['success' => true, 'data' => $data];
    }
    
    public static function fail($msg='', $debug=[]) {
        return ['sucess' => false, 'msg' => $msg, 'debug' => $debug];
    }
}
