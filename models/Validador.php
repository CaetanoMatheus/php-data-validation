<?php

abstract class Validador
{
    protected function removeFormatacao(string $data): string
    {
        return str_replace(['.', '-', '/'], '', $data);
    }

    protected function verificaNumerosIguais(string $data, int $limite): bool
    {
        $data = $this->removeFormatacao($data);
        for ($i = 0; $i <= $limite; $i++) {
            if (str_repeat($i, $limite) === $data) {
                return false;
            }
        }
        return true;
    }

    protected function calculaDigito(int $digito)
    {
        return ($digito % 11) < 2 ? 0 : 11 - ($digito % 11);
    }
}
