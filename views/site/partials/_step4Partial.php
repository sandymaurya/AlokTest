<?php
    use \yii\helpers\Html;
    use app\helpers\HtmlHelper;
    use ruskid\stripe\StripeCheckout;
?>
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
    <div class="payment">
        <h4>Payment Options</h4>

        <div class="card" id="order_paymentOptionCardType">
            <p>Card Options</p>
            <?= $form->field($model, 'paymentOptionCardType',['template' => "{input}\n{error}"])->
            radioList($model->getPaymentOptionCardTypeList()); ?>
        </div>
        <div class="card cardy" id="order_paymentOptionCardHolderName">
            <?= $form->field($model, 'paymentOptionCardHolderName', ['inputOptions' => ["placeholder" => "Name"]])->label("Card Holder's Name"); ?>
        </div>
        <div class="card cardy" id="order_paymentOptionCardNumber">
            <?= $form->field($model, 'paymentOptionCardNumber', ['inputOptions' => ["placeholder" => "Number"]])->label("Card number"); ?>
        </div>
        <div class="clearfix"></div>
        <div class="card cardy">
            <p> Card Expiry Date </p>
            <?php
            echo Html::activeDropDownList($model, 'paymentOptionExpiryMonth',$model->getMonthNames(), HtmlHelper::GetDropDownListOptions('Month', 'month', false));
            echo Html::activeDropDownList($model, 'paymentOptionExpiryYear',range(date("Y"), date("Y") + 20 ), HtmlHelper::GetDropDownListOptions('Year', 'year', false));
            ?>
        </div>
        <div class="card cardy" id="order_paymentOptionCVV">
            <?= $form->field($model, 'paymentOptionCVV', ['inputOptions' => ["placeholder" => "CVV"]])->label('Enter CVV Number'); ?>
        </div>
        <div class="cleafix"></div>
        <div class="step-d">
            <button id="step4-submit" type="submit" name="submitOrderForm" value="Step4">Buy</button>
        </div>
    </div>
</div>
<?=
StripeCheckoutCustom::widget([
    'action' => '/',
    'name' => 'Demo test',
    'description' => '2 widgets ($20.00)',
    'amount' => 2000,
    'image' => '/128x128.png',
    'buttonOptions' => [
        'class' => 'btn btn-lg btn-success',
    ],
    'tokenFunction' => new JsExpression('function(token) { alert("Here you should control your token."); }'),
    'openedFunction' => new JsExpression('function() { alert("Model opened"); }'),
    'closedFunction' => new JsExpression('function() { alert("Model closed"); }'),
]);
?>