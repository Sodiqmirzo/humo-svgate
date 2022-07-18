<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class PhoneDto extends BaseResponse
{
    public string $msisdn;
    public ?string $deliveryChannel;
}
