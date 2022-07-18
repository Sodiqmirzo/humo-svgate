<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class CardDto extends BaseResponse
{
    public string $pan;
    public string $label;
    public ?string $state;
    public ?string $expiry;
    public ServiceDto $Service;
    public ChargeDto $Charge;
}
