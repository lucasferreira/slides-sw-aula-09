name: capa

.capa-titulo[

# Soluções WEB

]

.capa-subtitulo[

### Prof. Lucas Ferreira

]

---

class: center, middle
count: false

# PHP Moderno e seus Frameworks

.center[.php-img[![LOGO!](./img/elephant.png)]]

---

## Paradigmas de programação

O PHP é uma linguagem dinâmica e flexível, que suporta uma variedade de técnicas de programação, como programação funciona e OOP

--

Dada a evolução constante da linguagem com o passar dos anos, o PHP ganhou em sua versão 5.0 um sólido modelo de orientação a objetos

--

O PHP atualmente possui um conjunto completo de funcionalidades de programação orientada a objetos, incluindo suporte à classes, classes abstratas, interfaces, herança, construtores, clonagem, exceções e muito mais

--

E em sua versão 5.3 lança o suporte a **namespaces**

--

Mas isto eu já havia falado _mais ou menos_ na aula passada

---

## Namespaces

Com o amadurecimento do ecosistema de desenvolvimento PHP impulsionado pela modernização da linguagem, diversos projetos, frameworks, bibliotecas e utilitários surgem em meio a comunidade open-source.

Mas o que fazer quando você precisa utilizar um pacote de terceiros chamado `DBO` e em seu projeto também existe uma classe sua chamada `DBO`?

Os **Namespaces** resolvem esse problema. Como descrito no manual de referência do PHP, os namespaces podem ser comparados com os diretórios dos sistemas operacionais, que fazem namespace dos arquivos; dois arquivos com o mesmo nome podem coexistir em diretórios separados.

Da mesma forma, duas classes PHP com o mesmo nome podem coexistir em namespaces PHP separados. Simples assim.

---

## Namespaces

Antes da implementação de _namespaces_ no PHP isto seria um problema:

```bash
- projeto
  - Produto
      Cadastro.php
  - Cliente
      Cadastro.php
```

--

Sendo que o conteúdo de `projeto/Produto/Cadastro.php`:

```php
<?php
class Cadastro {
  public function save() {
    echo "salva o Produto no banco";
  }
}
```

--

Sendo que o conteúdo de `projeto/Cliente/Cadastro.php`:

```php
<?php
class Cadastro {
  public function save() {
    echo "salva o Cliente no banco";
  }
}
```

---

## Namespaces

Neste exemplo caso precisássemos cadastrar na mesma _requisição_ um cliente e um produto teríamos um problema:

```php
<?php
require("Produto/Cadastro.php");
require("Cliente/Cadastro.php");

$produto = new Cadastro();
$produto->save();
```

--

Teremos o seguinte erro:

**`Fatal error: Cannot redeclare class Cadastro in /vagrant-www/labs/satc/slides-sw-aula-09/demo/projeto/Cliente/Cadastro.php on line 2`**

--

Ou seja, sem o uso de namespace não podemos conflitar nome de classes, objetos ou bibliotecas.

---

## Namespaces

Para resolver o problema proposto nos slides anteriores, bastaríamos definir os namespaces de cada classe `Cadastro`:

--

Nova versão de `projeto/Produto/Cadastro.php`:

```php
<?php
namespace Produto;

class Cadastro {
  public function save() {
    echo "salva o Produto no banco";
  }
}
```

--

Nova versão de `projeto/Cliente/Cadastro.php`:

```php
<?php
namespace Cliente;

class Cadastro {
  public function save() {
    echo "salva o Cliente no banco";
  }
}
```

---

## Namespaces

E agora nós podemos usar as duas classes sem conflito:

```php
<?php
require("Produto/Cadastro.php");
require("Cliente/Cadastro.php");

$produto = new \Produto\Cadastro();
$produto->save();

echo "<br />";

$cliente = new \Cliente\Cadastro();
$cliente->save();
```

--

# 👍

---

## Namespaces

**Antes de avançarmos:** um exemplo do mundo real aonde não seria viável "viver" sem namespaces.

Imagem que em um projeto vocês precisam implementar dois meios de pagamento em sua aplicação: **PagSeguro** e **Cielo**.

--

Ambos gateways de pagto possuem suas implementações oficiais em PHP:

<https://github.com/pagseguro/pagseguro-php-sdk>

<https://github.com/DeveloperCielo/API-3.0-PHP>

---

## Namespaces

Agora que já temos ambas as bibliotecas oficiais instaladas, suponha que precisamos trabalhar com a classe `CreditCard` do PagSeguro:

<https://github.com/pagseguro/pagseguro-php-sdk/blob/master/source/Services/DirectPayment/CreditCard.php>

--

E que também precisássemos usar a classe `CreditCard` da Cielo:

<https://github.com/DeveloperCielo/API-3.0-PHP/blob/master/src/Cielo/API30/Ecommerce/CreditCard.php>

--

_É justamente essa **segurança** e o uso de namespace nos da_.

---

## autoload

Uma vez que nossos projetos PHP estejam devidamente organizados e estruturados usando OOP, necessitaremos pensar em uma forma mais fácil de carregar os arquivos "componentizados".

--

Em um de nossos exemplos anteriores utilizamos a função `require`:

```php
<?php
require("Produto/Cadastro.php");
require("Cliente/Cadastro.php");

$produto = new \Produto\Cadastro();
...
```

--

De fato não a **nada de errado** com a função `require` e `include`, mas vale observar que quanto maior for o projeto, maior a quantidade de namespaces envolvidos, pacotes seus misturados com bibliotecas de terceiros _(ex: Cielo, Pagseguro)_.

--

Em cenários como estes podemos utilizar as funções de **autoload** do PHP 💥

---

## autoload

O conceito básico de um projeto que possui "pontos" de `autoload` definidos é que sempre que você precisar usar uma nova classe em um determinado momento de sua requisição, bastaria apenas instanciar a classe:

```php
<?php
$produto = new \Produto\Cadastro();
$cliente = new \Cliente\Cadastro();
```

--

Para conseguirmos "habilitar" a funcionalidade do `autoload` precisamos definir uma função que vá fazer o trabalho de "gerenciamento de inclusão":

```php
<?php
function autoloadDemo($className) {
  $classFile = str_replace("\\", "/", $className) . ".php";
  require_once (__DIR__ . '/' . $classFile);
}

spl_autoload_register('autoloadDemo');
```

--

Podemos salvar o trecho de código acima como `autoload.php`.

---

## autoload

Uma vez que já tenhamos nossa função responsável por "capturar" qualquer solicitação de uso de classes no PHP, não podemos esquecer de registrar a mesma com o método **`spl_autoload_register`**.

--

Feito isto basta carregarmos nosso `autoload.php` em nossa aplicação e utilizar as classes diretamente sem `require`:

```php
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
```

---

## autoload

Outra forma de indicarmos ao mecanimos de _autoload_ a necessidade futura de uso de uma classe é diretiva `use`:

```php
<?php
require_once("autoload.php");

use \Produto\Cadastro;

$produto = new Cadastro();
$produto->save();
```

--

Podemos pensar no **`use`** como o `import` do Java 🤯

---

## Composer

Toda linguagem de alto nível com contribuições ativas de sua comunidade possui um "gerenciador de dependências".

Em Java temos o `Maven`, em JavaScript/Node temos o `NPM`, em Go temos o `get` e em **PHP temos o Composer**.

--

O **Composer** é o gerenciador de dependências recomendado para PHP, com poucos comandos simples, o Composer irá fazer o download das dependências do seu projeto automaticamente e configurará o **autoloading** para você.

--

Uma vez que você tenha o composer instalado em seu sistema e também configurado em seu projeto, para adicionar uma dependência basta usar o comando `require`:

```bash
composer require twig/twig:^2.0
```

```bash
composer require pagseguro/pagseguro-php-sdk:^5.0
```

--

Semelhante ao `npm install` usando o comando acima o composer se encarregará acessar o repositório oficial, baixar todos os arquivos necessários e depositar na pasta indicada de seu projeto.

---

## Instalando o Composer

A forma mais segura é fazer o download do composer seguindo as instruções oficiais:

<https://getcomposer.org/download/>

--

Para usuários **Windows** a forma mais fácil de obter e executá-lo é usar o instalador `ComposerSetup` (<https://getcomposer.org/Composer-Setup.exe>), que realiza uma instalação global e configura seu `$PATH` de modo que você possa executar o comando composer de qualquer diretório pela linha de comando.

Este outro link também pode ser útil para usuários do Windows: <https://www.thecodedeveloper.com/install-composer-windows-xampp/>

---

## Frameworks PHP

---

## Padrão MVC

---

## CakePHP

---

## Laravel

---

## Slim Framework
