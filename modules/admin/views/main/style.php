<?php
use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use kartik\color\ColorInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Style | '.Settings::get('en', 'name');
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
                    Style settings
                </h3>
            </div>
            <div class="box-body no-padding">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'page-form',
                    'method' => 'post',
                ]);
                ?>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>General</h4>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($style, 'background_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'background_img')->checkbox() ?>
                            <?= $form->field($style, '_background')->fileInput() ?>
                            <?=Html::img('/web'.$style->background, ['class' => 'img-responsive'])?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($style, '_logo')->fileInput() ?>
                            <?=Html::img('/web'.$style->logo, ['class' => 'img-responsive'])?>
                            <?= $form->field($style, 'logo_width')->textInput(['type' => 'number']) ?>
                            <?= $form->field($style, '_favicon')->fileInput() ?>
                            <?=Html::img('/web'.$style->favicon, ['class' => 'img-responsive'])?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Navbar</h4>
                        </div>
                        <div class="col-md-6">

                            <?= $form->field($style, 'navbar_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'navbar_border_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'navbar_links_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'active_link_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'active_link_background')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'link_hover_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'link_hover_background')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>

                            <?= $form->field($style, 'highlight_tab')->checkbox() ?>
                            <?= $form->field($style, 'fixed_navbar')->checkbox() ?>
                            <?= $form->field($style, 'navbar_transition')->checkbox() ?>
                            <?= $form->field($style, 'transition_time')->textInput(['type' => 'number']) ?>
                            <?= $form->field($style, 'transition_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-6">

                            <?= $form->field($style, 'ddm_background')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_links')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_border')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_active')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_active_background')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_hover_background')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'ddm_hover_text')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                            <?= $form->field($style, 'navbar_align')->dropDownList(['navbar-right' => 'Right', 'navbar-left' => 'Left']); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_background_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_titles_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_links_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_text_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_social_links_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                        <div class="col-md-2">
                            <?= $form->field($style, 'footer_links_hover_color')->widget(ColorInput::classname(), [
                                'options' => ['placeholder' => 'Select color ...'],
                            ]); ?>
                        </div>
                    </div>
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