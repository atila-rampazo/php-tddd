<?php

namespace Core\Payment;

class PaymentController
{
    private PaymentInterface $payment;

    public function __construct(PaymentInterface $repository)
    {
        $this->payment = $repository;
    }

    public function execute():bool
    {
        return $this->payment->makePayment([]);
    }
}