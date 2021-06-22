

<!-- TABLE OF CONTENTS -->

# Authorizer

- [About the project](#About-the-project)
- [Development](#Development)
- [Getting Started](#Getting-Started)
  - [Prerequisites](#Prerequisites)
  - [Running the project](#running-the-project)
      - [With Docker](#With-docker)
      - [Without Docker](#Without-docker)
- [Project structure](#Project-structure)

<!-- ABOUT THE PROJECT -->

# About the project

This project is about an application that authorizes transactions for a specific account following a series of predefined rules.

Read this in other language: [Português](README.pt-BR.md)
# Development

Below is what was used in the development of this project:

- [PHP](https://www.php.net/) - PHP is a free interpreted language, originally used only for the development of server-side applications;
- [Docker](https://www.docker.com/) - Docker is a set of platform-as-a-service products that use OS-level virtualization to deliver software in packages called containers.;

<!-- GETTING STARTED -->

# Getting Started

## Prerequisites
To run the project you need to have [docker](https://www.docker.com/) installed, or if you want to run without a container, [PHP](https://www.php.net/) will be needed.

## Running the project
### 1. With Docker
To run the application using docker just navigate to the root folder and execute the following command:

```shell=
docker build -t my-php-app .
```

```shell=
docker run -it --rm --name my-running-app my-php-app
```

### 2. Without Docker

### Execution
To run the application, simply navigate to the root folder and execute the following command:

```shell=
php index.php
```

### Tests
To run the application tests, simply navigate to the root folder and execute the following commands:
```shell=
cd tests
```
```shell=
php test.php
```

# Project structure

- **src** - Base directory that contains the classes necessary for the application operation;
    - **Account** - Directory responsible for storing classes that handle account type operations;
    - **Database** - Directory responsible for storing classes that handle the state of the operation, managed in memory;
    - **Operation** - Directory responsible for storing classes that manage operations, regardless of type;
    - **Support** - Directory responsible for storing classes with common functionality, but that do not have special designation in the general architecture of the application;
   - **Account** - Directory responsible for storing classes that handle transaction-type operations;
 
- **tests** - Directory responsible for storing the classes needed to perform application tests;
    - **AccountTest** - Directory responsible for storing classes that handle tests in account type operations;
    - **operationsTest** - Directory responsible for storing all operations files used in the application's test classes;
    - **TestCase** - Directory responsible for storing all classes that manage application test cases;
    - **TransactionTest** - Directory responsible for storing classes that handle tests in transaction-type operations;
    
