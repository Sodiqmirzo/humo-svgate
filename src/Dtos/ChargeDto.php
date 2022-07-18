<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class ChargeDto extends BaseResponse
{
    public string $agreementCharge;
    public string $chargeAccount;
}
