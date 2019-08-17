<?php

use app\web\RouteRule;

return array_merge(
    // not restful api
    RouteRule::noRest(['module' => 'common', 'category' => 'api']),

    // spacial api
    [
    ]
);
