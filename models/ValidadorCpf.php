<?php

class ValidadorCpf extends Validador
{
    public function cpfValido(string $cpf): bool
    {
        return $this->isCpf($cpf) === true
            && $this->verificaNumerosIguais($cpf, 11) === true
            && $this->validarDigitos($cpf) === true
        ? true
        : false;
    }

    private function isCpf(string $cpf): bool
    {
        $regexCpf = '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/';
        return preg_match($regexCpf, $cpf);
    }

    private function removeFormatacao(string $cpf): string
    {
        return str_replace(['.', '-'], '', $cpf);
    }


    private function calculaPrimeiroDigito(string $cpf): int
    {
        $digito = 0;
        for ($i = 0, $peso = 10; $i <= 8; $i++, $peso--) {
            $digito += $cpf[$i] * $peso;
        }
        return $this->calculaDigito($digito);
    }

    private function calculaSegundoDigito(string $cpf): int
    {
        $digito = 0;
        for ($i = 0, $peso = 11; $i <= 9; $i++, $peso--) {
            $digito +=  $cpf[$i] * $peso;
        }
        return $this->calculaDigito($digito);
    }

    private function validarDigitos(string $cpf): bool
    {
        $cpf = $this->removeFormatacao($cpf);
        return $this->calculaPrimeiroDigito($cpf) === $cpf[9]
            && $this->calculaSegundoDigito($cpf) === $cpf[11];
    }
}
