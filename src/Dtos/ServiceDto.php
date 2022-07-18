<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class ServiceDto extends BaseResponse
{
    public string $serviceId;
    public string $serviceChannel;
}
