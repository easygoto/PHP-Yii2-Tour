<?php


use Trink\Core\Helper\Yii\RouteRule;

return array_merge(
    require_once dirname(__DIR__) . '/modules/dawn/config/route.php',

    // not restful api
    RouteRule::noRest(['controller' => 'site']),
    RouteRule::noRest(['module' => 'gen']),

    // spacial api
    [
        RouteRule::get('/', $defaultSiteRoute),
    ]
);
