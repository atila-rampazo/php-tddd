<?php

namespace Core\Payment;

interface PaymentInterface
{

    public function createPlan(): bool;

    public function findClientById(string $string): ?object;

    public function makePayment(): bool;
}