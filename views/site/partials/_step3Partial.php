<?php
use app\helpers\HtmlHelper;

?>
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
    <div class="payment">
        <h4>Traveler's Information </h4>

        <div class="card">
            <p> Option 1 </p>
            <?= $form->field($model, 'travelerType')->radioList($model->getTravelerTypeList()); ?>
        </div>
        <div class="card cardy">
            <p> Traveler's Name</p>
            <?= $form->field($model, 'travelerName', ['inputOptions' => ['placeholder' => 'Name']]); ?>
        </div>
    </div>
    <div class="card cardy">
        <p>Home Addres</p>
        <?= $form->field($model, 'travelerAddress', ['inputOptions' => ['placeholder' => 'Address']]); ?>
    </div>
    <div class="clearfix"></div>
    <div class="card cardy">
        <p>Date of Birth</p>
        <?php
        echo $form->field($model, 'travelerDoBMonth')->
        dropDownList($model->getMonthNames(), HtmlHelper::GetDropDownListOptions('Month', 'month', false));
        echo $form->field($model, 'travelerDoBYear')->
        dropDownList(range(date("Y"), date("Y") + 5), HtmlHelper::GetDropDownListOptions('Year', 'year', false));
        ?>
    </div>
    <div class="card cardy">
        <p>Enter eMail Address</p>
    </div>
</div>