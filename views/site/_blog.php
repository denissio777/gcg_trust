<?php
/**
 * Created by PhpStorm.
 * User: prog
 * Date: 01.09.18
 * Time: 15:02
 */
use app\modules\admin\models\Site;
use dektrium\user\models\Profile;
use yii\helpers\Html;

?>

<?php if (Site::get('blog_module_enabled')){?>
    <div class="row">
        <?php foreach ($models as $model){?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?=Html::a(Html::img('@web'.$model->img, ['class' => 'img-responsive']), ['site/post', 'slug' => $model->slug])?>
                            </div>
                            <div class="col-md-12">
                                <div class="post-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><?=Html::a($model->title, ['site/post', 'slug' => $model->slug])?></h4>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <small class="italic"><?=date_format(date_create($model->date), 'M j Y H:i ')?></small>
                                        </div>
                                    </div>
                                    <?=$model->preview?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="italic"><?=$translator->translate['posted_by']?><strong> <?=Profile::findOne($model->created_by)->name?></strong></span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-right">
                                            <small><i class="far fa-eye"></i> <?=$model->views?></small>
                                            <?=Html::a($translator->translate['read'], ['site/post', 'slug' => $model->slug], ['class' => 'btn btn-md btn-primary'])?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

<?php } else { ?>
    <code>Blog module is disabled, you need to enable it first.</code>
<?php } ?>