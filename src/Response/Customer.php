<?php

namespace HumoSvgate\HumoSvgateLaravel\Response;

use HumoSvgate\HumoSvgateLaravel\Dtos\CardDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\ChargeDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\EmailDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\PhoneDto;

class Customer extends BaseResponse
{
    public string $customerId;
    public string $bankId;
    public string $cardholderName;
    public string $state;
    public string $language;
    public ChargeDto $Charge;
    public CardDto $Card;
    public PhoneDto $Phone;
    public EmailDto $Email;
}
