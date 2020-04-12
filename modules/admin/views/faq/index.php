<?php

use app\models\Helper;
use app\modules\admin\models\Category;
use app\modules\admin\models\Settings;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'FAQ | '.Settings::get('en', 'name');

?>

<?php if (Yii::$app->session->hasFlash('update')){ ?>

    <?php
    echo Alert::widget([
        'options' => [
            'class' => 'alert-info',
        ],
        'body' => Yii::$app->session->getFlash('update')
    ]);
    ?>

<?php } ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    FAQ
                </h3>
                <p>Found <?=$count?> results</p>
            </div>
            <div class="col-md-12 block">
                <?= Html::beginForm(['search'], 'get', ['enctype' => 'multipart/form-data', 'class' => 'pull-left']) ?>
                <?= Html::input('text', 'title', isset($_GET['title']) ? $_GET['title'] : false, ['placeholder' => 'Search by something']) ?>
                <?= Html::submitButton('Search', ['class' => 'submit']) ?>
                <?= Html::endForm() ?>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['create'], [
                    'class' => 'btn btn-primary btn-xs pull-right modal-link',
                    'title' => 'Add Item',
                    'style' => 'float: right;',
                    'data' => [
                        'toggle' => 'modal',
                        'target' => '#modelModal'
                    ],
                ])?>
            </div>

            <div class="box-body no-padding">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Locale</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model){?>
                        <tr>
                            <td><?=$model->question?></td>
                            <td><?=Helper::preview($model->answer, 100)?></td>
                            <td><?=$model->locale?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $model->id], [
                                    'class' => 'btn btn-info btn-xs modal-link',
                                    'title' => 'Update',
                                    'data' => [
                                        'toggle' => 'modal',
                                        'target' => '#modelModal'.$model->id
                                    ],
                                ])?>
                                <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete',
                                    'data' => [
                                        'confirm' => 'Delete language?',
                                        'method' => 'post',
                                    ],
                                ])?>
                            </td>
                        </tr>
                        <div class="modal remote fade" id="modelModal<?=$model->id?>">
                            <div class="modal-dialog">
                                <div class="modal-content loader-lg"></div>
                            </div>
                        </div>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal remote fade" id="modelModal">
    <div class="modal-dialog">
        <div class="modal-content loader-lg"></div>
    </div>
</div>