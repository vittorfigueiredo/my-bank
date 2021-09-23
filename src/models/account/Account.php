<?php

class Account {
  public $number;
  protected $type;
  private $owner;
  private $balance;
  private $status;

  public function __construct() {
    $this->balance = 0;
    $this->status = false;
  }

  public function openAccount($owner,  $type) {
    if ($type === "CONTA_POUPANCA") {
      $this->owner = $owner;
      $this->type = $type;
      $this->balance = 50.00;
      $this->status = true;

      return json_encode([
        "success" => true,
        "message" => "Conta poupança aberta com sucesso!",
      ]);
    }

    if ($type === "CONTA_CORRENTE") {
      $this->owner = $owner;
      $this->type = $type;
      $this->balance = 150.00;
      $this->status = true;

      return json_encode([
        "success" => true,
        "message" => "Conta corrente aberta com sucesso!",
      ]);
    }
    return json_encode([
      "success" => false,
      "message" => "Tipo de conta não reconhecido pelo sistema!",
    ]);
  }

  public function closeAccount() {
    if (!$this->balance === 0) {
      return json_encode([
        "success" => false,
        "message" => "O saldo da conta deve ser R$ 0,00 para poder ser encerrada!",
      ]);
    }

    $this->status = false;
    $this->type = "";

    return json_encode([
      "success" => true,
      "message" => "Conta encerrada com sucesso!",
    ]);
  }

  public function deposit($amount) {
    $this->balance += $amount;

    return json_encode([
      "success" => true,
      "message" => "Depósito realizado com sucesso!",
    ]);
  }

  public function withdraw($amount) {
    $this->balance - $amount;

    return json_encode([
      "success" => true,
      "message" => "Saque realizado com sucesso!",
    ]);
  }

  public function payMonthly() {
    if ($this->type === "CONTA_POUPANCA") {
      $this->balance - 20;

      return json_encode([
        "success" => true,
        "message" => "Valor de R$ 20,00 descontado de sua conta bancária!",
      ]);
    }

    if ($this->type === "CONTA_CORRENTE") {
      $this->balance - 12;

      return json_encode([
        "success" => true,
        "message" => "Valor de R$ 12,00 descontado de sua conta bancária!",
      ]);
    }
    return json_encode([
      "success" => false,
      "message" => "Ocorreu um erro inesperado ao tentar pagar a mensalidade!",
    ]);
  }

  public function getNumber() {
    return $this->number;
  }

  public function getType() {
    return $this->type;
  }

  public function getOwner() {
    return $this->owner;
  }

  public function getBalance() {
    return $this->balance;
  }

  public function getStatus() {
    return $this->status;
  }

  public function setNumber ($amount) {
    $this->number = $amount;
  }

  public function setType( $type) {
    $this->type = $type;
  }

  public function setOwner( $owner) {
    $this->owner = $owner;
  }

  public function setBalance ($amount) {
    $this->balance = $amount;
  }

  public function setStatus($status) {
    $this->status = $status;
  }
}