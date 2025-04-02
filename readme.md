# 📌 Estudos de Programação Orientada a Objetos (POO) em PHP

Este repositório contém estudos e testes relacionados à **Programação Orientada a Objetos (POO)** em PHP. O objetivo é entender conceitos como a criação de classes, instância de objetos, manipulação de atributos e métodos.

---

## 📌 Requisitos

Para rodar os exemplos deste repositório, você precisa:

- Ter o **PHP** instalado (`>= 7.4` recomendado);
- Um ambiente de desenvolvimento como **XAMPP**, **Laravel Sail**, **Docker** ou **PHP CLI**;
- Um editor de código, como **VS Code** ou **PHPStorm**.

### ⚡ Execução dos testes
Inicialmente, os testes foram feitos utilizando o terminal interativo do PHP:
```sh
php -a
```

---

## 📌 Criando uma conta e manipulando saldo

O código abaixo demonstra a criação de uma conta bancária usando a classe `Conta`:

```php
require 'src/Conta.php';

$firstAccount = new Conta();
$firstAccount->cpfTitular = '189.954.478-67';
$firstAccount->nomeTitular = 'Carlos Esposito';
$firstAccount->saldo = 1000;

var_dump($firstAccount);
```

---

## 📌 Teste de referência em PHP

Em PHP, quando atribuímos um objeto a outra variável, ele é passado **por referência** (não por cópia). Isso significa que qualquer alteração feita em `$teste` também será refletida em `$firstAccount`:

```php
$teste = $firstAccount;
$teste->saldo -= 200;
var_dump($teste);
```

**Saída esperada:**
```php
object(Conta)#1 (3) {
  ["cpfTitular"]=> string(14) "189.954.478-67"
  ["nomeTitular"]=> string(15) "Carlos Esposito"
  ["saldo"]=> float(800)
}
```

Verificando o saldo da `$firstAccount`:

```php
var_dump($firstAccount);
```

**Saída esperada:**
```php
object(Conta)#1 (3) {
  ["cpfTitular"]=> string(14) "189.954.478-67"
  ["nomeTitular"]=> string(15) "Carlos Esposito"
  ["saldo"]=> float(800)
}
```

---

## 📌 Criando uma nova conta (`$secondAccount`) e testando operações

```php
$secondAccount = new Conta();
$secondAccount->depositar(0);  // Teste com valor inválido
```

**Saída esperada:**
```
Valor de depósito inválido.
```

```php
$secondAccount->depositar(1000);
```

**Saída esperada:**
```
Depósito de R$ 1000 realizado com sucesso. Saldo atual: R$ 1000.
```

```php
echo $secondAccount->saldo;
$secondAccount->sacar(500);
```

**Saída esperada:**
```
Saque de R$ 500 realizado com sucesso. Saldo atual: R$ 500.
```

```php
$secondAccount->sacar(50);
echo $secondAccount->saldo;
```

**Saída esperada:**
```
Saque de R$ 50 realizado com sucesso. Saldo atual: R$ 450.
450
```

Após essas operações, foi realizada uma refatoração na base de código, alterando o uso de `echo` para `return` e aplicando **early returns**, evitando o uso de `else` desnecessários e mantendo a estrutura do código mais limpa e direta.

---

## 📌 Testando o método de transferência

```php
$firstAccount = new Conta();
$secAccount = new Conta();

echo $firstAccount->depositar(1000);
```

**Saída esperada:**
```
Depósito de R$ 1000 realizado com sucesso. Saldo atual: R$ 1000.
```

```php
echo $firstAccount->transferir(200, $secAccount);
```

**Saída esperada:**
```
Transferência de R$ 200 realizada com sucesso. Saldo atual: R$ 800.
```

```php
echo $secAccount->saldo;
```

**Saída esperada:**
```
200
```

---

## 📌 Criando o arquivo `banco.php`

Foi realizada uma refatoração nos métodos de validação, optando por **`throw` ao invés de `exit`**. O `throw` permite um melhor monitoramento da execução, pois pode ser capturado em um bloco `try-catch`, além de evitar a interrupção abrupta do script como acontece com `exit`.

Além disso, foi implementada uma validação mais robusta para CPF, utilizando um algoritmo real de validação para garantir maior precisão.

---

## 📌 Criando a classe `Titular`

Durante a refatoração, observou-se que muitos atributos e métodos não estavam diretamente relacionados à classe `Conta`. Dessa forma, foi criada uma nova classe chamada `Titular`, responsável por armazenar e gerenciar informações do titular da conta, como **nome** e **CPF**.

Agora, a `Conta` possui um **titular**, que por sua vez possui um **nome** e um **CPF**, melhorando a separação de responsabilidades e tornando o código mais modular e coeso.

## 📌 Criando a classe `CPF`

Pensando em um cenário hipotetico foi criada também uma classe de CPF, pensando que esse é um atributo que pode estar presente em outras classes, como de Funcionários, Gerentes, Beneficiarios e entre outros. 
---

É interessante dado o contexto para fins de aprofundamento criar uma classe documento, onde a mesma recebe um atributo do tipo cpnj ou cpf, tenha suas validações e a classe Titular utilize o documento

## 📌 Conclusão

Este repositório contém experimentações e boas práticas aplicadas à **Programação Orientada a Objetos em PHP**, incluindo refatorações para melhorar a estrutura do código, aplicação do conceito de encapsulamento e boas práticas de validação.

🚀 **Em constante evolução!**

