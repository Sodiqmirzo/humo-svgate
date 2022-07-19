<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class IiacsCardStatuseItemsDto extends BaseResponse
{
    public string $type;
    public string $actionCode;
    public string $actionDescription;
    public ?string $effectiveDate;
}
