<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class RateDto extends BaseResponse
{
    public string $owner;
    public string $rateSet;
    public int $directQuotation;
    public string $baseCurrency;
    public string $counterCurrency;
    public string $effectiveDate;
    public string $sellRate;
    public string $buyRate;
}
