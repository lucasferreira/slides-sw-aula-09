# Sobre este exemplo

Este código está rodando em Laravel. Precise de PHP 7.2+ ou superior.

Após baixar o código para sua máquina será necessário rodar o compando:

`composer install`

O comando acima irá baixar todas as dependências do Laravel.

Após isso você poderá ir no arquivo `.env` e configurar a conexão com seu banco de dados:

```
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=satc
DB_USERNAME=root
DB_PASSWORD=123456
```

Após criar a base `satc` e revisar a senha de seu MySQL, favor importar o arquivo `database/satc.sql` dentro de seu banco para criar as primeiras tabelas.

Por fim se tudo deu certo você poderá rodar em seu navegador (com o XAMPP/Apache ligado):

http://localhost/projeto-laravel/public
