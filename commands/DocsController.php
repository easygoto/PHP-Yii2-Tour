<?php


namespace app\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use function OpenApi\scan;

class DocsController extends Controller
{
    public function actionIndex()
    {
        return ExitCode::OK;
    }

    public function actionDawn()
    {
        $openApi = scan(Yii::$app->getBasePath() . "/modules/dawn/controllers");
        file_put_contents(Yii::$app->getBasePath() . '/web/dawnApi.yaml', $openApi->toYaml());
        return ExitCode::OK;
    }
}
