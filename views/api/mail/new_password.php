<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var dektrium\user\Module          $module
 * @var dektrium\user\models\User     $user
 * @var dektrium\user\models\Password $password
 */
$this->context->layout = 'html';
?>
<div style="background-color: #1e2c37; text-align: center; padding: 15px; width: 100%; max-width: 300px; border-radius: 20px; margin: 0 auto;">
    <?=Html::a(Html::img(Url::home(true).'web/img/logo.png', ['style' => 'width: 100%; max-width:250px;']), Url::home(true))?>
</div>
<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Yii::t('user', 'Hello') ?>,
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Yii::t('user', 'Your account on {0} has a new password', Yii::$app->name) ?>.
    <?= Yii::t('user', 'We have generated a password for you') ?>: <strong><?= $user->password ?></strong>
</p>

<p style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">
    <?= Yii::t('user', 'If you did not make this request you can ignore this email') ?>.
</p>
