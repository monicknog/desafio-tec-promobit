# Desafio Técnico - Promobit

## Instruções de execução do projeto

1 - Instale as dependências com o seguinte comando:

```shell script
composer install
```

2 - Copie o conteúdo do arquivo `.env.example` e adicione ao arquivo `.env` inserindo as configurações do banco de dados:

| Variável      |
| ------------- |
| DB_CONNECTION |
| DB_HOST       |
| DB_PORT       |
| DB_DATABASE   |
| DB_USERNAME   |
| DB_PASSWORD   |

Obs: caso não tenha as tabelas criadas, executar o seguinte comando:

```shell script
php artisan migrate
```

3 - Execute o comando a seguir para iniciar o serviço localmente:

```shell script
php artisan serve
```

4 - SQL de extração de relatório de relevância de produtos

```SQL

SELECT `tag`.*, (
        SELECT count(*) FROM `product`
        INNER JOIN `product_tag` ON `product`.id = `product_tag`.product_id WHERE `tag`.id = `product_tag`.tag_id
    ) AS products_count
FROM `tag`
ORDER BY `products_count` DESC;

```
