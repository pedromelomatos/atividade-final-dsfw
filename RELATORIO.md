# Relatorio da Atividade

## Contexto e planejamento

O projeto desenvolvido foi o **Trilha Livre**, uma aplicacao Laravel para gerenciar trilhas de estudo. O objetivo e permitir que estudantes cadastrem objetivos de estudo, acompanhem horas planejadas e concluidas, definam status e consultem prazos.

O problema tratado e a dificuldade de manter planos de estudo organizados em um unico local. O publico-alvo sao estudantes, monitores e professores que desejam acompanhar pequenas trilhas academicas.

O planejamento completo esta no arquivo `PLANO_IMPLEMENTACAO.md`, criado antes do desenvolvimento funcional da aplicacao. Ele documenta objetivo, problema, publico-alvo, escopo, funcionalidades, entidades, telas, ordem de implementacao, tecnologias, riscos e criterios de aceite.

## Ferramentas de IA e MCP

O desenvolvimento foi assistido por IA no Codex, com revisao manual das estruturas geradas, execucao de testes e ajustes incrementais.

### MCP utilizado

Foram utilizados recursos de MCP durante o desenvolvimento:

- **Laravel Boost MCP**: instalado e configurado pelo comando `php artisan boost:install`. A configuracao gerada ficou em `.codex/config.toml`, apontando para `php artisan boost:mcp`. O Boost tambem criou guidelines e a Skill `laravel-best-practices`, usadas como referencia para controllers, migrations, validacoes, views e testes.
- **node_repl MCP do Codex**: utilizado para inspecionar metadados do projeto durante a documentacao. Exemplo de uso real: leitura do `composer.json` via MCP para confirmar `laravel/framework` em `^13.8` e `laravel/boost` em `^2.4`.

### Finalidade do MCP

O MCP foi usado para apoiar o contexto tecnico do projeto, confirmar dependencias instaladas e manter a IA alinhada ao ecossistema Laravel/Boost. A configuracao do Laravel Boost MCP tambem deixa o repositorio preparado para consultas de contexto por agentes compativeis.

### Exemplos de utilizacao

- Instalar Boost e registrar o MCP:

```bash
composer require laravel/boost --dev
php artisan boost:install
```

- Configuracao MCP gerada:

```toml
[mcp_servers.laravel-boost]
command = "php"
args = ["artisan", "boost:mcp"]
```

- Inspecao via `node_repl` MCP:

```json
{
  "project": "laravel/laravel",
  "laravel": "^13.8",
  "boost": "^2.4"
}
```

## Skills desenvolvidas

As Skills foram armazenadas em `.agents/skills`, pasta criada pelo Laravel Boost.

### Skill de Identidade Visual

Arquivo: `.agents/skills/identidade-visual/SKILL.md`.

Define paleta, tipografia, layout, botoes, badges, responsividade, feedback visual e padrao de UX para as telas Blade.

### Skill de CRUD

Arquivo: `.agents/skills/crud-laravel/SKILL.md`.

Define padrao para `Route::resource`, implicit route model binding, Form Requests, paginacao, mensagens de sucesso, views CRUD, validacoes e testes.

### Skill adicional: Testes Automatizados

Arquivo: `.agents/skills/testes-automatizados/SKILL.md`.

Define a cobertura minima de testes para autenticacao, CRUD, validacoes, admin e estudante.

### Skill adicional: Seguranca

Arquivo: `.agents/skills/seguranca/SKILL.md`.

Define regras para autenticacao, CSRF, autorizacao por perfil, escopo de dados por usuario e cuidado com dados sensiveis.

## Desenvolvimento

### Funcionalidades implementadas

- Instalacao do Laravel 13.
- Instalacao e configuracao do Laravel Boost.
- Plano de implementacao.
- Quatro Skills do projeto.
- Autenticacao com cadastro, login e logout.
- Perfil `admin` e `student`.
- Migration, model, factory e seeder de trilhas de estudo.
- CRUD completo de trilhas.
- Policy para controlar acesso por perfil e propriedade.
- Dashboard com indicadores e trilhas recentes.
- Interface Blade responsiva com CSS proprio.
- README com instalacao, banco, execucao e usuarios de teste.
- Testes automatizados com PHPUnit.

### Decisoes de projeto

- O banco padrao escolhido foi SQLite para facilitar instalacao e correcao.
- O CSS foi servido por `public/css/app.css`, evitando depender de build front-end para executar a aplicacao.
- O CRUD usa Form Requests para manter controllers mais simples.
- A regra de acesso foi centralizada em `StudyTrackPolicy`.
- Admin visualiza todas as trilhas; estudantes visualizam apenas as proprias.
- Status e niveis ficam centralizados no model `StudyTrack` para serem reutilizados por validacao e views.

### Dificuldades encontradas

- O ambiente inicial nao tinha PHP nem Composer no PATH. Foi necessario baixar PHP portatil e Composer PHAR para criar e validar o projeto localmente.
- A primeira execucao dos testes revelou que o layout Blade estava no caminho errado para componente anonimo. O arquivo foi movido para `resources/views/components/layouts/app.blade.php`.
- O PowerShell bloqueou `npm.ps1`, entao a interface foi mantida sem dependencia de build Node para reduzir risco na execucao.

## Revisao e testes

Foram executadas as seguintes verificacoes:

```bash
php artisan route:list
php artisan migrate:fresh --seed --force
php artisan test
```

Resultado dos testes:

- 7 testes passando.
- 37 assertions.

Os testes cobrem cadastro, login, logout, redirecionamento de visitantes, CRUD de trilhas, validacoes, bloqueio de acesso entre estudantes e visualizacao global por admin.

## Limitacoes

- Nao ha recuperacao de senha.
- Nao ha anexos ou upload de materiais.
- Nao ha filtros avancados por periodo ou area.
- A aplicacao usa uma regra simples de perfis em uma coluna `role`.
- O tema ainda deve ser confirmado com o professor para evitar repeticao na turma.

## Conclusao

O projeto atende aos requisitos minimos da atividade: Laravel instalado, Laravel Boost instalado, MCP documentado, Skills obrigatorias e adicionais criadas, plano de implementacao no repositorio, autenticacao funcional, banco com migrations e seeders, CRUD completo, README, relatorio e testes automatizados relevantes.

O historico Git foi mantido de forma incremental, com commits separados para instalacao, Boost, planejamento, Skills, autenticacao, modelagem, CRUD, visual, testes e documentacao.
