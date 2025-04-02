<?php
class Titular
{
    private $cpf;
    private string $nome;

    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validateNome($nome);
        $this->nome = $nome;
    }

    public function getCpfTitular(): string
    {
        return $this->cpf->getCpfNumero();
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    private function validateNome(string $nome): void
    {
        if (empty($nome)) {
            throw new InvalidArgumentException("Nome inválido.");
        }

        if (strlen($nome) < 3) {
            throw new InvalidArgumentException("Nome deve ter pelo menos 3 caracteres.");
        }
    }
}
