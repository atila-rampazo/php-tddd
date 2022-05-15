<?php

namespace Zensolutions;

class Cpf
{


    /**
     * @throws CpfInvalidException
     */
    public function __construct(public string $cpf)
    {
        if (!$this->validate($cpf)) {
            throw new CpfInvalidException("CPF inváliddo");
        }
    }

    public function validate(string $cpf): bool
    {
        if (!$cpf) {
            return false;
        }
        $cpf = $this->cleanCpf($cpf);

        if (!$this->isValidLength($cpf)) {
            return false;
        }

        if ($this->hasAllDigitsEquals($cpf)) {
            return false;
        }

        if (!$this->calculateCheckDigit($cpf)) {
            return false;
        }
        return true;
    }

    private function cleanCpf(string $cpf): string
    {
        return preg_replace("/[^0-9]/", "", $cpf);
    }

    private function isValidLength(array|string|null $cpf): bool
    {
        return strlen($cpf) === 11;
    }

    private function hasAllDigitsEquals(array|string|null $cpf): bool
    {
        return preg_match('/([0-9])\1{10}/', $cpf);
    }

    private function calculateCheckDigit(string $cpf): bool
    {
        $numberOfQuantityToLoop = [9, 10];

        foreach ($numberOfQuantityToLoop as $item) {
            $sum = 0;
            $numberToMultiplicate = $item + 1;

            for ($index = 0; $index < $item; $index++) {
                $sum += $cpf[$index] * ($numberToMultiplicate--);
            }

            $result = (($sum * 10) % 11);

            if ($cpf[$item] != $result) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->cpf;
    }

}