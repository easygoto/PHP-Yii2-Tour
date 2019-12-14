<?php

use app\web\RouteRule;

return array_merge(
    RouteRule::baseApi(/*商品*/ 'dawn/v1/api/goods', '', ['extra_method' => ['all']]),
    RouteRule::baseApi(/*用户*/ 'dawn/v1/api/user'),
    RouteRule::baseApi(/*菜单*/ 'dawn/v1/api/menu'),

    // page
    RouteRule::basePage(['module' => 'dawn', 'category' => 'page']),

    // spacial api
    [
    ]
);
