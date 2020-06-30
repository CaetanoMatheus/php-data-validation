<?php

class ValidadorCnpj extends Validador
{
    public function cnpjValido(string $cnpj): bool
    {
        return $this->isCnpj($cnpj) === true
            && $this->verificaNumerosIguais($cnpj, 14) === true
            && $this->validarDigitos($cnpj) === true
        ? true
        : false;
    }

    private function isCnpj(string $cnpj): bool
    {
        $regexCnpj = '/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}$/';
        return preg_match($regexCnpj, $cnpj);
    }

    private function calculaPrimeiroDigito(string $cnpj): int
    {
        $digito = 0;
        for ($i = 0, $peso = 5; $i <= 11; $i++, $peso--) {
            $peso = $peso < 2 ? 9 : $peso;
            $digito += $cnpj[$i] * $peso;
        }
        return $this->calculaDigito($digito);
    }

    private function calculaSegundoDigito(string $cnpj): int
    {
        $digito = 0;
        for ($i = 0, $peso = 6; $i <= 12; $i++, $peso--) {
            $peso = $peso < 2 ? 9 : $peso;
            $digito +=  $cnpj[$i] * $peso;
        }
        return $this->calculaDigito($digito);
    }

    private function validarDigitos(string $cnpj): bool
    {
        $cnpj = $this->removeFormatacao($cnpj);
        return $this->calculaPrimeiroDigito($cnpj) === $cnpj[12]
            && $this->calculaSegundoDigito($cnpj) === $cnpj[13];
    }
}
