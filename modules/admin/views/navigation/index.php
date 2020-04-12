<?php
use app\modules\admin\models\Settings;
use app\modules\admin\models\Site;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'Navigation | '.Settings::get('en', 'name');
?>
<?php if(Yii::$app->session->getFlash('update')){
    echo Alert::widget([
        'options' => [
            'class' => 'alert-success',
        ],
        'body' => Yii::$app->session->getFlash('update'),
    ]);
}?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Navigation Buttons</h3>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], [
                    'class' => 'btn btn-primary btn-xs pull-right',
                    'title' => 'Add Item',
                    'style' => 'float: right;'
                ])?>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <?php if (Site::get('language_module_enabled')){?>
                            <th>Locale</th>
                        <?php } ?>
                        <th>In Footer</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model) { ?>
                        <tr>
                            <td><?=$model->title?></td>
                            <?php if (Site::get('language_module_enabled')){?>
                                <td><?=$model->locale?></td>
                            <?php } ?>
                            <td><?=$model->in_footer ? 'Yes' : 'No'?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Update',
                                ])?>
                                <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete',
                                    'data' => [
                                        'confirm' => 'Delete page?',
                                        'method' => 'post',
                                    ],
                                ])?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>