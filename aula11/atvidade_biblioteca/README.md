# JOIN na Biblioteca da Escola

- Ideia principal: relacionar os alunos com os livros que eles pegaram.

## Diagrama

```mermaid
erDiagram

ALUNOS ||--o{ EMPRESTIMOS : possui

ALUNOS {
    id int PK
    nome varchar(50)
}

EMPRESTIMOS {
    id int PK
    livro varchar(100)
    id_aluno int FK
}
```

## criacao banco dedados:
![alt text](image.png)

## criação das tabelas:
![alt text](image-1.png)
![alt text](image-2.png)

## adicionando nomes:
![alt text](image-3.png)

## incluindo os empretimos:
![alt text](image-4.png)

## tabela alunos:
![alt text](image-5.png)

## tabela emprestimo: 
![alt text](image-6.png)

## nomes e livros:
![alt text](image-7.png)
**R: Os alunos que não apareceram foram os que não pegaram nenhum livro. Isso acontece porque o INNER JOIN mostra somente os alunos que possuem empréstimo.**

## todos os alunos:
![alt text](image-8.png)
**R:Resposta: Para os alunos que não pegaram nenhum livro, apareceu NULL na coluna livro.**

## quem nunca pegou livro:
![alt text](image-9.png)
**R:Resposta: Os alunos que nunca pegaram livro foram Gabriel, Mariana, Rafael, Beatriz e Carlos.**
## aluno 50:
![alt text](image-10.png)
**R:Deu erro porque o aluno 50 não existe na tabela alunos. O id_aluno é uma chave estrangeira e precisa existir na tabela alunos.**


