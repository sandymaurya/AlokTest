$(document).ready(function () {
    var selectorPrefix = '#ticketmodel-';
    var step1SubmitSelector = '#step1-submit';
    var step2SubmitSelector = '#step2-submit';
    var step3SubmitSelector = '#step3-submit';
    var step4SubmitSelector = '#step4-submit';


    var ticketTimeSelector = selectorPrefix + 'tickettime';
    var ticketHotelSelector = selectorPrefix + 'tickethotel';
    var ticketQuantitySelector = selectorPrefix + 'ticketquantity';
    var ticketPromoCodeSelector = selectorPrefix + 'ticketpromocode';
    var bookingDaySelector = selectorPrefix + 'bookingDay';
    var bookingMonthSelector = selectorPrefix + 'bookingMonth';
    var bookingYearSelector = selectorPrefix + 'bookingYear';
    var bookingSpecialNeedsSelector = selectorPrefix + 'bookingSpecialNeeds';
    var travelerTypeSelector = selectorPrefix + 'travelerType';
    var travelerNameSelector = selectorPrefix + 'travelerName';
    var travelerAddressSelector = selectorPrefix + 'travelerAddress';
    var travelerDoBMonthSelector = selectorPrefix + 'travelerDoBMonth';
    var travelerDoBYearSelector = selectorPrefix + 'travelerDoBYear';
    var travelerEmailSelector = selectorPrefix + 'travelerEmail';
    var travelerPersonNamesSelector = selectorPrefix + 'travelerPersonNames';
    var paymentOptionCardTypeSelector = selectorPrefix + 'paymentOptionCardType';
    var paymentOptionCardHolderNameSelector = selectorPrefix + 'paymentOptionCardHolderName';
    var paymentOptionCardNumberSelector = selectorPrefix + 'paymentOptionCardNumber';
    var paymentOptionExpiryMonthSelector = selectorPrefix + 'paymentOptionExpiryMonth';
    var paymentOptionExpiryYearSelector = selectorPrefix + 'paymentOptionExpiryYear';
    var paymentOptionCVVSelector = selectorPrefix + 'paymentOptionCVV';

    $(step1SubmitSelector).click(function () {
        var model = {
            ticketTime: $(ticketTimeSelector).val(),
            ticketHotel: $(ticketHotelSelector).val(),
            ticketQuantity: $(ticketQuantitySelector).val(),
            ticketPromoCode: $(ticketPromoCodeSelector).val()
        };
        var formData = JSON.stringify(model);

        $.post('/order/process', model).done(function (data) {
            alert(data);
        })
    });

    $("#frmBookTicket").submit(function () {
        alert($(this).serialize());
    });
});