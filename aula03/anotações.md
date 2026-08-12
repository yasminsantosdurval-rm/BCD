# aula 3

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

   ```
   PARA CRIAR A TABELA UTILIZAMOS OS COMANDOS ABAIXOS:
```sql
   CREATE TABLE produtos (
id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
nome VARCHAR (50)NOT NULL,
preco NUMERIC(10,2)NOT NULL,
estoque INT NOT NULL DEFAULT 0
);
```
