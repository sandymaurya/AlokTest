<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OrderModel extends Model
{
    public $ticketTime;
    public $ticketHotel;
    public $ticketQuantity;
    public $ticketPromoCode;
    public $bookingDate;
    public $bookingDay;
    public $bookingMonth;
    public $bookingYear;
    public $bookingSpecialNeeds;
    public $travelerType;
    public $travelerName;
    public $travelerAddress;
    public $travelerDoBMonth;
    public $travelerDoBYear;
    public $travelerEmail;
    public $travelerPersonNames;
    public $paymentOptionCardType;
    public $paymentOptionCardHolderName;
    public $paymentOptionCardNumber;
    public $paymentOptionExpiryMonth;
    public $paymentOptionExpiryYear;
    public $paymentOptionCVV;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['ticketTime', 'ticketHotel', 'ticketQuantity', 'ticketPromoCode'], 'required', "on" => "step1"],
            [['bookingDate', 'bookingSpecialNeeds'], 'required', 'on' => 'step2'],
            [['bookingDate'], "date", 'format' => 'php:Y-m-d', 'message' => 'Invalid booking date.', 'on' => 'step2'],
            [['travelerType', 'travelerName', 'travelerAddress', 'travelerEmail'], 'required', 'on' => 'step3', 'message'=>'This field cannot be empty.'],
            [['travelerPersonNames'], 'required', 'on' => 'step3', 'when' => function ($model) {
                return $model->travelerType == $model->getTravelerTypeList()['Family'] ;
            }, 'message' => 'Names cannot be empty.'],
            [['travelerDoBMonth'], 'required', 'on' => 'step3', 'message' => "Select Month."],
            [['travelerDoBYear'], 'required', 'on' => 'step3', 'message' => "Select Year."],
            [['travelerEmail'], 'email', 'on' => 'step3', 'message'=>'Email address is not valid.'],
            [['travelerName'],'match','pattern'=>'/[A-Za-z .]{2,100}$/', 'on' => 'step3'],
            [['paymentOptionCardType', 'paymentOptionCardHolderName', 'paymentOptionCardNumber', 'paymentOptionExpiryMonth', 'paymentOptionExpiryYear', 'paymentOptionCVV'], 'required', 'on' => 'step4'],
            // email has to be a valid email address
            //['travelerEmail', 'email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }

    public function getTimeList()
    {
        return [
            '09am' => '09 a.m.',
            '11am' => '11 a.m.',
            '01pm' => '01 p.m.',
            '03pm' => '03 p.m.'
        ];
    }


    public function getHotelsList()
    {
        return [
            "AX" => "Outrigger",
            "AF" => "Marriott",
            "AL" => "Hilton Hawaiian",
            "DZ" => "St. Regis",
            "AS" => "Four Seasons",
            "AD" => "Ritz Carlton",
            "AO" => "Auqua Hotels",
            "AI" => "Shearton",
            "AQ" => "Double Tree",
            "AQ" => "Other Hotel"
        ];
    }

    public function getSlider2Images()
    {
        return [
            [
                'url' => '/mm-images/downloaded/pawn-stars-tours.png',
                'height' => '200',
                'width' => '357'
            ],
            [
                'url' => '/mm-images/downloaded/book-now-mgm.png',
                'height' => '200',
                'width' => '357'
            ],
            [
                'url' => '/mm-images/downloaded/pawn-stars-gold-silver-pawn-shop.jpg',
                'height' => '200',
                'width' => '357'
            ]
        ];
    }

    public function getTravelerTypeList()
    {
        return [
            'Adult' => 'Adult',
            'Child' => 'Child',
            'Family' => 'Family'
        ];
    }

    public function getPaymentOptionCardTypeList()
    {
        return [
            "Visa" => "Visa",
            "MC" => "MC",
            "Amex" => "Amex"
        ];
    }

    public function getMonthNames()
    {
        return array_combine(range(1,12), ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"]);
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'travelerDoBMonth' => 'DOB Month',
            'travelerDoBYear' => 'DOB Year',
            'CVV' => 'CVV Number',
        ];
    }
    
}
