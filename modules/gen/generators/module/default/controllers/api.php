<?php
/**
 * This is the template for generating a api controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator app\modules\gen\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>;

use <?= $generator->moduleClass ?>;

/**
* Default Api controller for the `<?= $generator->moduleID ?>` module
*/
class ApiController extends \app\controllers\ApiController
{
    /** @var Module $module */
    public $module;
}
