 CREATE TABLE produtos (
id INT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
nome VARCHAR (50)NOT NULL,
preco NUMERIC(10,2)NOT NULL,
estoque INT NOT NULL DEFAULT 0
);

-- INSERT INTO produtos(nome,preco,estoque)
-- VALUES('iphone 17','10000.00','15');

SELECT * FROM produtos;
DELETE FROM produtos WHERE id=2;