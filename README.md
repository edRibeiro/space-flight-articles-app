# Space Flight News API

API RESTful para fornecer informações sobre voos espaciais, utilizando dados da API Space Flight News.

> This is a challenge by [Coodesh](https://coodesh.com/)

## Descrição

Este projeto é uma API RESTful construída com PHP e Laravel. Ele fornece endpoints para listar, obter, adicionar, atualizar e excluir artigos relacionados a voos espaciais. Os dados são alimentados a partir da API Space Flight News e são sincronizados diariamente através de um CRON job.

## Funcionalidades

-   **Listar todos os artigos**: Retorna uma lista paginada de todos os artigos.
-   **Obter um artigo por ID**: Retorna as informações de um artigo específico com base no ID fornecido.
-   **Adicionar um novo artigo**: Adiciona um novo artigo ao banco de dados.
-   **Atualizar um artigo**: Atualiza as informações de um artigo existente com base no ID fornecido.
-   **Remover um artigo**: Remove um artigo existente com base no ID fornecido.

## Implementações Futuras

-   **Configuração do Docker**: Configurar o ambiente de desenvolvimento e implantação usando Docker para facilitar o processo de implantação.
-   **Sistema de Alerta**: Implementar um sistema de alerta para detectar falhas durante a sincronização dos artigos e notificar a equipe.
-   **Documentação da API**: Descrever a documentação da API utilizando o conceito de OpenAPI 3.0 para facilitar o entendimento e integração com outras aplicações.

## Instalação

1. Clone este repositório.
2. Instale as dependências do Composer: `composer install`.
3. Crie um arquivo `.env` baseado no `.env.example` e configure as variáveis de ambiente, incluindo as credenciais do banco de dados e da API Space Flight News.
4. Execute as migrações do banco de dados: `php artisan migrate`.
5. Inicie o servidor de desenvolvimento: `php artisan serve`.

## Contribuição

Contribuições são bem-vindas! Para contribuir com este projeto, siga estas etapas:

1. Faça um fork do repositório.
2. Crie uma branch para sua feature: `git checkout -b feature/nova-feature`.
3. Faça commit de suas mudanças: `git commit -m 'Adiciona nova feature'`.
4. Faça push para a branch: `git push origin feature/nova-feature`.
5. Abra um pull request.

## Licença

Este projeto é licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
