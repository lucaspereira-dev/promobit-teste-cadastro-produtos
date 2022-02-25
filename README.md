<p align="center"><a href="#" target="_blank"><img src="public/imgs/logo/promobit.png" width="400"></a></p>

## Link do repositório do teste de lógica
https://github.com/lucaspereira-dev/promobit-teste-logica

## Query do relatório de cadastro de produtos
```
SELECT 
    tags.id AS id, tags.name AS name, COUNT(product_tags.id) AS qtd_produtos
FROM
    tags
        INNER JOIN
    product_tags ON tags.id = product_tags.tag_id
GROUP BY product_tags.tag_id
ORDER BY tags.id DESC;
```
## Orientações de setup para o teste cadastro de produtos

## <b>Comandos</b>
```
$ composer install
```
Resultado esperado
```
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Package operations: 111 installs, 0 updates, 0 removals
  ...
Package swiftmailer/swiftmailer is abandoned, you should avoid using it. Use symfony/mailer instead.
Generating optimized autoload files
...
Package manifest generated successfully.
78 packages you are using are looking for funding.
Use the `composer fund` command to find out more!
```
```
$ php artisan migrate:refresh --seed
```
Resultado esperado
```
Migration table not found.
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (93.34ms)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (70.25ms)
Migrating: 2019_08_19_000000_create_failed_jobs_table
Migrated:  2019_08_19_000000_create_failed_jobs_table (65.35ms)
Migrating: 2019_12_14_000001_create_personal_access_tokens_table
Migrated:  2019_12_14_000001_create_personal_access_tokens_table (88.23ms)
Migrating: 2022_02_20_051016_create_products_table
Migrated:  2022_02_20_051016_create_products_table (55.88ms)
Migrating: 2022_02_20_051044_create_tags_table
Migrated:  2022_02_20_051044_create_tags_table (54.54ms)
Migrating: 2022_02_20_051058_create_product_tags_table
Migrated:  2022_02_20_051058_create_product_tags_table (183.89ms)
Database seeding completed successfully.
```
```
$ php artisan serve
```
Resultado esperado
```
Starting Laravel development server: http://127.0.0.1:8000
[Thu Feb 24 23:17:33 2022] PHP 7.4.3 Development Server (http://127.0.0.1:8000) started
```
## Autenticação 
* Após acessar a URL gerada será direcionado pra tela de login
  <p align="center"><a href="#" target="_blank"><img src="screenshot/Captura%20de%20tela%20de%202022-02-24%2023-23-21.png" width="400"></a></p>
* A credencial padrão de acesso é
* E-mail: abailey@example.com
* Password: password
  <p align="center"><a href="#" target="_blank"><img src="screenshot/Captura%20de%20tela%20de%202022-02-24%2023-24-04.png" width="400"></a></p>
* Após submeter as credenciais será redirecionado para tela de produtos
  <p align="center"><a href="#" target="_blank"><img src="screenshot/Captura%20de%20tela%20de%202022-02-24%2023-25-31.png" width="400"></a></p>