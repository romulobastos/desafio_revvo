# Desafio Fullstack PHP

### Requisitos
Necessária instalação do Docker para criação do container e execução no terminal:
- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/install/)

##

### Configuração e Execução
**Clone o repositório** e acesse a pasta:
  ```bash
  # faça o clone do repositório
  git clone git@github.com:romulobastos/desafio_revvo.git

  # acesse a pasta do projeto
  cd desafio_revvo
  ``` 

**Construa as imagens Docker** (apenas na primeira execução ou após mudanças significativas):
  ```bash
  # instale as dependências
  npm install

  # crie as imagens docker
  docker-compose up --build
  ```
Após executar o build, pare o servidor e outros processos em execução no terminal.
Execute o seguinte comando no terminal:
**`Ctrl + C`** no Windows/Linux ou **`Cmd + C`** no MacOS.

Isso interromperá o processo em execução, como o servidor Docker, sem fechar o terminal.

##

### Inicialização do Projeto
Inicie os serviços via Docker (Apache, PHP, MySQL e phpMyAdmin) e abra o projeto no navegador padrão:
  ```bash
  # inicie o container docker e execute tarefas gulp
  docker-compose up -d && npm run build
  ```
Obs.: Caso a janela não abra automaticamente, acesse **http://localhost:3000/** no seu navegador.

##

### Administração do Banco de Dados
Para visualizar e gerenciar o banco de dados MySQL, utilize o phpMyAdmin em **http://localhost:8081**.
Caso seja necessário criar a tabela de `courses` manualmente, o arquivo para importação fica em `/sql/database.sql`.
