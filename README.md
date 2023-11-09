<p align="center"><a href="https://laravel.com" target="_blank"><img src="" width="400" alt="DPDF Logo"></a></p>

## App para o dia da mulher

O dia da mulher acontece toda primeira segunda do mês. A aplicação foi criada para auxiliar no registro, historico e direcionamento dos assistidos.
O app foi feito em Laravel, e roda offline.

## Instalação
- Crie um Banco com o nome diadamulher;
- Copie e configure o arquivo ENV, coloque o IP do computador ao invés de localhost;
- Rode as migrações;
- Cadastre as cidades com o comando: php artisan db:seed --class:CidadesSeeder;
- Rode o programa com o comando: php artisan serve;
