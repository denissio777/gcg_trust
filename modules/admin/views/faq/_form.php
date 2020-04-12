<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 30.03.17
 * Time: 13:45
 */
use app\modules\admin\models\Category;
use app\modules\admin\models\Language;
use app\modules\admin\models\Site;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->registerJs("$('.category-dropdown').select2().css('width', '100%');");
$this->registerJs("$('span.select2').css('width', '100%');");
?>
<?php $form = ActiveForm::begin(['options' => [
    'enctype' => 'multipart/form-data',
    'enableAjaxValidation' => true,
    'id' => 'faq-form'
]]); ?>
<div class="modal-body">

    <div class="row">
        <?php if (Site::get('language_module_enabled')){?>
            <div class="col-md-12">
                <?=$form->field($model, 'locale')->dropDownList(Language::getList())?>
            </div>
        <?php } ?>
        <div class="col-md-12">
            <?= $form->field($model, 'question')->textInput() ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary']) ?>
    <?php if(!$model->isNewRecord){ ?>
        <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Delete?',
                'method' => 'post',
            ],
        ])?>
    <?php } ?>
</div>
<?php ActiveForm::end(); ?>
