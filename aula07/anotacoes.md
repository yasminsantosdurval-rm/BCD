## comando para contagem de linhas:
```sql
SELECT COUNT(*) AS total_de_produtos FROM produtos;
```

## para ver quantos produtos tem a menos no estoque:
```sql
FROM produtos
WHERE estoque > 10;
```

## descobrir o mais caro:
```sql
SELECT 
   MAX(preco) AS produto_mais_caro,
   MIN(preco) AS produto_mais_barato
FROM produtos;
```
## funcao que calcula media aritimetica:
```sql
SELECT AVG(preco) FROM produtos;
SELECT ROUND(AVG(preco),2) AS preco_medio
FROM produtos;
```

## comando que nao entendi:
```sql
SELECT 
COUNT(*) AS total_produtos,
MIN(preco) AS menor_valor,
MAX(preco) AS maior_valor,
ROUND(AVG(preco),2) AS media_valores,
SUM(estoque) AS total_pecas
FROM produtos
```
## TOTAL DO ESTOQUE:
```sql
SELECT nome,
preco,
estoque,
preco * estoque AS total_estoque
FROM produtos
ORDER BY total_estoque DESC;
```

## comado que nao sei:
```sql
SELECT SUM(preco*estoque) AS patrimonio_liquido
FROM produtos
```