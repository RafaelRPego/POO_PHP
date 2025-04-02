<?php

class CPF
{
    private string $cpfnumero;

    public function __construct(string $cpfnumero)
    {
        $this->validateCpf($cpfnumero);
        $this->cpfnumero = $cpfnumero;
    }

    public function getCpfNumero(): string
    {
        return $this->cpfnumero;
    }

    private function validateCpf(string $cpfnumero): void
    {
        $cpfnumero = preg_replace('/\D/', '', $cpfnumero);

        if (strlen($cpfnumero) !== 11 || preg_match('/(\d)\1{10}/', $cpfnumero)) {
            throw new InvalidArgumentException("CPF inválido.");
        }

        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpfnumero[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpfnumero[$t] != $d) {
                throw new InvalidArgumentException("CPF inválido.");
            }
        }
    }
}
