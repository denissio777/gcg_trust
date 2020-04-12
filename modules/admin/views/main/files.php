<?php

use app\modules\admin\models\Settings;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Files | '.Settings::get('sitename');

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
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="box-title">
                            Files
                        </h3>
                        <p>Found <?=count($files)?> results</p>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $form = ActiveForm::begin([
                            'options' => ['enctype' => 'multipart/form-data'],
                            'method' => 'post',
                            'id' => 'uploadForm'
                        ]);
                        ?>
                        <div class="row">
                            <div class="col-md-8">
                                <?= $form->field($model, 'files[]')->fileInput(['multiple' => true, 'accept' => '*']) ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo Html::submitButton('<i class="fas fa-upload"></i>' , ['class' => 'btn btn-primary btn-md' ]) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

            <div class="box-body no-padding">
                <table class="table table-striped" style="width: 100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($files as $file){?>
                        <tr>
                            <td><?=$file?></td>
                            <td><?=Html::textInput('file', Url::home(true).'web/uploads/'.$file, ['class' => 'form-control'])?></td>
                            <td>
                                <?=Html::a('<i class="fas fa-folder-open"></i>', Yii::$app->homeUrl.'web/uploads/'.$file, [
                                    'class' => 'btn btn-xs btn-primary',
                                    'title' => 'Open',
                                    'target' => '_blank'
                                ])?>
                                <?=Html::a('<i class="fas fa-trash-alt"></i>', ['deletefile', 'file' => $file], [
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete',
                                    'data' => [
                                        'confirm' => 'Delete file?',
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