<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use app\models\Helper;
use app\modules\admin\models\Style;
use app\modules\admin\Module;
use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error" style="<?= Style::get('fixed_navbar') ? 'padding-top: 100px;' : ''?>">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            The above error occurred while the Web server was processing your request.
        </p>
        <p>
            Please contact us if you think this is a server error. Thank you.
        </p>
    </div>



</div>
