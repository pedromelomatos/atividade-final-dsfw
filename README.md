# Trilha Livre

Aplicacao web desenvolvida em Laravel para a atividade final de Desenvolvimento de Software para Web. O sistema permite que usuarios autenticados cadastrem e acompanhem trilhas de estudo com area, nivel, status, carga horaria, progresso, datas e observacoes.

## Tema

Gestor de trilhas de estudo para estudantes. Antes da entrega, confirme o tema com o professor para evitar repeticao com outro aluno da turma.

## Funcionalidades

- Autenticacao com cadastro, login e logout.
- Perfis de acesso `admin` e `student`.
- Dashboard com resumo de trilhas.
- CRUD completo de trilhas de estudo.
- Filtro por status.
- Regras de acesso: estudantes visualizam apenas suas trilhas; admin visualiza todas.
- Seeders com usuarios e trilhas iniciais.
- Testes automatizados de autenticacao, CRUD e autorizacao.

## Tecnologias

- PHP 8.4.
- Laravel 13.
- Laravel Boost 2.
- SQLite.
- Blade.
- CSS.
- PHPUnit.
- Laravel Pint.

## Instalacao

1. Instale PHP 8.4 ou superior, Composer e as extensoes comuns do Laravel: `openssl`, `pdo_sqlite`, `sqlite3`, `mbstring`, `fileinfo`, `curl`, `zip` e `intl`.
2. Clone o repositorio.
3. Instale as dependencias:

```bash
composer install
```

4. Crie o arquivo de ambiente:

```bash
cp .env.example .env
```

No Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

5. Gere a chave da aplicacao:

```bash
php artisan key:generate
```

## Banco de dados

O projeto usa SQLite por padrao. Crie o arquivo do banco se ele ainda nao existir:

```bash
touch database/database.sqlite
```

No Windows PowerShell:

```powershell
New-Item -ItemType File -Force database/database.sqlite
```

Confira no `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Execute migrations e seeders:

```bash
php artisan migrate --seed
```

Para recriar tudo do zero em desenvolvimento:

```bash
php artisan migrate:fresh --seed
```

## Executar o projeto

```bash
php artisan serve
```

Acesse `http://127.0.0.1:8000`.

## Usuarios de teste

| Perfil | Nome | E-mail | Senha |
| --- | --- | --- | --- |
| Admin | Administrador | `admin@trilhalivre.test` | `password` |
| Estudante | Estudante Teste | `estudante@trilhalivre.test` | `password` |
| Estudante | Monitor Teste | `monitor@trilhalivre.test` | `password` |

## Laravel Boost

O Boost foi instalado manualmente conforme o enunciado:

```bash
composer require laravel/boost --dev
php artisan boost:install
```

A configuracao do MCP do Boost esta em `.codex/config.toml`, e as Skills do projeto ficam em `.agents/skills`.

## Skills criadas

- `identidade-visual`: padroniza paleta, layout, componentes, UX e responsividade.
- `crud-laravel`: define padrao para CRUDs, requests, controllers, views, validacoes e paginacao.
- `testes-automatizados`: orienta cobertura de autenticacao, CRUD, permissoes e validacoes.
- `seguranca`: orienta autenticacao, CSRF, escopo por usuario e protecao de dados.

## Testes

Execute:

```bash
php artisan test
```

Formatacao:

```bash
./vendor/bin/pint
```

No Windows PowerShell:

```powershell
.\vendor\bin\pint.bat
```
