<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    TestamentoController,
    VersiculoController,
    LivroController,
    IdiomaController,
    VersaoController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::get('/teste', function(){
//    return "Teste com sucesso";
//});

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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResources([
        'testamento' => TestamentoController::class,
        'livro' => LivroController::class,
        'versiculo' => VersiculoController::class,
        'idioma' => IdiomaController::class,
        'versao' => VersaoController::class,
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
