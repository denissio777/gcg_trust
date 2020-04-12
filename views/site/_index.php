<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'My Yii Application';
//$this->registerJs('BTC = 0;');
//$this->registerJsFile('/web/js/index.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>



<div class="container">
    <div class="text-center">
        <h3>Buy Bitcoin</h3>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="panel transparent">
                <div class="panel-body exchange">
                    <p class="for_cash"><span class="amount">&euro;200</span> ($<span class="dollars"></span>) for</p>
                    <p class="for_crypto"></p>
                    <div class="progressBar">
                        <div></div>
                    </div>
                    <div class="text-center">
                        <?=Html::a('Buy Bitcoin', '#', ['class' => 'btn btn-md btn-warning'])?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel transparent">
                <div class="panel-body exchange">
                    <p class="for_cash"><span class="amount">&euro;500</span> ($<span class="dollars"></span>) for</p>
                    <p class="for_crypto"></p>
                    <div class="progressBar">
                        <div></div>
                    </div>
                    <div class="text-center">
                        <?=Html::a('Buy Bitcoin', '#', ['class' => 'btn btn-md btn-warning'])?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel transparent">
                <div class="panel-body exchange">
                    <p class="for_cash"><span class="amount">&euro;1000</span> ($<span class="dollars"></span>) for</p>
                    <p class="for_crypto"></p>
                    <div class="progressBar">
                        <div></div>
                    </div>
                    <div class="text-center">
                        <?=Html::a('Buy Bitcoin', '#', ['class' => 'btn btn-md btn-warning'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        <h4>Exchange to a different amount</h4>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel transparent">
                <div class="panel-body text-center">
                    <div class="amount-input-wrap">
                        <span>&euro;</span><?=Html::textInput('amount', 0, ['class' => 'amountInput', 'id' => 'custom-handle', 'type' => 'number'])?>
                    </div>
                    <div class="range-wrapper">
                        <div id="slider">
                            <div class="ui-slider-handle"></div>
                        </div>
                        <div class="flex align-between amount-range-num">
                            <span>250</span>
                            <span>500</span>
                            <span>750</span>
                            <span>1000</span>
                            <span>1250</span>
                            <span>1500</span>
                            <span>1750</span>
                            <span>2000</span>
                            <span>2250</span>
                            <span>2500</span>
                            <span>2750</span>
                            <span>3000</span>
                            <span>more</span>
                        </div>
                    </div>

                </div>

            </div>
            <div class="text-center" style="margin: 60px auto;">
                <?=Html::a('Buy 0 BTC', '#', ['class' => 'btn btn-md btn-warning', 'id' => 'buy_btn'])?>
            </div>
        </div>
    </div>
</div>
