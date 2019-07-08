<?php


use Trink\Core\Helper\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'api/v1/product', 'dawn/api/goods'),
    RouteRule::base(/*用户*/ 'api/v1/user', 'dawn/api/user'),

    // not restful api
    RouteRule::noRest(['controller' => 'site']),
    RouteRule::noRest(['module' => 'gen']),

    // spacial api
    [
        RouteRule::get('/', 'site/index'),
        RouteRule::get('api/test', 'api/test'),
    ]
);
