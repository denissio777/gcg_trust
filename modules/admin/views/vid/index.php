<?php

use app\modules\admin\models\Categories;
use kartik\alert\Alert;
use yii\helpers\Html;

$this->title = 'Categories';
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
                <h3 class="box-title">Categories</h3>
                <?=Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['vid/create'], ['class' => 'btn btn-xs btn-primary pull-right', 'title' => 'Add category'])?>
            </div>
            <div class="box-body no-padding">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $cat){?>
                        <tr>
                            <td><?=$cat->title?></td>
                            <td><?=$cat->slug?></td>
                            <td><?=$cat->description?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $cat->id], ['class' => 'btn btn-xs btn-primary', 'title' => 'Edit Category'])?>
                                    <?=Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $cat->id], [
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