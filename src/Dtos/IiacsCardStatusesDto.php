<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class IiacsCardStatusesDto extends BaseResponse
{
    public IiacsCardStatuseItemsDto $item;
}
