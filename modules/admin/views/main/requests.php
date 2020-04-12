<?php

use app\modules\admin\models\Lang;
use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Html;

$this->title = 'Requests | '.Settings::get('en', 'name');

?>
<div class="row">
    <div class="col-md-12">
        <?php if (Yii::$app->session->hasFlash('flash')){ ?>

            <?=Alert::widget([
                'type' => Alert::TYPE_SUCCESS,
                'titleOptions' => ['icon' => 'info-sign'],
                'body' => Yii::$app->session->getFlash('flash')
            ]);?>

        <?php } ?>
    </div>
    <div class="col-md-12">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Requests</h3>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($models as $model){?>
                        <tr>
                            <td><?=$model->name?></td>
                            <td><?=$model->email?></td>
                            <td><?=$model->country?></td>
                            <td><?=date_format(date_create($model->date), 'j M, Y H:i')?></td>
                            <td>
                                <?php if($model->status == 0){?>
                                    <?=Html::a('<i class="fas fa-check"></i>', ['check', 'id' => $model->id], [
                                        'class' => 'btn btn-xs btn-success',
                                        'data' => [
                                            'method' => 'post',
                                        ],
                                    ])?>
                                <?php } ?>
                                <?php
                                Modal::begin([
                                    'header' => $model->subject,
                                    'toggleButton' => [
                                        'label' => '<i class="fas fa-eye"></i>',
                                        'class' => 'btn btn-xs btn-primary'
                                    ],
                                ]);

                                echo $model->message;

                                Modal::end();
                                ?>
                                <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-xs btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure?',
                                        'method' => 'post',
                                    ],
                                ])?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

