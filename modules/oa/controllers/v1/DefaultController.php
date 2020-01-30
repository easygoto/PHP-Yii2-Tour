<?php

namespace app\modules\oa\controllers\v1;

use app\modules\oa\controllers\PageController;
use app\modules\oa\Module;

/**
 * Default controller for the `oa` module
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
