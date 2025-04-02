<?php

class Conta
{

    public string $cpfTitular;
    public string $nomeTitular;
    public float $saldo = 0;


    public function sacar(float $valorSaque)
    {

        if ($valorSaque > $this->saldo) {
            return "Saldo insuficiente para saque.";
        }

        $this->saldo -= $valorSaque;

        return "Saque de R$ {$valorSaque} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function depositar(float $valorDeposito)
    {
        if ($valorDeposito <= 0) {
            return "Valor de depósito inválido.";
        }

        $this->saldo += $valorDeposito;

        return "Depósito de R$ {$valorDeposito} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function transferir(float $valorTransferencia, Conta $contaDestino)
    {
        if ($valorTransferencia > $this->saldo) {
            return "Saldo insuficiente para transferência.";
        }

        $this->sacar($valorTransferencia);
        $contaDestino->depositar($valorTransferencia);

        return "Transferência de R$ {$valorTransferencia} realizada com sucesso. Saldo atual: R$ {$this->saldo}.";
    }
}
