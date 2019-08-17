<?php
/**
 * This is the template for generating a config route file.
 */

/* @var $generator app\modules\gen\generators\module\Generator */

echo "<?php\n";
?>

use app\web\RouteRule;

return array_merge(
    // not restful api
    RouteRule::noRest(['module' => '<?= $generator->moduleID ?>']),

    // spacial api
    [
    ]
);
