---
name: seguranca
description: "Use ao criar ou revisar autenticacao, autorizacao, formularios, escopo de dados por usuario e protecao de informacoes sensiveis no Trilha Livre."
license: MIT
---

# Skill de Seguranca

## Autenticacao

- Areas privadas devem usar middleware `auth`.
- Login deve usar validacao, tentativa via `Auth::attempt()` e regeneracao da sessao.
- Logout deve invalidar a sessao e regenerar o token CSRF.
- Senhas devem ser armazenadas somente com `Hash::make()`.

## Autorizacao e escopo

- Usuario estudante acessa somente os proprios registros.
- Usuario admin pode visualizar todos os registros.
- Acoes de edicao, detalhe e exclusao devem validar propriedade ou perfil admin.
- Evitar expor IDs de registros que o usuario nao pode acessar.

## Formularios

- Todos os formularios mutaveis devem usar `@csrf`.
- Formularios de `PUT` e `DELETE` devem declarar `@method`.
- Entradas devem ser validadas com Form Requests.
- Saidas em Blade devem usar `{{ }}` para escape automatico.

## Dados e configuracao

- Nunca versionar `.env`.
- Usar `.env.example` para orientar configuracao.
- Nao colocar senhas reais na documentacao; usuarios de teste devem usar credenciais didaticas.
- Nao usar SQL bruto com entrada de usuario.

## Feedback seguro

- Mensagens de login nao devem revelar se o e-mail existe.
- Mensagens de erro devem ser claras, mas sem expor detalhes internos.
