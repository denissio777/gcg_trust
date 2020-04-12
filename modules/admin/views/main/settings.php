<?php
use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use kartik\color\ColorInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Site settings | '.Settings::get('en', 'name');
?>
<div class="row">
    <div class="col-md-12">
        <?php if(Yii::$app->session->getFlash('update')){
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-success',
                ],
                'body' => Yii::$app->session->getFlash('update'),
            ]);
        }?>
    </div>

    <div class="col-md-12">

        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Site settings
                </h3>
            </div>
            <div class="box-body no-padding">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'page-form',
                    'method' => 'post',
                ]);
                ?>

                <div class="col-md-8">
                    <?= $form->field($model, 'robots')->textarea(['rows' => 24]) ?>
                </div>

                <div class="col-md-4">
                    <h4>General</h4>
                    <?= $form->field($model, 'admin_email')->textInput() ?>
                    <h4>Modules</h4>
                    <?= $form->field($model, 'language_module_enabled')->checkbox() ?>
                    <?= $form->field($model, 'user_module_enabled')->checkbox() ?>
                    <?= $form->field($model, 'faq_module_enabled')->checkbox() ?>
                    <?= $form->field($model, 'blog_module_enabled')->checkbox() ?>
                </div>

                <div class="col-md-12">
                    <div class="block text-right">
                        <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary', 'form' => 'page-form']) ?>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>