<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 29.11.17
 * Time: 11:10
 */

use app\modules\admin\models\Settings;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
use yii\helpers\Html;

$this->title = 'Update Css | '.Settings::get('sitename');
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

    <?php $form = ActiveForm::begin([
        'id' => 'css-form',
        'method' => 'post',
    ]);
    ?>

    <div class="col-md-12">
        <?=$form->field($model, 'string')->textarea(['rows' => 24])?>
    </div>

    <div class="col-md-12">
        <div class="block text-right">
            <?php echo Html::submitButton('<i class="fas fa-save"></i>', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>