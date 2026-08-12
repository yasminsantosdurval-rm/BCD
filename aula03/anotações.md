# aula 2

comando para remover um banco de dados:

DROP DATABASE
____
o objetivo é criar uma loja para aprender os principais comandos.

```mermaid
erDiagram
   PRODUTOS{
       int id PK
       "Gerado automaticamente"
       varchar nome "Nome do produto"
       numeric preço "preço em reais"
       int estoques "unidades disponiveis"
   }

   