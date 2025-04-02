<?php

class Conta
{
    private $titular;
    private float $saldo;

    private static $numeroDeContas = 0;


    public function __construct(Titular $titular)
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
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

    public static function getNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

    public function getTitular(): Titular
    {
        return $this->titular;
    }
}
