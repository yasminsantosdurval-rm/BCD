## para ver a tabela
```sql
SELECT * FROM produtos;
```

## contar linhas
```sql
SELECT COUNT(*) FROM produtos;
```

## contagem em uma coluna nova renomiada
```sql
SELECT COUNT(*) AS total_registros FROM produtos;
```

## para aplicar filtros na consuta
```sql
SELECT COUNT(*) AS produtos_baixo_estoque
FROM produtos
WHERE estoque < 10;
```
## contagem de total de produtos
```sql
SELECT COUNT(*) AS total_perifericos
FROM produtos
WHERE categoria = 'Perifericos';
```
## funcao de contagem
```sql
COUNT(*)
```
## para ver maior valor de produto
```sql
SELECT MAX(PRECO) AS maior_preco
FROM produtos;
```
## CASO, VOCE FIQUE CURIOSO E QUEIRA SABER O NOME DO PRODUTO MAIS CARO
```sql
SELECT nome,preco FROM produtos
ORDER BY preco DESC;
```
## para saber valor do menor produto
```sql
SELECT MIN(preco) AS menor_valor
FROM produtos;
```
## para fazer a media
```sql
SELECT AVG(preco) AS media_precos
FROM produtos;
```
## para limitar casas decimais
```sql
SELECT ROUND(AVG(preco),2) AS media_correta
FROM produtos;
```
## para exibir tudo em uma consulta
```sql
SELECT
MAX(preco) AS maior_preco,
MIN(preco) AS menor_preco,
ROUND(AVG(preco),2) AS media
FROM produtos;
```     
## usando todas as funcoes
```sql
SELECT
COUNT(*) AS total_de_produtos,
MAX(preco) AS maior_preço,
MIN(preco) AS menor_preço,
ROUND(AVG(preco),2) AS media,
SUM(estoque) AS total_peças
FROM produtos;
```
## para somar o total de faturamento vendendo todos os produtos da terabyte
```sql
SELECT SUM(preco * estoque) AS total_faturamento
FROM produtos;
```
