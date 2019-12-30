<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \app\modules\gen\Generator[] */
/* @var $activeGenerator \app\modules\gen\Generator */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$activeGenerator = Yii::$app->controller->generator;
?>
<?php $this->beginContent('@app/modules/gen/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-md-3 col-sm-4 generator-nav">
        <div class="list-group">
            <?php
            $classes = ['list-group-item', 'd-flex', 'justify-content-between', 'align-items-center'];
            foreach ($generators as $id => $generator) {
                $label = Html::tag('span', Html::encode($generator->getName())) . '<span class="icon"></span>';
                echo Html::a($label, ['default/view', 'id' => $id], [
                    'class' => $generator === $activeGenerator ? array_merge($classes, ['active']) : $classes,
                ]);
            }
            ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8 generator-main">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
