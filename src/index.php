<?php

require_once __DIR__ . "/controllers/AccountController.php";

$jubileu->openAccount("Jubileu", "CONTA_POUPANCA");
$jubileu->deposit(300);

$creusa->openAccount("Creusa", "CONTA_CORRENTE");
$creusa->deposit(500);

$jubileu = [
  "owner" => $jubileu->getOwner(),
  "balance" => $jubileu->getBalance(),
  "type" => $jubileu->getType(),
  "status" => $jubileu->getStatus(),
];
$creusa = [
  "owner" => $creusa->getOwner(),
  "balance" => $creusa->getBalance(),
  "type" => $creusa->getType(),
  "status" => $creusa->getStatus(),
];

echo json_encode([
  "success" => true,
  "name" => "MyBank",
  "clientS" => [
    $jubileu,
    $creusa,
  ]
]);