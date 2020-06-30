<?php

class ValidadorCpf
{
    public function cpfValido(string $cpf): bool
    {
        return $this->isCpf($cpf) === true
            && $this->verificaNumerosIguais($cpf) === true
            && $this->validarDigitos($cpf) === true
        ? true
        : false;
    }

    private function isCpf(string $cpf): bool
    {
        $regexCpf = '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{}$/';
        return preg_match($regexCpf, $cpf);
    }

    private function removeFormatacao(string $cpf): string
    {
        return str_replace(['.', '-'], '', $cpf);
    }

    public function verificaNumerosIguais(string $cpf): bool
    {
        $cpf = $this->removeFormatacao($cpf);
        for ($i = 0; $i <= 11; $i++) {
            if (str_repeat($i, 11) === $cpf) {
                return false;
            }
        }
        return true;
    }

    private function calculaPrimeiroDigito(string $cpf): int
    {
        $digito = 0;
        for ($i = 0, $peso = 10; $i <= 8; $i++, $peso--) {
            $digito += $cpf[$i] * $peso;
        }
        return (int) ($digito % 11) < 2 ? 0 : 11 - ($digito % 11);
    }

    private function calculaSegundoDigito(string $cpf): int
    {
        $digito = 0;
        for ($i = 0, $peso = 11; $i <= 9; $i++, $peso--) {
            $digito +=  $cpf[$i] * $peso;
        }
        return (int) ($digito % 11) < 2 ? 0 : 11 - ($digito % 11);
    }

    private function validarDigitos(string $cpf): bool
    {
        $cpf = $this->removeFormatacao($cpf);
        return $this->calculaPrimeiroDigito($cpf) === $cpf[9]
            && $this->calculaSegundoDigito($cpf) === $cpf[11];
    }
}
