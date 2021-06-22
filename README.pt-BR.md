

<!-- TABLE OF CONTENTS -->

# Autorizador

- [Sobre o Projeto](#sobre-o-projeto)
- [Desenvolvimento](#desenvolvimento)
- [Começando](#começando)
  - [Pré-requisitos](#pr%C3%A9-requisitos)
  - [Rodando o projeto](#rodando-o-projeto)
      - [Com Docker](#com-docker)
      - [Sem Docker](#sem-docker)
- [Estrutura do projeto](#estrutura-do-projeto)

<!-- ABOUT THE PROJECT -->

# Sobre o Projeto

Este projeto se trata de uma aplicação que autoriza transações para uma conta específica seguindo uma série de regras predefinidas.

# Desenvolvimento

Abaixo segue o que foi utilizado no desenvolvimento deste projeto:

- [PHP](https://www.php.net/) - PHP é uma linguagem interpretada livre, usada originalmente apenas para o desenvolvimento de aplicações presentes e atuantes no lado do servidor;
- [Docker](https://www.docker.com/) - Docker é um conjunto de produtos de plataforma como serviço que usam virtualização de nível de sistema operacional para entregar software em pacotes chamados contêineres;

<!-- GETTING STARTED -->

# Começando

## Pré-requisitos
Para rodar o projeto é necessário ter o [docker](https://www.docker.com/) instalado, ou caso queria rodar sem um container o [PHP](https://www.php.net/) será necessário.

## Rodando o projeto
### 1. Com Docker
Para executar a aplicação utilizando docker basta navegar até a pasta raiz e executar os seguintes comando:

```shell=
docker build -t my-php-app .
```

```shell=
docker run -it --rm --name my-running-app my-php-app
```

### 2. Sem Docker

### Execução
Para executar a aplicação basta navegar até a pasta raiz e executar o seguinte comando:

```shell=
php index.php
```

### Testes
Para executar os testes da aplicação basta navegar até a pasta raiz e executar os seguintes comandos:
```shell=
cd tests
```
```shell=
php test.php
```

# Estrutura do projeto

- **src** - Diretório base que contém as classes necessárias para o funcionamento da aplicação;
    - **Account** - Diretório responsável por armazenar classes que manipulem operações do tipo conta;
    - **Database** - Diretório responsável por armazenar classes que manipulem o estado da operação, gerenciado o mesmo em memória;
    - **Operation** - Diretório responsável por armazenar classes que gerenciem operações, independente do tipo;
    - **Support** - Diretório responsável por armazenar classes com funcionalidades comuns, mas que não tenham designação especial na arquitetura geral da aplicação;
   - **Account** - Diretório responsável por armazenar classes que manipulem operações do tipo transação;
 
- **tests** - Diretório responsável por armazenar as classes necessárias para realizar os testes da aplicação;
    - **AccountTest** - Diretório responsável por armazenar classes que manipulem testes em operações do tipo conta;
    - **operationsTest** - Diretório responsável por armazenar todos os arquivos de operações utilizados nas classes de teste da aplicação;
    - **TestCase** - Diretório responsável por armazenar todas as classes que gerenciem os casos de testes da aplicação;
    - **TransactionTest** - Diretório responsável por armazenar classes que manipulem testes em operações do tipo transação;
    
