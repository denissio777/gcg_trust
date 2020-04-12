<?php
use app\modules\admin\models\Lang;
use app\modules\admin\models\Settings;
use app\modules\admin\models\Site;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'Blog posts | '.Settings::get('en', 'name');
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
                    Blog posts
                </h3>
                <p>Found <?=$count?> results</p>
            </div>
            <div class="col-md-12 block">
                <?= Html::beginForm(['search'], 'get', ['enctype' => 'multipart/form-data', 'class' => 'pull-left']) ?>
                <?= Html::input('text', 'title', isset($_GET['title']) ? $_GET['title'] : false, ['placeholder' => 'Search by title']) ?>
                <?= Html::submitButton('Search', ['class' => 'submit']) ?>
                <?= Html::endForm() ?>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], [
                    'class' => 'btn btn-primary btn-xs pull-right',
                    'title' => 'Add Post'
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
                        <th>Views</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model) { ?>
                        <tr>
                            <td>
                                <?=$model->title?>
                            </td>
                            <?php if (Site::get('language_module_enabled')){?>
                                <td>
                                    <?=$model->locale?>
                                </td>
                            <?php } ?>
                            <td><?=$model->views?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-eye"></i>', ['/site/post', 'slug' => $model->slug], [
                                    'class' => 'btn btn-primary btn-xs',
                                    'title' => 'View',
                                    'target' => '_blank'
                                ])?>
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
    <div class="col-md-12">
        <div class="col-md-offset-5 col-sm-offset-5">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pagination,
            ]); ?>
        </div>
    </div>
</div>