<?php
use app\modules\admin\models\Site;

$this->registerJsFile('@web/js/faq.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php if (Site::get('faq_module_enabled')){?>
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($faqs as $i => $faq){?>
                <div class="question" data-id="<?=$faq->id?>">
                    <h5><?=$i+1?>. <?=$faq->question?></h5>
                </div>
                <div class="answer" data-id="<?=$faq->id?>">
                    <p><?=$faq->answer?></p>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } else { ?>
<code>FAQ module is disabled, you need to enable it first.</code>
<?php } ?>
