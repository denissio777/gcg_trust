<?php

use app\modules\admin\models\Settings;
use kartik\alert\Alert;
use yii\helpers\Html;

$this->title = 'Languages | '.Settings::get('en', 'name');

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
                <h3 class="box-title">Languages</h3>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['lang/create'], ['class' => 'btn btn-xs btn-primary pull-right', 'title' => 'Add Language'])?>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Locale</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($langs as $lang){?>
                        <tr>
                            <td><?=$lang->name?></td>
                            <td><?=$lang->locale?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $lang->id], ['class' => 'btn btn-xs btn-primary', 'title' => 'Edit Item'])?>
                                <?php if ($lang->locale != 'en'){?>
                                    <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $lang->id], [
                                        'class' => 'btn btn-xs btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure?',
                                            'method' => 'post',
                                        ],
                                    ])?>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>