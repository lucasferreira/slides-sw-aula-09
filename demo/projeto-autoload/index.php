<?php
require_once("autoload.php");

$produto = new \Produto\Cadastro();
$produto->save();

echo "<br />";

$cliente = new \Cliente\Cadastro();
$cliente->save();

echo "<br />";

$carro = new \Carro();
$carro->anda();
