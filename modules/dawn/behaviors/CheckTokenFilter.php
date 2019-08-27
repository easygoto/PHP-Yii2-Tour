<?php


namespace app\modules\dawn\behaviors;

use app\web\Yii;
use Trink\Core\Helper\Result;
use yii\base\ActionFilter;
use yii\web\Response;

class CheckTokenFilter extends ActionFilter
{
    public function beforeFilter($event)
    {
        $headers = Yii::$app->request->headers;
        $uid = $headers->get('UID');
        $token = $headers->get('ACCESS_TOKEN');
        if (!$this->validate($uid, $token)) {
            $event->isValid = false;
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;
            $response->data = Result::fail('error', [], 2)->asArray();
            return $response;
        }
        return parent::beforeFilter($event);
    }

    protected function validate($uid, $token)
    {
        return true;
    }
}
