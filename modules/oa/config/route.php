<?php

use app\web\RouteRule;

return array_merge(
    // not restful api
    RouteRule::baseApi('oa/v1/api/default'),

    // spacial api
    [
    ]
);
