<?php
use app\modules\admin\models\Settings;
use yii\helpers\Html;

$this->title = 'Create new question | '.Settings::get('en', 'name');
?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">New question</h4>
    </div>
<?= $this->render('_form',[
    'model' => $model
]);
