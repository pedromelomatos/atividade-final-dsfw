---
name: testes-automatizados
description: "Use ao criar ou revisar testes PHPUnit para autenticacao, CRUD, validacoes, permissoes e regressao funcional do Trilha Livre."
license: MIT
---

# Skill de Testes Automatizados

## Principios

- Testes devem provar comportamento de usuario, nao detalhes internos.
- Preferir Feature Tests para fluxos web.
- Usar banco SQLite de teste e isolamento de dados.
- Cada teste deve ter uma intencao clara.

## Cobertura minima

- Visitante consegue acessar tela inicial e e redirecionado quando tenta area autenticada.
- Usuario consegue fazer login e logout.
- Usuario autenticado consegue criar, editar, visualizar e excluir trilhas.
- Dados invalidos retornam erros de validacao.
- Estudante nao visualiza trilhas de outro estudante.
- Admin consegue visualizar trilhas de todos.

## Padroes

- Usar factories para criar usuarios.
- Usar `actingAs()` para fluxos autenticados.
- Usar `assertStatus`, `assertRedirect`, `assertSee` e asserts de banco/modelo conforme o caso.
- Nao depender de seeders em testes especificos, salvo quando o teste validar o proprio seeder.

## Execucao

- Executar `php artisan test` antes da entrega.
- Quando alterar estilo, executar `vendor/bin/pint`.
