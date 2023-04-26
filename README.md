# Api Rest com Laravel 9 na prática

https://www.udemy.com/course/api-rest-com-laravel-9-na-pratica


## <a name="indice">Índice</a>

1. [Seção 1: Introdução](#parte1)     
2. [Seção 2: Mãos na massa](#parte2)     
3. [Seção 3: Migrations](#parte3)     
4. [Seção 4: Create, Read, Update e Delete. Criação de EndPoints Insomnia](#parte4)     
5. [Seção 5: Melhorias](#parte5)     
6. [Seção 6: Autenticação Sanctum](#parte6)     
7. [Seção 7: Relacionamentos](#parte7)     
8. [Seção 8: Desafios](#parte8)     
9. [Seção 9: Extras](#parte9)     
10. [Seção 10: ApiResource](#parte10)     
11. [Seção 11: HATEOAS](#parte11)     
12. [Seção 12: Links Úteis](#parte12)     
13. [Seção 13: Atualizações](#parte13)     
14. [Seção 14: Frontend](#parte14)     
---


## <a name="parte1">1 - Seção 1: Introdução</a>

- 1. Introdução e Estrutura de Pastas do sistema.

[https://candied-gooseberry-205.notion.site/Criando-API-REST-com-Laravel-9-606573f493e9494b9b7abc7ac1298828](https://candied-gooseberry-205.notion.site/Criando-API-REST-com-Laravel-9-606573f493e9494b9b7abc7ac1298828)

- 2. Conceitos importantes
- 3. API REST

[Voltar ao Índice](#indice)

---


## <a name="parte2">2 - Seção 2: Mãos na massa</a>

- 4. Ambiente de Desenvolvimento
- 5. Criação do Projeto

[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - Seção 3: Migrations</a>

- 6. Criação das tabelas


```bash
 sail php artisan make:model Testamento --migration

   INFO  Model [app/Models/Testamento.php] created successfully.  
   INFO  Migration [database/migrations/2023_04_25_184754_create_testamentos_table.php] created successfully. 

sail php artisan make:model Livro --migration

   INFO  Model [app/Models/Livro.php] created successfully.  
   INFO  Migration [database/migrations/2023_04_25_185801_create_livros_table.php] created successfully.  

sail php artisan make:model Versiculo --migration

   INFO  Model [app/Models/Versiculo.php] created successfully.  
   INFO  Migration [database/migrations/2023_04_25_185835_create_versiculos_table.php] created successfully.  
```


[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Seção 4: Create, Read, Update e Delete. Criação de EndPoints Insomnia</a>

- 7. Testamentos

```bash

sail php artisan make:controller TestamentoController --api

   INFO  Controller [app/Http/Controllers/TestamentoController.php] created successfully.  

```

- 8. Livros
- 9. Versículos

[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Seção 5: Melhorias</a>

- 10. Rotas

```php
//Route::get( '/testamento', [TestamentoController::class, 'index']);
//Route::get( '/testamento/{id}', [TestamentoController::class, 'show']);
//Route::put( '/testamento/{id}', [TestamentoController::class, 'update']);
//Route::post('/testamento', [TestamentoController::class, 'store']);
//Route::delete('/testamento/{id}', [TestamentoController::class, 'destroy']);
//
//Route::get( '/livro', [LivroController::class, 'index']);
//Route::get( '/livro/{id}', [LivroController::class, 'show']);
//Route::put( '/livro/{id}', [LivroController::class, 'update']);
//Route::post('/livro', [LivroController::class, 'store']);
//Route::delete('/livro/{id}', [LivroController::class, 'destroy']);
//
//Route::get( '/versiculo', [VersiculoController::class, 'index']);
//Route::get( '/versiculo/{id}', [VersiculoController::class, 'show']);
//Route::put( '/versiculo/{id}', [VersiculoController::class, 'update']);
//Route::post('/versiculo', [VersiculoController::class, 'store']);
//Route::delete('/versiculo/{id}', [VersiculoController::class, 'destroy']);

/*
Route::apiResource('testamento',TestamentoController::class);
Route::apiResource('livro',LivroController::class);
Route::apiResource('versiculo',VersiculoController::class);
*/

Route::apiResources([
    'testamento'=> TestamentoController::class,
    'livro'=> LivroController::class,
    'versiculo'=> VersiculoController::class,
]);

```

- 11. Controllers

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Seção 6: Autenticação Sanctum</a>

- 12. Introdução

- [https://laravel.com/docs/10.x/sanctum#main-content](https://laravel.com/docs/10.x/sanctum#main-content)

```bash
sail php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"     

   INFO  Publishing assets.  

  Copying directory [vendor/laravel/sanctum/database/migrations] to [database/migrations] ..................................................... DONE
  File [config/sanctum.php] already exists ................................................................................................. SKIPPED 

sail php artisan migrate                                                                              

   INFO  Nothing to migrate.  

```

- 13. Registrando usuário e emitindo Token

```bash
sail php artisan make:controller AuthController           

   INFO  Controller [app/Http/Controllers/AuthController.php] created successfully.  

```

- 14. Login
- 15. Protegendo as rotas
- 16. Logout

[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Seção 7: Relacionamentos</a>

- 17. Testamento com Livros
- 18. Livros com Versiculos

[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Seção 8: Desafios</a>

- 19. Desafio 1
- 20. Resposta do Desafio

[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Seção 9: Extras</a>

- 21. Upload de Imagem

[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Seção 10: ApiResource</a>



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Seção 11: HATEOAS</a>



[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Seção 12: Links Úteis</a>



[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Seção 13: Atualizações</a>



[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Seção 14: Frontend</a>



[Voltar ao Índice](#indice)

---

