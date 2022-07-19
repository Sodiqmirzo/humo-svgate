<?php

namespace HumoSvgate\HumoSvgateLaravel;

use HumoSvgate\HumoSvgateLaravel\Dtos\CardDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\ChargeDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\EmailDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\PhoneDto;
use HumoSvgate\HumoSvgateLaravel\Dtos\RateDto;
use HumoSvgate\HumoSvgateLaravel\Response\Customer;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerActivate;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerCardByPassport;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerChangeCardholdersMessageLang;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerChangePhoneNumber;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerDeactivate;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerEditCard;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerList;
use HumoSvgate\HumoSvgateLaravel\Response\CustomerRemoveCard;
use HumoSvgate\HumoSvgateLaravel\Response\ExchangeRate;
use HumoSvgate\HumoSvgateLaravel\Response\IiacsCard;
use HumoSvgate\HumoSvgateLaravel\Response\TransactionScoring;
use HumoSvgate\Trait\Base;

class HumoSvgateLaravel
{
    use Base;

    public const STATUS_APPROVED = 000;
    public const STATUS_DECLINE_RESTRICTED_CARD = 104;
    public const STATUS_CARD_NOT_EFFECTIVE = 125;
    public const STATUS_PICK_UP_RESTRICTED_CARD = 204;
    public const STATUS_PICK_UP_SPECIAL_CONDITIONS = 207;
    public const STATUS_PICK_UP_LOST_CARD = 208;
    public const STATUS_PICK_UP_STOLEN_CARD = 209;
    public const STATUS_DECLINE_CARD_IS_NOT_ACTIVE_AT_BANK_WILL = 280;
    public const STATUS_DECLINE_CARD_IS_NOT_ACTIVE_AT_CARDHOLDER_WILL = 281;

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

    public function iiacsCard(string $primaryAccountNumber, int $mbFlag): IiacsCard
    {
        $response = $this->sendRequest('post', '/v2/iiacs/card', [
            'primaryAccountNumber' => $primaryAccountNumber,
            'mb_flag' => $mbFlag,
        ]);

        return new IiacsCard($response);
    }

    public function customerCardByPassport(string $serialNo, string $idCard): CustomerCardByPassport
    {
        $response = $this->sendRequest('post', '/cs/v1/customer/cards/by-passport', [
            'serial_no' => $serialNo,
            'id_card' => $idCard,
        ]);

        return new CustomerCardByPassport($response);
    }

    public function customerCardByPersonCode(string $personCode): CustomerCardByPassport
    {
        $response = $this->sendRequest('post', '/cs/v1/customer/cards/by-person-code', [
            'person_code' => $personCode,
        ]);

        return new CustomerCardByPassport($response);
    }

    public function transactionScoring(string $card, string $dateFrom, string $dateTo): TransactionScoring
    {
        $response = $this->sendRequest('post', '/cs/v1/transactions/scoring', [
            'card' => $card,
            'date_from' => $dateFrom,
            'date_to' => $dateTo,
        ]);

        return new TransactionScoring($response);
        //TODO asking response
    }

    public function exchangeRate(RateDto $rate): ExchangeRate
    {
        $response = $this->sendRequest('post', '/v2/ccr2/exchange-rates', [
            'rate' => $rate,
        ]);

        return new ExchangeRate($response);
    }
}
