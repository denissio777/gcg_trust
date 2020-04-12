<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 30.03.17
 * Time: 13:45
 */
use app\modules\admin\controllers\VidController;
use app\modules\admin\models\Video;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="box-body">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-12 text-right">
            <?= Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-md btn-primary pull-right', 'title' => 'Save']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>