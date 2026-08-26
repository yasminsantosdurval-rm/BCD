## Aula 05
para filtrar colunas, utilizamos o comando:

```sql
SELECT nome,preço FROM produto;
```
para filtro de registro utilizamos o comando:
```sql
SELECT * FROM produtos WHERE estoque < 10;
```
Para ordenar od dados:
```sql
SELECT nome,preco FROM produtos
ORDER BY preco DESC;
```

----
**UPDATE**: Update ou Delete sem `WHERE` atinge TODAS as linhas! Não existe Ctrl+z :(

Fluxo seguro (sempre):
```mermaid
flowchart LR
    A[SELECT com o WHERE] --> B{Retornou a linha certa?}
    B --NÃO--> A
    B --SIM--c["Update ou Delete com o mesmo WHERE"]
    C -->D["SELECT para conferir"]

```

Também é possivel realizar cálculos:
```sql
    UPDATE produtos
    SET oestque = estoque - 3
    WHERE id = 2;
```
    ---
    para apagar:
   ```sql
    SELECT * FROM produtos WHERE nome='Notebook';
```
```sql
DELETE FROM produtos WHERE nome='Notebook Gamer';
 SELECT * FROM produtos
 ```