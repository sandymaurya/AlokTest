<?php
use \yii\helpers\Html;
use app\helpers\HtmlHelper;

?>
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
    <div class="facts">
        <!-- Choose -->
        <div class="colors">
            <div class="dropdown-button">
                <?= Html::activeDropDownList($model, 'ticketTime', $model->getTimeList(), HtmlHelper::GetDropDownListOptions('Select Time')); ?>
            </div>
        </div>
        <div class="colors">
            <div class="dropdown-button">
                <?= Html::activeDropDownList($model, 'ticketHotel', $model->getHotelsList(), HtmlHelper::GetDropDownListOptions('Hotel')); ?>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="form-head">
            <div>
                <span class="user-icon"></span>
                <?= Html::activeTextInput($model, 'ticketQuantity', ['placeholder' => "Quantity","type"=>"number",'min'=>'1']); ?>
                <?php //echo Html::error($model, 'ticketQuantity', ['class' => 'help-block']);?>
            </div>
        </div>
        <div class="form-head">
            <div>
                <span class="promo"></span>
                <?= Html::activeTextInput($model, 'ticketPromoCode', ['placeholder' => "Promo Code"]); ?>
                <?php //echo Html::error($model, 'ticketPromoCode', ['class' => 'help-block']);?>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="step-f">
            <button id="step1-submit" type="submit" name="submitOrderForm" value="Step1">Step 2</button>
            <!--<input type="submit" name="submitOrderForm" value="STEP 2"/>-->
        </div>
        <!-- Choose -->
    </div>
</div>