# Teste Desenvolvedor Web - UNIASSELVI

## Instruções

O desafio consiste em implementar uma aplicação Web utilizando o framework
PHP de seu conhecimento (de mercado ou caseiro), e um banco de dados relacional
SQLite, MySQL ou Postgres, a partir de uma modelagem de dados inicial
desnormalizada, que deve ser normalizada para a implementação da solução.
Você vai criar uma aplicação de cadastro de pedidos de compra, a partir de uma
modelagem inicial, com as seguintes funcionalidades:

- CRUD de clientes.
- CRUD de produtos.
- CRUD de pedidos de compra, com status (Em Aberto, Pago ou Cancelado).
- Cada CRUD:
  - deve ser filtrável e ordenável por qualquer campo, e possuir paginação de 20 itens.
  - deve possuir formulários para criação e atualização de seus itens.
  - deve permitir a deleção de qualquer item de sua lista.
- Barra de navegação entre os CRUDs.
- Links para os outros CRUDs nas listagens (Ex: link para o detalhe do cliente da compra na lista de pedidos de compra)

## Modelo de dados
A modelagem inicial para a implementação solução é a seguinte:

[![Modelo](images/modelo.png)](url)

Você deve alterar esta modelagem para que a mesma cumpra com as três primeiras formas normais.

Além disso, a implementação deste modelo em um banco de dados relacional
deve ser realizada levando em consideração as validações necessárias na camada que
julgar melhor.

## Tecnologias a serem utilizadas
Devem ser utilizadas as seguintes tecnologias:

- HTML
- CSS
- Javascript
- PHP
- Git

## Entrega

Criar um repositório em alguma plataforma gratuita de controle de versão (Git – github por exemplo) e envie-nos o endereço para avaliação.

## Bônus

- Implementar autenticação de usuário na aplicação.
- Permitir que o usuário mude o número de itens por página.
- Permitir deleção em massa de itens nos CRUDs.
- Implementar aplicação de desconto em alguns pedidos de compra.
- Implementar a camada de Front-End utilizando a biblioteca javascript Bootstrap e ser responsiva.
- API Rest JSON para todos os CRUDS listados acima.

### Boa sorte!