<?php
require_once("autoload.php");

use \Produto\Cadastro;

$produto = new Cadastro();
$produto->save();
