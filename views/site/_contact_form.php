<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$model->shift = 5;
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php $form = ActiveForm::begin(['id' => 'analytics-form']); ?>
        <?= $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp','type'=>'number'])->label(false) ?>

        <?= $form->field($model, 'shift')->textInput(['placeholder' => 'Time shift','type'=>'number'])->label(false) ?>


        <div class="form-group text-right">
            <?= Html::submitButton('Check', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>