<?php

namespace HumoSvgate\HumoSvgateLaravel;

use HumoSvgate\HumoSvgateLaravel\Dtos\CardDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\ChargeDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\EmailDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\PhoneDto;
use HumoSvgate\HumoSvgateLaravel\Response\Customer;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerActivate;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerChangeCardholdersMessageLang;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerChangePhoneNumber;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerDeactivate;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerEditCard;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerList;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerRemoveCard;
use HumoSvgate\Trait\Base;

class HumoSvgateLaravel
{
    use Base;

    public const STATUS_APPROVED = 000;
    public const STATUS_DECLINE_RESTRICTED_CARD = 104;
    public const STATUS_CARD_NOT_EFFECTIVE = 125;

    public function customerActivate(string $bankId, string $language = null, ChargeDto $chargeDto, CardDto $cardDto, PhoneDto $phoneDto, EmailDto $emailDto): CustomerActivate
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/activate', [
            'bankId' => $bankId,
            'language' => $language,
            'Charge' => $chargeDto,
            'Card' => $cardDto,
            'Phone' => $phoneDto,
            'Email' => $emailDto,
        ]);

        return new CustomerActivate($response);
    }

    public function getCustomer(string $customerId, string $bankId): Customer
    {
        $response = $this->sendRequest('post', '/v2/mb/customer', [
            'customerId' => $customerId,
            'bankId' => $bankId,
        ]);

        return new Customer($response);
    }

    public function getCustomerList(string $phone, string $bankId): CustomerList
    {
        $response = $this->sendRequest('post', '/v2/mb/customer-list', [
            'phone' => $phone,
            'bankId' => $bankId,
        ]);

        return new CustomerList($response);
    }

    public function customerDeactivate(string $customerId): CustomerDeactivate
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/deactivate', [
            'customerId' => $customerId,
        ]);

        return new CustomerDeactivate($response);
    }

    public function customerChangePhoneNumber(string $customerId, PhoneDto $phoneDto): CustomerChangePhoneNumber
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/change-phone-number', [
            'customerId' => $customerId,
            'Phone' => $phoneDto,
        ]);

        return new CustomerChangePhoneNumber($response);
    }

    public function customerChangeCardholdersMessageLang(string $customerId, string $language): CustomerChangeCardholdersMessageLang
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/change-cardholders-message-lang', [
            'customerId' => $customerId,
            'language' => $language,
        ]);

        return new CustomerChangeCardholdersMessageLang($response);
    }

    public function customerRemoveCard(string $pan): CustomerRemoveCard
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/remove-card', [
            'Card' => [
                'pan' => $pan,
            ],
        ]);

        return new CustomerRemoveCard($response);
    }

    public function customerEditCard(CardDto $cardDto): CustomerEditCard
    {
        $response = $this->sendRequest('post', '/v2/mb/customer/edit-card', [
            'Card' => $cardDto,
        ]);

        return new CustomerEditCard($response);
    }
}
