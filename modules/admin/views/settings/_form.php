<?php

use app\modules\admin\models\Language;
use app\modules\admin\models\Page;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="box-body">
    <?php $form = ActiveForm::begin([
        'id' => 'settings-form',
        'method' => 'post',
    ]);
    ?>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <?=$form->field($model, 'name')->textInput()?>
                <?=$form->field($model, 'locale')->dropDownList(Language::getList())?>
                <?=$form->field($model, 'email')->textInput()->label('Contact Email')?>
            </div>

            <div class="col-md-6">
                <?=$form->field($model, 'footer')->textarea(['rows' => 6])?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <?=$form->field($model, 'facebook')->textInput()?>
            </div>
            <div class="col-md-3">
                <?=$form->field($model, 'twitter')->textInput()?>
            </div>
            <div class="col-md-3">
                <?=$form->field($model, 'youtube')->textInput()?>
            </div>
            <div class="col-md-3">
                <?=$form->field($model, 'instagram')->textInput()?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-right">
                <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>
</div>


