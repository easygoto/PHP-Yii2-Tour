<?php
/**
 * This is the template for generating a page controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator app\modules\gen\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use <?= $generator->moduleClass ?>;

/**
* Default Page controller for the `<?= $generator->moduleID ?>` module
*/
class PageController extends \app\controllers\PageController
{
    /** @var Module $module */
    public $module;
}
