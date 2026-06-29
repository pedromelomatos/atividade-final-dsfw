---
name: crud-laravel
description: "Use ao criar ou revisar CRUDs Laravel no projeto Trilha Livre, incluindo rotas, controllers, models, migrations, requests, views, autorizacao simples e testes."
license: MIT
---

# Skill de CRUD

## Estrutura obrigatoria

- Usar `Route::resource()` para CRUDs navegaveis.
- Usar implicit route model binding.
- Criar Form Requests para `store` e `update`.
- Usar `$request->validated()` em vez de `$request->all()`.
- Definir `$fillable` no model.
- Paginar listagens com no maximo 10 itens por pagina.
- Ordenar por `created_at` ou `id` de forma decrescente.

## Controller

- Metodos devem ser pequenos e focados.
- Regras de acesso simples podem ficar no controller quando nao houver policy formal.
- Redirecionar com mensagem de sucesso apos criar, atualizar ou excluir.
- Usar nomes de rotas consistentes.

## Validacao

- Campos obrigatorios devem ter mensagens claras no formulario.
- Datas finais nao podem ser anteriores a datas iniciais.
- Campos numericos devem ter limites minimos e maximos.
- Status deve ser validado contra lista fechada.

## Views

- `index`: filtro, tabela ou cards, paginacao e estado vazio.
- `create`: formulario de criacao.
- `edit`: formulario de edicao preenchido.
- `show`: leitura detalhada e acoes disponiveis.
- Formularios devem conter `@csrf`; edicao deve conter `@method('PUT')`; exclusao deve conter `@method('DELETE')`.

## Banco

- Foreign keys devem usar `constrained()` e regra de exclusao explicita.
- Campos filtrados ou ordenados devem receber indice quando fizer sentido.
- Seeders devem criar registros realistas para validacao manual.

## Testes

- Testar acesso autenticado.
- Testar criacao, edicao e exclusao.
- Testar validacao de dados invalidos.
- Testar regra de visibilidade entre usuarios quando existir propriedade por usuario.
