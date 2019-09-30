<?php

use app\web\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'dawn/v1/api/goods'),
    RouteRule::base(/*用户*/ 'dawn/v1/api/user'),
    RouteRule::base(/*菜单*/ 'dawn/v1/api/menu'),

    // spacial api
    [
    ]
);
