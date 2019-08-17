<?php
/**
 * This is the template for generating a config web file.
 */

/* @var $generator app\modules\gen\generators\module\Generator */

echo "<?php\n";
?>

$config = [
    'id' => '<?= $generator->moduleID ?>',
    'layout' => 'main',
    'defaultRoute' => 'default/index',

    'components' => [
        // list of component configurations
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
