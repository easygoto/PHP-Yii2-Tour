<?php

namespace app\utils;


class CheckUtil extends BaseUtil {
    
    /**
     * @param array $data 待校验的数据
     * @param array $rule_list 校验规则
     * @return array
     */
    public static function verify($data = [], $rule_list = []) {
        $msg_list = [];
        foreach ($rule_list as $field => $rule) {
            if (empty($rule)) {
                continue;
            }
            
            // 需要处理的数据
            $row_data   = self::getTrimValue($data, $field);
            $data_type  = self::getTrimValue($rule, 'type', 'string');
            $data_label = self::getTrimValue($rule, 'label', $field);
            switch ($data_type) {
                default:
                case 'string':
                    if (! trim($row_data)) {
                        $msg_list[$field] = $data_label . '不可为空';
                    }
                    break;
                case 'mobile':
                    if (! trim($row_data)) {
                        $msg_list[$field] = $data_label . '不可为空';
                    }
                    break;
                case 'number':
                    if (! is_numeric($row_data)) {
                        $msg_list[$field] = $data_label . '不是数字格式';
                    }
                    break;
            }
        }
        if (! empty($msg_list)) {
            return RetUtil::fail('', $msg_list);
        } else {
            return RetUtil::success();
        }
    }
}
