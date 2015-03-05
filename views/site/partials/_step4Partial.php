<?php
use app\helpers\HtmlHelper;

?>
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
    <div class="payment">
        <h4>Payment Options</h4>

        <div class="card">
            <p>Card Options</p>
            <?= $form->field($model, 'paymentOptionCardType')->
            radioList($model->getPaymentOptionCardTypeList()); ?>
        </div>
        <div class="card cardy">
            <p>Card Holder's Name </p>
            <?= $form->field($model, 'paymentOptionCardHolderName', ['inputOptions' => ["placeholder" => "Name"]]); ?>
        </div>
        <div class="card cardy">
            <p> Card number </p>
            <?= $form->field($model, 'paymentOptionCardNumber', ['inputOptions' => ["placeholder" => "Number"]]); ?>
        </div>
        <div class="clearfix"></div>
        <div class="card cardy">
            <p> Card Expiry Date </p>
            <?php
            echo $form->field($model, 'paymentOptionExpiryMonth')->
            dropDownList($model->getMonthNames(), HtmlHelper::GetDropDownListOptions('Month', 'month', false));

            echo $form->field($model, 'paymentOptionExpiryYear')->
            dropDownList(range(date("Y"), date("Y") + 5), HtmlHelper::GetDropDownListOptions('Year', 'year', false));
            ?>
        </div>
        <div class="card cardy">
            <p> Enter Cv2 Number </p>
            <?= $form->field($model, 'paymentOptionCVV', ['inputOptions' => ["placeholder" => "CVV"]]); ?>
            <input type="text" placeholder="CVV" required=""/>
        </div>
        <div class="cleafix"></div>
        <div class="step-d">
            <input type="Submit" value="Buy"/>
        </div>
    </div>
</div>