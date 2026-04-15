# Concessionária CRUD

Projeto de estudo desenvolvido para praticar a construção de um CRUD completo com Laravel, explorando as camadas da aplicação: banco de dados, rotas, controllers, validações e views.

## Sobre o projeto

A ideia foi construir um gerenciador de carros simples, mas com uma arquitetura organizada. O foco foi entender como as peças se conectam: o Laravel recebe a requisição, o Controller aplica as regras, o Eloquent fala com o banco, e o Blade renderiza as views. O Vue foi adicionado para enriquecer a interface sem abrir mão do SSR.

## Tecnologias utilizadas

- **PHP 8** + **Laravel 12**
- **Blade** — templating SSR para formulários e estrutura das páginas
- **Vue 3** — filtro e ordenação da tabela sem recarregar a página (islands architecture)
- **Eloquent ORM** — comunicação com o banco de dados
- **MySQL** — banco de dados relacional
- **Bootstrap 5** — estilização e componentes de UI
- **Vite** — bundler para assets JS/CSS

## Arquitetura

O projeto adota um padrão híbrido Blade + Vue, onde cada camada tem uma responsabilidade clara:

```
app/
├── Http/Controllers/CarroController.php  # recebe requisições, aplica validação e redireciona
├── Models/Carro.php                      # define a tabela e os campos permitidos

resources/
├── views/
│   ├── layouts/        # estrutura base (nav, head, footer)
│   └── carros/         # páginas: index, create, edit, show
└── js/
    └── components/
        └── TabelaCarros.vue  # filtro e ordenação client-side

database/
├── migrations/         # versão do esquema do banco
├── factories/          # geração de dados de teste
└── seeders/            # popula o banco com registros
```

**Blade** cuida dos formulários (create/edit), da página de detalhe (show) e da estrutura da listagem.  
**Vue** cuida apenas do filtro por texto e da ordenação das colunas — sem recarregar a página.

## Como rodar localmente

**Pré-requisitos:** PHP 8.1+, Composer, Node.js, MySQL

```bash
# Clone o repositório
git clone https://github.com/mozer00/crud-laravel.git
cd crud-laravel

# Instale as dependências PHP
composer install

# Instale as dependências JS
npm install

# Configure o ambiente
cp .env.example .env
php artisan key:generate
```

Edite o `.env` com os dados do seu banco de dados:

```
DB_DATABASE=crud_laravel
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

```bash
# Crie as tabelas
php artisan migrate

# (Opcional) Popule com 300 registros de teste
php artisan db:seed

# Compile os assets
npm run build

# Inicie o servidor
php artisan serve
```

A aplicação estará disponível em http://127.0.0.1:8000

## Rotas

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/carros` | Lista todos os carros (com filtro e paginação) |
| GET | `/carros/create` | Exibe o formulário de cadastro |
| POST | `/carros` | Salva um novo carro |
| GET | `/carros/{id}` | Exibe os detalhes de um carro |
| GET | `/carros/{id}/edit` | Exibe o formulário de edição |
| PUT | `/carros/{id}` | Atualiza os dados do carro |
| DELETE | `/carros/{id}` | Remove o carro |

## Validações

Toda entrada de dados é validada no servidor antes de persistir:

- **Marca** — obrigatório, entre 2 e 50 caracteres
- **Modelo** — obrigatório, entre 2 e 50 caracteres
- **Ano** — obrigatório, inteiro entre 1886 e o ano atual

## O que aprendi

- Como o ciclo de vida de uma requisição funciona no Laravel (Request → Controller → Model → View)
- A diferença entre renderização SSR (Blade) e client-side (Vue) e quando usar cada uma
- Como o Eloquent abstrai o SQL com `create`, `update`, `delete` e `paginate`
- Como centralizar regras de validação para evitar duplicação entre `store` e `update`
- Como o padrão híbrido (Blade + Vue) permite Progressive Enhancement sem complexidade de SPA
- Como migrations versionam o banco e factories geram dados realistas para testes