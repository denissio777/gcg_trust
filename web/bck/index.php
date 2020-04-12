<?php

/* @var $this yii\web\View */

use app\models\Helper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$this->title = $content->meta_title.' | '.Helper::sitename();


if($content->meta_title){
    $this->registerMetaTag(['name' => 'title', 'content' => $content->meta_title]);
}
if($content->meta_description) {
    $this->registerMetaTag(['name' => 'description', 'content' => $content->meta_description]);
}
if($content->keywords){
    $this->registerMetaTag(['name' => 'keywords', 'content' => $content->keywords]);
}
if($content->index == 0 && $content->follow == 0) {
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, nofollow']);
}
if($content->index == 1 && $content->follow == 0) {
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, nofollow']);
}
if($content->index == 0 && $content->follow == 1) {
    $this->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow']);
}
if($content->index == 1 && $content->follow == 1) {
    $this->registerMetaTag(['name' => 'robots', 'content' => 'index, follow']);
}
?>
<article class="intro">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 intro_banner my-flex-container">
                <div class="col-lg-offset-1 col-lg-4 heading my-flex-block">
                    <p class="heading_p"><?=$content->banner_text?></p>
                    <p class="heading_p2"><?=$content->under_banner?></p>
                </div>
            </div>

            <div class="col-lg-12 services">
                <div class="services_div">
                    <div class="row">
                        <p class="services_p text-center"><?=$content->service_title?></p>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <div class="back_icon">
                                <div class="icon_1">
                                    <?=Html::img('@web/img/icon_1.png')?>
                                </div>
                                <p><?=$content->service1?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <div class="back_icon">
                                <div class="icon_1">
                                    <?=Html::img('@web/img/icon_2.png', ['style' => 'position: relative; top: 47px;'])?>
                                </div>
                                <p><?=$content->service2?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                            <div class="back_icon">
                                <div class="icon_1">
                                    <?=Html::img('@web/img/icon_3.png', ['style' => 'position: relative; top: 47px;'])?>
                                </div>
                                <p><?=$content->service3?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>



<article class="text">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text__p">
                <?=$content->text?>
            </div>
        </div>
    </div>
</article>

<article class="form">
    <div class="form__banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'fieldConfig' => ['template' => '{label}{input}']]); ?>
                    <div class="row">
                        <p class="form__header"><?=$content->contact_title?></p>
                        <div class="col-md-6 col-sm-6">
                            <?= $form->field($model, 'name')->textInput(['placeholder' => $content->ph_name])->label(false) ?>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => $content->ph_email])->label(false) ?>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => $content->ph_phone])->label(false) ?>
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <?= $form->field($model, 'subject')->textInput(['placeholder' => $content->ph_subject])->label(false) ?>
                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => $content->ph_message])->label(false) ?>
                        </div>

                        <div class="col-md-12">
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-2 col-sm-2">{image}</div><div class="col-lg-6 col-lg-offset-1 col-sm-6 col-sm-offset-1">{input}</div></div>',
                                'captchaAction' => 'en/captcha',
                            ])->label(false) ?>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <?= Html::submitButton($content->contact_button, ['class' => 'btn btn-primary button', 'name' => 'contact-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>

                <div class="col-md-6 col-xs-12">
                    <?=$content->contact_text?>
                </div>
            </div>
        </div>
    </div>
</article>

<div class="row">
    <div class="col-md-12 about__text services_margin">
        <div class="row">
            <div class="col-md-12 services_page__p">
                <p>Our dedicated team of lawyers are covering the following fields:</p>
                <p>- Company formation;</p>
                <p>- Litigation;</p>
                <p>- Banking and finance;</p>
                <p>- Taxation;</p>
                <p>- Business advisory</p>
                <br />
            </div>
            <div class="col-md-4 text-center">
                <img class="services_page__img" src="../../img/icon_1.png" alt="" />
            </div>
            <div class="col-md-4 text-center">
                <img class="services_page__img" src="../../img/icon_2.png" alt="" />
            </div>
            <div class="col-md-4 text-center">
                <img class="services_page__img" src="../../img/icon_3.png" alt="" />
            </div>
        </div>
    </div>
</div>