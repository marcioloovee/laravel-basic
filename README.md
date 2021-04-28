Compilando a aplicação no Docker
- docker-compose build app

Executando a aplicação
- docker-compose up -d

Instalando as dependências do aplicativo
- docker-compose exec app composer install

Gerando chave do app
- docker-compose exec app php artisan key:generate

Criando as tabelas
- docker-compose exec app php artisan migrate

Executando teste da aplicação
- docker-compose exec app php artisan test

Rodando a aplicação no navegador
- http://127.0.0.1:8000
