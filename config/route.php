<?php


use Trink\Core\Helper\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'api/v1/product', 'dawn/api/goods'),
    RouteRule::base(/*用户*/ 'api/v1/user', 'dawn/api/user'),
    [
        RouteRule::get('api/test', 'api/test'),
    ]
);
