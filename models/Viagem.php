<?php

class Viagem
{

    private string $origem;
    private string $destino;
    private string $dataIda;
    private string $dataRetorno;
    private string $classe;
    private int $adultos;
    private int $criancas;
    private float $preco;

    public function __construct(
        string $origem,
        string $destino,
        string $dataIda,
        string $dataRetorno,
        string $classe,
        int $adultos,
        int $criancas,
        float $preco
    )
    {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->dataIda = $dataIda;
        $this->dataRetorno = $dataRetorno;
        $this->classe = $classe;
        $this->adultos = $adultos;
        $this->criancas = $criancas;
        $this->preco = $preco;
    }

    public function getOrigem(): string
    {
        return $this->origem;
    }

    public function setOrigem(string $origem): self
    {
        $this->origem = $origem;
        return $this;
    }

    public function getDestino(): string
    {
        return $this->destino;
    }

    public function setDestino(string $destino): self
    {
        $this->destino = $destino;
        return $this;
    }

    public function getDataIda(): string
    {
        return $this->dataIda;
    }

    public function setDataIda(string $dataIda): self
    {
        $this->dataIda = $dataIda;
        return $this;
    }

    public function getDataRetorno(): string
    {
        return $this->dataRetorno;
    }

    public function setDataRetorno(string $dataRetorno): self
    {
        $this->dataRetorno = $dataRetorno;
        return $this;
    }

    public function getClasse(): string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;
        return $this;
    }

    public function getAdultos(): int
    {
        return $this->adultos;
    }

    public function setAdultos(int $adultos): self
    {
        $this->adultos = $adultos;
        return $this;
    }

    public function getCriancas(): int
    {
        return $this->criancas;
    }

    public function setCriancas(int $criancas): self
    {
        $this->criancas = $criancas;
        return $this;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): self
    {
        $this->preco = $preco;
        return $this;
    }
}
