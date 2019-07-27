<?php

use Trink\Core\Helper\Yii2\RouteRule;

return array_merge(
    RouteRule::base(/*商品*/ 'dawn/api/goods'),
    RouteRule::base(/*用户*/ 'dawn/api/user'),

    // not restful api
    RouteRule::noRest(['module' => 'dawn', 'category' => 'page']),
    RouteRule::noRest(['module' => 'dawn', 'controller' => 'test']),

    // spacial api
    [
    ]
);
