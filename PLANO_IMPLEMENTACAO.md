# Plano de Implementacao

## Contexto

O projeto sera uma aplicacao web chamada **Trilha Livre**, um gestor de trilhas de estudo para estudantes acompanharem objetivos, prazos e progresso de estudos. O tema foi escolhido por ser especifico, util no contexto academico e adequado para demonstrar autenticacao, banco de dados, seeders e um CRUD completo em Laravel.

## Objetivo da aplicacao

Permitir que usuarios autenticados cadastrem e acompanhem trilhas de estudo com tema, nivel, status, carga horaria planejada, horas concluidas, periodo e observacoes.

## Problema que resolve

Estudantes costumam organizar estudos em anotacoes dispersas. A aplicacao centraliza esse acompanhamento, facilita visualizar progresso e torna mais simples revisar o que esta pendente, ativo ou concluido.

## Publico-alvo

Estudantes, monitores e professores que desejam acompanhar pequenas trilhas de estudo em disciplinas, cursos livres ou projetos academicos.

## Escopo

- Autenticacao com login, registro e logout.
- Usuarios de teste criados por seeders.
- Perfis `admin` e `estudante`.
- CRUD completo de trilhas de estudo.
- Interface navegavel e responsiva.
- Validacoes com Form Requests.
- Testes automatizados relevantes.
- README e relatorio final documentando IA, MCP e Skills.

## Funcionalidades

- Login, cadastro e encerramento de sessao.
- Dashboard com indicadores de trilhas.
- Listagem paginada de trilhas.
- Criacao de trilhas com dados obrigatorios e opcionais.
- Edicao de trilhas existentes.
- Visualizacao detalhada.
- Exclusao com confirmacao.
- Filtro simples por status.
- Seeders com usuarios e trilhas iniciais.

## Entidades do banco

- `users`: nome, e-mail, senha, perfil de acesso.
- `study_tracks`: usuario, titulo, area, nivel, status, horas planejadas, horas concluidas, datas e observacoes.

## Telas

- Tela inicial publica.
- Login.
- Registro.
- Dashboard autenticado.
- Listagem de trilhas.
- Formulario de criacao.
- Formulario de edicao.
- Detalhe da trilha.

## Ordem de implementacao

1. Instalar Laravel e Laravel Boost.
2. Criar plano e Skills obrigatorias.
3. Configurar autenticacao manual com sessoes.
4. Modelar `study_tracks` e relacionamento com usuarios.
5. Criar seeders com usuarios e trilhas.
6. Implementar controllers, Form Requests e rotas.
7. Construir views Blade e CSS responsivo.
8. Criar testes de autenticacao e CRUD.
9. Revisar, executar Pint e PHPUnit.
10. Finalizar README e RELATORIO.md.

## Tecnologias utilizadas

- PHP 8.4.
- Laravel 13.
- Laravel Boost 2.
- SQLite para desenvolvimento e testes.
- Blade, HTML e CSS.
- PHPUnit.
- Laravel Pint.
- Codex com MCP configurado pelo Laravel Boost.

## Riscos

- Tema precisar ser confirmado com o professor para evitar repeticao.
- Ambiente local exigir PHP, Composer e extensoes especificas.
- Diferencas entre Windows e ambientes Linux ao rodar scripts.
- Necessidade de explicar durante a correcao todo codigo produzido com apoio de IA.

## Criterios de aceite

- Aplicacao executa com `php artisan serve`.
- Autenticacao funciona para usuarios de teste.
- Seeders criam dados iniciais.
- CRUD de trilhas permite listar, criar, visualizar, editar e excluir.
- Usuarios estudantes acessam apenas suas trilhas; admin visualiza todas.
- README inclui instalacao, banco, seeders, execucao e usuarios de teste.
- RELATORIO.md documenta MCP, Skills, decisoes e limitacoes.
- Repositorio possui pelo menos 10 commits incrementais.
- Testes automatizados relevantes passam.
