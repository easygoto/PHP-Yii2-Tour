<?php
/**
 * This is the template for generating a page controller class within a module.
 */

/* @var $this yii\web\View */
/* @var $generator app\modules\gen\generators\module\Generator */

echo "<?php\n";
?>

namespace <?= $generator->getControllerNamespace() ?>\v1;

use <?= $generator->getControllerNamespace() ?>\PageController;
use <?= $generator->moduleClass ?>;

/**
 * Default controller for the `<?= $generator->moduleID ?>` module
 */
class DefaultController extends PageController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
