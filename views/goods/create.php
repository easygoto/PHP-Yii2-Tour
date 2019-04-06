<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Goods */

$this->title = '添加商品';
$this->params['breadcrumbs'][] = ['label' => '商品', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
