<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class CustomerDto extends BaseResponse
{
    public string $customerId;
    public string $bankId;
    public string $cardholderName;
    public CardDto $Card;
}
