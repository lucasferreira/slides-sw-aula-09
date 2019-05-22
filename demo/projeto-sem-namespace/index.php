<?php
require("Produto/Cadastro.php");
require("Cliente/Cadastro.php");

$produto = new Cadastro();
$produto->save();
