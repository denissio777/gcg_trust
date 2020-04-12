<?php
use app\modules\admin\models\Lang;
use app\modules\admin\models\Vid;
use app\modules\admin\models\Categories;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'Videos';
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
                Videos
                </h3>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['categories/create'], ['class' => 'btn btn-xs btn-primary pull-right', 'title' => 'Add video'])?>
            </div>


            <div class="box-body no-padding">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Links</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model) { ?>
                        <tr>
                            <td>
                                <?=$model->slug?>
                            
                            </td>
                            <td>
                                <?=$model->title?>
                            
                            </td>
                            <td>
                                <?=$model->description?>
                            
                            </td>
                            <td>
                                <?=$model->youtube?>
                            
                            </td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-info btn-xs',
                                    'title' => 'Update',
                                ])?>
                                    <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-xs btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure?',
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
    <div class="col-md-12">
        <div class="col-md-offset-5 col-sm-offset-5">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
            ]); ?>
        </div>
    </div>
</div>