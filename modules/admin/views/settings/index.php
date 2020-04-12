<?php
use app\modules\admin\models\Lang;
use app\modules\admin\models\Settings;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'Language Settings | '.Settings::get('en', 'name');
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
                <h3 class="box-title">
                    Language settings
                </h3>
            </div>


            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Locale</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model) { ?>
                        <tr>
                            <td>
                                <?=$model->locale?>
                            </td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Update',
                                ])?>

                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-offset-5 col-sm-offset-5">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
            ]); ?>
        </div>
    </div>
</div>