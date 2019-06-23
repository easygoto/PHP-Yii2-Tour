<?php

namespace app\modules\dawn\controllers\page;

use app\behaviors\filters\LoginAuthFilter;
use app\modules\dawn\controllers\PageController;
use app\web\Yii;
use app\modules\dawn\models\Goods;
use app\modules\dawn\models\GoodsSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends PageController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            [
                /*
                 * 默认不过滤
                 * only 只过滤某些, 其他的不过滤
                 * except 不过滤某些, 其他的全过滤
                 * 两者结合使用, 各做各的事情, 其他的不过滤
                 */
                'class'  => LoginAuthFilter::className(),
                'except'   => ['makedata'],
            ],
        ];
    }

    /**
     * Lists all Goods models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Goods model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Goods();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing Goods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing Goods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionMakedata()
    {
        for ($i=0; $i<100; $i++) {
            $price = rand(200, 999);
            $now = date('Y-m-d H:i:s');
            $sn = substr(md5(uniqid()), 0, 4);
            
            $model = new Goods();
            
            $model->name = '测试商品'.$sn;
            $model->wholesale = $price*1.1;
            $model->selling_price = $price * 1.28;
            $model->market_price = $price * 1.35;
            $model->inventory = rand(2, 12) * 100;
            $model->created_at = $now;
            $model->updated_at = $now;
            $model->operated_at = $now;
            $model->status = 1;
            $model->is_delete = 0;
            
            $model->save();
        }
        return 'ok';
    }
}
