# INSTRUÇÕES PARA UTILIZAÇÃO

## Para poder utilizar e testar o Backend feito em PHP sem framework, primeiramente importe a base de dados com o nome financeiro.sql que contém a estrutura do banco de dados.

Para iniciar os testes utilize uma aplicação de requisições http POST, GET, PUT e DELETE, pode 
ser utilizado o Postman, ou outros programas que possuem a mesma função, ou até mesmo uma extensão
instalada no navegado.

## Para realizar os testes, utilizei o Postman.

A base de dados com o nome financeiro.sql já vem com 02 (dois) cliente cadastrados.

### Para adicionar um novo cliente os seguintes parâmetros devem ser informados:
http://localhost/dev/Financial/app/src/api/client/create.php
#### Parâmetros com a requição POST:
{
    "name": "teste",
    "cpf": "88800066674",
    "balance": 1000,
    "agency": 6269,
    "account": 7161
}

### Para listar todos os clientes com GET:
http://localhost/dev/Financial/app/src/api/client/getall.php

### Para adicionar Crédito na conta de uma pessoa e inserir os dados na tabela CREDIT que possui uma chave Foreign Key
http://localhost/dev/Financial/app/src/api/credit/create.php
#### Parâmetros com informações POST:
{
    "value": 1000,
    "id_client": 3,
    "cpf": "12345678932"
}

### Para fazer um débito na conta de uma pessoa e inserir os dados na tabela DEBIT que possui também uma chave Foreign Key
http://localhost/dev/Financial/app/src/api/debit/create.php
#### Parâmetros com informações POST:
{
    "value": 1000,
    "id_client": 3,
    "cpf": "12345678932"
}

### Para fazer uma transfêrencia de uma conta para outra:

Para realizar esta transfêrencia a pessoa que irá transferir o valor deve informar o valor, o id dessa pessoa também
deve ser informado (no FrontEnd deve ser carregado esse id) e o CPF da mesma. A agência e a conta é da pessoa que
receberá este valor.

http://localhost/dev/Financial/app/src/api/transfer/create.php

- __value: valor quer vai ser transferido__
- __id_clinet: deve ser informado id da pessoa que vai fazer a transferência para a outra pessoa, ou seja, este é o id da pessoa que vai depositar na conta de outra pessoa e será descontado/debitado o valor de sua conta__
- __cpf: deve ser informado o cpf da pessoa que irá transferir o valor para a conta da outra pessoa, esse mesmo valor será descontado/debitado de sua conta__
- __agency: este é o numero da agência que deverá ser informadado para ser creditado/depositado o valor.__
- __account: esta é o número da conta que receberá o valor adicionado.__

#### Parâmetros com informações POST:
{
    "value": 500,
    "id_client": 3,
    "cpf": "12345678932",
    "agency": 789,
    "account": 5050
}

### Para gerar um extrato da movimentação do cliente por cpf independentemente se ele movimentou a conta ou não
- Deve-se passar na url um parâmetro GET com o cpf da pessoa da seguinte forma: ?cpf=12345678932
#### Parâmetro com informação GET:
http://localhost/dev/Financial/app/src/api/extract/extract.php?cpf=12345678932


#### Para retornar o saldo de uma pessoa, informar o cpf pela url
### Parâmetro com informação GET:
http://localhost/dev/Financial/app/src/api/client/balance.php?cpf=12345678932

# Essas são duas formas de executar o projeto no ambiente linux:

No ubuntu com o lamp-server executando os seguintes comandos no termial:

## Para realizadar a atualização dos repositórios:
- __sudo apt update__
- __sudo apt upgrade__
- __sudo apt full-upgrade__

## Para instalar o Lamp-Server:
sudo apt install lamp-server^
após a instalação já se obtem o servidor local digitando localhost no navegador

#### O diretório onde se deve executar o projeto php é em: /var/www/
Antes de executar o projeto é preciso dar permissão total ao diretório:
sudo chmod -R 777 /var/www/

## A outra forma é com o XAMPP(que foi utilizado):

Farazer o Download com versão para linux em: https://www.apachefriends.org/pt_br/index.html

- __Dar permisssão total com o comando: sudo chmod -R 777 xampp-linux-x64-7.4.10-0-installer.run.crdownload.__
- __Para instalar com o comando: sudo ./xampp-linux-x64-7.4.10-0-installer.run.crdownload.__
- __O projeto PHP deve ficar no diretório /opt/lampp/htdocs e também deverá ser dado.__
- __Permissão total para a pasta do projeto com o comando "sudo chmod -R 777 diretório".__
- __Para iniciar o servidor, utilizar o comando: sudo /opt/lampp/lampp start.__

Após isso acessar no navegador http://localhost/phpmyadmin/ para acessar o phpmyadmin e utilizar 
o banco de dados.

#### Para executar o projeto no navegar com o endereço http://localhost/projeto