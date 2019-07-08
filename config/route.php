<?php


use Trink\Core\Helper\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'dawn/api/goods'),
    RouteRule::base(/*用户*/ 'dawn/api/user'),

    // not restful api
    RouteRule::noRest(['controller' => 'site']),
    RouteRule::noRest(['module' => 'dawn', 'category' => 'page', 'controller' => 'data']),
    RouteRule::noRest(['module' => 'gen']),

    // spacial api
    [
        RouteRule::get('/', 'site/index'),
    ]
);
