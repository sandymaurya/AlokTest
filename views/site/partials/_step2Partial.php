<?php
use app\helpers\HtmlHelper;

?>
<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
    <div class="delivery">
        <h4>Select Booking Date of Tour</h4>
        <?php
        echo $form->field($model, 'bookingDay')->
        dropDownList(range(1, 30), HtmlHelper::GetDropDownListOptions('Date', 'date', false));

        echo $form->field($model, 'bookingMonth')->
        dropDownList($model->getMonthNames(), HtmlHelper::GetDropDownListOptions('Month', 'month', false));

        echo $form->field($model, 'bookingYear')->
        dropDownList(range(date("Y"), date("Y") + 5), HtmlHelper::GetDropDownListOptions('Year', 'year', false));
        ?>
    </div>
    <div class="clearfix"></div>

    <div class="delivery-ad">
        <h4>Special Needs / Handicap / Honeymon / Large Groups</h4>
        <?= $form->field($model, 'bookingSpecialNeeds')->textarea(['inputOptions' => ['placeholder' => "Basic info & Questions"]]); ?>
    </div>
    <div class="step-f step-e">
        <input type="submit" value="STEP 3" aria-controls="tab_item-2" role="tab"/>
    </div>
</div>