# Desafio Fullstack PHP

### Requisitos
Necessária instalação do Docker para criação do container e execução no terminal:
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/install/)

##

### Configuração e Execução
**Construa as imagens Docker** (apenas na primeira execução ou após mudanças significativas):
  ```bash
  # cria imagens docker

  docker-compose up --build
  ```
## 
### Inicialização do Projeto
Inicie os serviços via Docker (Apache, PHP, MySQL e phpMyAdmin) e abra o projeto no navegador padrão:
  ```bash
  # inicia o container e executa tarefas do projeto 

  docker-compose up -d && gulp
  ```
Obs.: Caso a janela não abra automaticamente, acesse **http://localhost:3000/** no seu navegador.

##

### Administração do Banco de Dados
Para visualizar e gerenciar o banco de dados, acesse o phpMyAdmin em **http://localhost:8081**.