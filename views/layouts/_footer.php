<?php

use app\modules\admin\models\Navigation;
use app\modules\admin\models\Page;
use app\modules\admin\models\Style;
use yii\helpers\Html;

$navigation = Navigation::find()->where(['locale' => $language, 'in_footer' => 1])->orderBy(['position' => SORT_ASC])->limit(4)->all();

$fb = $settings->facebook ? Html::a('<i class="fab fa-facebook-square fa-2x"></i>', $settings->facebook, ['target' => '_blank']) : '';
$yt = $settings->youtube ? Html::a('<i class="fab fa-youtube-square fa-2x"></i>', $settings->youtube, ['target' => '_blank']) : '';
$tw = $settings->twitter ? Html::a('<i class="fab fa-twitter-square fa-2x"></i>', $settings->twitter, ['target' => '_blank']) : '';
$ig = $settings->instagram ? Html::a('<i class="fab fa-instagram fa-2x"></i>', $settings->instagram, ['target' => '_blank']) : '';

?>

<footer class="footer" style="background-color: <?=Style::get('footer_background_color')?>">
    <div class="container">
        <div class="row">
            <?php foreach ($navigation as $nav){?>
                <?php
                $links = explode(', ', $nav->pages);
                ?>
                <?php if(count($links) > 1){ ?>
                    <div class="col-md-3">
                        <h4 style="color: <?=Style::get('footer_titles_color')?>"><?=$nav->title?></h4>
                        <?php foreach ($links as $link){?>
                            <?php $page = Page::findOne($link)?>
                            <li><?=Html::a($page->title, ['/site/index', 'slug' => $page->slug])?></li>
                        <?php } ?>
                    </div>
                <?php } else {?>
                    <div class="col-md-3">
                        <?php $page = Page::findOne($links[0])?>
                        <h4 style="color: <?=Style::get('footer_titles_color')?>"><?=Html::a($page->title, ['/site/index', 'slug' => $page->slug], ['style' => 'color: '.Style::get('footer_titles_color').';'])?></h4>
                    </div>
                <?php } ?>
            <?php }?>

            <div class="col-md-12 text-right socials">
                <?=$fb?>
                <?=$tw?>
                <?=$yt?>
                <?=$ig?>
            </div>
            <div class="col-md-12 text-center">
                <?=$settings->footer?>
            </div>
        </div>
    </div>
</footer>
