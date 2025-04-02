<?php

class Conta
{

    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;


    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->validateCpf($cpfTitular);
        $this->cpfTitular = $cpfTitular;
        $this->validateNome($nomeTitular);
        $this->nomeTitular = $nomeTitular;
        $this->saldo = 0;
    }

    public function saca(float $valorSaque)
    {

        if ($valorSaque > $this->saldo) {
            return "Saldo insuficiente para saque.";
        }

        $this->saldo -= $valorSaque;

        return "Saque de R$ {$valorSaque} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function deposita(float $valorDeposito)
    {
        if ($valorDeposito <= 0) {
            return "Valor de depósito inválido.";
        }

        $this->saldo += $valorDeposito;

        return "Depósito de R$ {$valorDeposito} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function transfere(float $valorTransferencia, Conta $contaDestino)
    {
        if ($valorTransferencia > $this->saldo) {
            return "Saldo insuficiente para transferência.";
        }

        $this->saca($valorTransferencia);
        $contaDestino->deposita($valorTransferencia);

        return "Transferência de R$ {$valorTransferencia} realizada com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }


    public function getCpfTitular(): string
    {
        return $this->cpfTitular;

    }

    public function getNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    private function validateCpf(string $cpf): void
    {
        $cpf = preg_replace('/\D/', '', $cpf);

        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            throw new InvalidArgumentException("CPF inválido.");
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$t] != $d) {
                throw new InvalidArgumentException("CPF inválido.");
            }
        }
    }

    private function validateNome(string $nomeTitular): void
    {
        if (empty($nomeTitular)) {
            throw new InvalidArgumentException("Nome inválido.");
        }

        if (strlen($nomeTitular) < 3) {
            throw new InvalidArgumentException("Nome deve ter pelo menos 3 caracteres.");
        }
    }
}
