
<?php

use app\modules\admin\models\Settings;
use yii\helpers\Html;

$this->title = 'Update Navigation: '.$model->locale.' | '.Settings::get('en', 'name');
?>
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">
            Update Navigation: <?=$model->locale?>
        </h3>
        <?=Html::a('<i class="fa fa-undo" aria-hidden="true"></i>', ['index'], [
            'class' => 'btn btn-info btn-xs pull-right',
            'title' => 'Back',
        ])?>
    </div>
    <div class="box-body no-padding">
        <?= $this->render('_form',[
            'model' => $model
        ]);?>
    </div>
</div>



