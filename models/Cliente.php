<?php

require_once 'ValidadorCpf.php';

class Cliente
{
    private string $nome;
    private string $cpfCnpj;
    private string $telefone;
    private string $email;
    private string $cep;
    private string $rua;
    private string $bairro;
    private string $numero;
    private string $cidade;
    private string $uf;

    public function __construct(
        string $nome,
        string $cpfCnpj,
        string $telefone,
        string $email,
        string $cep,
        string $rua,
        string $bairro,
        string $numero,
        string $cidade,
        string $uf
    ) {
        if (!$this->cepValido($cep)) {
            throw new Exception('CEP no formato inválido');
        }
        if (!$this->telefoneValido($telefone)) {
            throw new Exception('Telefone no formato inválido');
        }
        if (!$this->emailValido($email)) {
            throw new Exception('Email não é válido');
        }
        if (!(new ValidadorCpf())->cpfValido($cpfCnpj)) {
            throw new Exception('CPF não é válido');
        }

        $this->nome = $nome;
        $this->cpfCnpj = $cpfCnpj;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cep = $cep;
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }

    public function cepValido(string $cep): bool
    {
        if (strlen($cep) !== 10) {
            return false;
        }
        $regexCep = '/^[0-9]{2}\.[0-9]{3}\-[0-9]{3}$/';
        return preg_match($regexCep, $cep);
    }

    public function telefoneValido(string $telefone): bool
    {
        if (strlen($telefone) !== 15) {
            return false;
        }
        $regexTelefone = '/^\([0-9]{2}\)[0-9]{5}\-[0-9]{4}$/';
        return preg_match($regexTelefone, str_replace(' ', '', $regexTelefone));
    }

    public function emailValido(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpfCnpj(): string
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj(string $cpfCnpj): self
    {
        $this->cpfCnpj = $cpfCnpj;
        return $this;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): self
    {
        $this->cep = $cep;
        return $this;
    }

    public function getRua(): string
    {
        return $this->rua;
    }

    public function setRua(string $rua): self
    {
        $this->rua = $rua;
        return $this;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): self
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getUf(): string
    {
        return $this->uf;
    }

    public function setUf(string $uf): self
    {
        $this->uf = $uf;
        return $this;
    }
}
