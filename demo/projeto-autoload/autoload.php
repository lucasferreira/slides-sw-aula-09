<?php
function autoloadDemo($className) {
  $classFile = str_replace("\\", "/", $className) . ".php";
  require_once (__DIR__ . '/classes/' . $classFile);
}

spl_autoload_register('autoloadDemo');
