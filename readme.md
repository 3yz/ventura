#Ventura

##Instalação

1. Clone o repositório: `git clone git@github.com:3yz/ventura.git`
2. Instale as dependências: `composer install && npm install`
3. Rode `cp .env.example .env` e `php artisan key:generate` no terminal
4. Configure o banco de dados no arquivo .env
5. Faça a migração inicial para a criação de tabelas necessárias para o funcionamento: `php artisan migrate`
6. Crie um usuário para acessar o gerenciador: `php artisan admin:add-user`
7. Execute o gulp pela primeira vez: `gulp`

##Utilização
Inicie o servidor: `php artisan serve --host=0.0.0.0`'' e o gulp: `gulp watch`. Faça sua parte :)