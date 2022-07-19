<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class CustomerCardByPassportDto extends BaseResponse
{
    public string $name;
    public string $card;
    public string $expiry;
}
