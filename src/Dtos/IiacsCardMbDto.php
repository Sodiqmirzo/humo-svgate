<?php

namespace HumoSvgate\HumoSvgateLaravel\Dtos;

use HumoSvgate\HumoSvgateLaravel\Response\BaseResponse;

class IiacsCardMbDto extends BaseResponse
{
    public string $state;
    public string $phone;
    public string $message;
}
