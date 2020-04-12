
<?php use yii\grid\GridView;
use yii\data\ActiveDataProvider;

?>
<div class="container">
    <?= GridView::widget([
        'dataProvider' => $provider

    ]); ?>
</div>

