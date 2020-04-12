<?php

use app\modules\admin\models\Language;
use app\modules\admin\models\Page;
use app\modules\admin\models\Site;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$file = file_get_contents(Yii::$app->basePath.'/web/dashboard/js/nav_form.js');
$this->registerJs($file);
$this->registerJs("$('.page-select').select2();");
if($model->isNewRecord){
    $this->registerJs("var index = 0;");
}else{
    $index = count(array (json_decode($model->pages, true)));
    $this->registerJs("var index = $index;");
}

$all_pages = Page::getAll();
if (!$model->isNewRecord){
    $all_pages[0] = '[DELETE]';
}
?>

<?php $form = ActiveForm::begin([
        'id' => 'page-form',
        'method' => 'post',
]);
?>

<div class="col-md-12">
    <div class="row">
        <div class="col-md-4">
            <?=$form->field($model, 'title')->textInput()?>
        </div>
        <?php if (Site::get('language_module_enabled')){?>
            <div class="col-md-2">
                <?=$form->field($model, 'locale')->dropDownList(Language::getList())?>
            </div>
        <?php } ?>
        <div class="col-md-2">
            <?=$form->field($model, 'position')->textInput(['type' => 'number'])?>
        </div>
        <div class="col-md-2">
            <?=$form->field($model, 'anchor')->textInput()?>
        </div>
        <div class="col-md-2">
            <?=$form->field($model, 'in_footer')->checkbox()?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 relative pages">
            <h4>Pages <?=Html::button('<i class="fas fa-plus"></i>', ['class' => 'btn btn-xs btn-success', 'id' => 'add-page'])?></h4>
            <?php if ($model->isNewRecord){?>
                <?=$form->field($model, 'pages[]')->dropDownList($all_pages, ['class' => 'form-control page-select', 'id' => 'page-select-0'])->label(false)?>
            <?php } else {
                $pages = explode(', ', $model->pages);
                foreach ($pages as $k => $v){
                    echo $form->field($model, 'pages[]')->dropDownList($all_pages, ['class' => 'form-control page-select', 'id' => 'page-select-'.$k, 'options' => [$v => ['selected' => true]]])->label(false);
                }
            } ?>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="block text-right">
        <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary', 'form' => 'page-form']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>


