# Live eCommerce - Sistema de Gerenciamento de Biblioteca

Sistema simples de gerenciamento de biblioteca que permite aos usuários adicionar, remover e listar livros, além de gerenciar empréstimos de livros. Incluindo princípios de programação orientada a objetos, como encapsulamento, herança e polimorfismo.

## Funcionalidades
- **Adicionar um Livro** 
- **Remover um Livro**
- **Listar Todos os Livros**
- **Pegar um Livro Emprestado**
- **Devolver um Livro**

## Requisitos
- PHP 7.4 ou superior
- Composer (para gerenciamento de dependências)

## Instruções de Configuração
1. Clone o repositório:
   ```bash
   git clone <repository-url>

## Dependências
1. composer install

## Executar a aplicação
1. Navegue até o diretório public e execute:
    php index.php

## Executando os testes
1. Na raiz do projeto execute esse comando: ./vendor/bin/phpunit --configuration phpunit.xml
 
## Estrutura do Diretório
1. App/: Contém a lógica principal da aplicação, incluindo modelos, repositórios e serviços.
2. tests/: Contém testes unitários para a aplicação.
3. public/: Contém o ponto de entrada da aplicação (index.php).