<?php
use app\modules\admin\models\Settings;
use app\modules\admin\models\Categories;
use yii\helpers\Html;

$this->title = 'Update category';
?>
<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Update category: <?=$model->title?></h3>
        <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i>', ['index'], ['class' => 'btn btn-xs btn-primary pull-right', 'title' => 'Back'])?>
    </div>
    <?=$this->render('_form', [
        'model' => $model
    ])?>
</div>