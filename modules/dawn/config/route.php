<?php

use app\web\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'dawn/api/goods'),
    RouteRule::base(/*用户*/ 'dawn/api/user'),
    RouteRule::base(/*菜单*/ 'dawn/api/menu'),

    // not restful api
    RouteRule::noRest(['module' => 'dawn', 'category' => 'page']),
    RouteRule::noRest(['module' => 'dawn', 'controller' => 'test']),

    // spacial api
    [
    ]
);
