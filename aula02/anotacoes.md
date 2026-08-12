# SGBD
Instalar e configurar o SGBD PostgreSQL

Comando para instalação SGBD:

```bash 
sudo apt install -y postgresql
```
>obs: O comando sudo, no nosso caso, pode ser omitido pois já somos root.

Comando para

```bash
pg_lsclusters
```
Para realizar o acesso ao SGBD **sem senha**, ultilizar o comando:

```bash
sudo -u postgres psql
```
>Com esse comando o acesso é feito sem senha, pois o Linnux ja provou quem você é (root) Atentificação PEER.

Para primeiro acesso, alterei a senha:

```sql
ALTER USER postegres PASSWORD '0604';
```

>O retorno correto, é `ALTER ROLE`

Para sair do postgres, comando `\q`(comando /quit ultilizado na maioria dos jogos)

```mermaid
graph LR
A[sudo -u postgres psql]--<b>Autenticação</b>-->B[Só funciona entrando dentro do próprio Linux: Ubuntu, Debian]
```

```mermaid
graph LR
A[sudo psql -h 127.0.0.1 -U postgress]
--<b>Autentificação</b>-->B[Funciona vindo de qualquer máquina, porém é necessário inserir a senha]
```
## Configurações de serviço
Caminho padrão para as configurações do POSTGRESQL.
![alt text](image.png)

**Primeira configuração**

Comando que define de onde deve ser escutado as conections:
```bash
sudo nano postgresql.conf
```
CTRL + W para buscar a linha do listen_addresses e descomentamos, alterando para  `*`.
Se ficar localhost, somente meu PC acessa.

**Segunda configuração**
**Segunda configuração:**
```bash
sudo nano pg_hba.conf
```
Nas ultimas linhas, adicionei:
host all all 10.87.38.0/24 scram-sha-256

**O 24 no fim do IP significa que libera todos os IP da rede 10.87.38**

>Obs: se eu colocasse 0.0.0.0/24 liberaria para todos os IP do mundo poder acessar meu servidor

Para criar um banco de dados, usamos o comando:
```sql
CREATE DATABASE lojamax;
```
Para visualizar os bancos:
```bash