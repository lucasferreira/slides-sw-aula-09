<?php
require("Produto/Cadastro.php");
require("Cliente/Cadastro.php");

$produto = new \Produto\Cadastro();
$produto->save();

echo "<br />";

$cliente = new \Cliente\Cadastro();
$cliente->save();
