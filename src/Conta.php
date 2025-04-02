<?php

class Conta {

    public string $cpfTitular;
    public string $nomeTitular;
    public float $saldo = 0;


    public function sacar(float $valorSaque): void
    {

        if ($valorSaque > $this->saldo) {
            echo "Saldo insuficiente para saque.";
            return;
        }

        $this->saldo -= $valorSaque;

        echo "Saque de R$ {$valorSaque} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function depositar(float $valorDeposito): void
    {
        if ($valorDeposito <= 0) {
            echo "Valor de depósito inválido.";
            return;
        }

        $this->saldo += $valorDeposito;

        echo "Depósito de R$ {$valorDeposito} realizado com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

    public function transferir(float $valorTransferencia, Conta $contaDestino): void
    {
        if ($valorTransferencia > $this->saldo) {
            echo "Saldo insuficiente para transferência.";
            return;
        }

        $this->sacar($valorTransferencia);
        $contaDestino->depositar($valorTransferencia);

        echo "Transferência de R$ {$valorTransferencia} realizada com sucesso. Saldo atual: R$ {$this->saldo}.";
    }

}
