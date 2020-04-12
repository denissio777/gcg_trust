<?php

use app\modules\admin\models\Language;
use app\modules\admin\models\Video;
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
                <?=$form->field($model, 'title')->textInput()?>
                <?=$form->field($model, 'slug')->dropDownList(Video::getList())?>
                <?=$form->field($model, 'description')->textInput()->label('Description')?>
            </div>


        </div>

        <div class="row">
            <div class="col-md-3">
                <?=$form->field($model, 'youtube')->textInput()?>
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