<?php

use app\modules\admin\models\Language;
use app\modules\admin\models\Page;
use app\modules\admin\models\Site;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$file = file_get_contents(Yii::$app->basePath.'/web/dashboard/js/page_form.js');
$this->registerJs($file);
?>

<?php $form = ActiveForm::begin([
        'id' => 'blog-form',
    'method' => 'post',
]);
?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-12">
            <?=$form->field($model, 'title')->textInput(['id' => 'title'])?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'preview')->widget(TinyMce::className(), [
                'options' => ['rows' => 6               ],
                'language' => 'en_GB',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontsizeselect | lineheightselect",
                    'valid_elements' => '*[*]',
                    'fontsize_formats' => '8pt 10pt 12pt 14pt 18pt 24pt 30pt 36pt'
                ]
            ]);?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'text')->widget(TinyMce::className(), [
                'options' => ['rows' => 24],
                'language' => 'en_GB',
                'clientOptions' => [
                    'plugins' => [
                        "advlist autolink lists link charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste"
                    ],
                    'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontsizeselect | lineheightselect",
                    'valid_elements' => '*[*]',
                    'fontsize_formats' => '8pt 10pt 12pt 14pt 18pt 24pt 30pt 36pt'
                ]
            ]);?>
        </div>
    </div>

</div>
<div class="col-md-3">
    <?php if (Site::get('language_module_enabled')){?>
        <?=$form->field($model, 'locale')->dropDownList(Language::getList())?>
    <?php } ?>
    <?= $form->field($model, 'slug')->textInput(['id' => 'slug']) ?>
    <?= $form->field($model, 'hide')->checkbox() ?>
    <h4>Meta Tags</h4>
    <?= $form->field($model, 'meta_title')->textInput() ?>
    <?= $form->field($model, 'meta_description')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'keywords')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'index')->checkbox() ?>
    <?= $form->field($model, 'follow')->checkbox() ?>
    <?= $form->field($model, '_img')->fileInput() ?>
    <?php if (!$model->isNewRecord){?>
        <?=Html::img('/web'.$model->img, ['class' => 'img-responsive'])?>
    <?php } ?>

    <div class="block text-right">
        <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary', 'form' => 'blog-form']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>


