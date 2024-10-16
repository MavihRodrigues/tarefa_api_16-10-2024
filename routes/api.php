<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('tarefa', [TarefaController::class, 'cadastrar']);

Route::get('tarefa/find/{id}', [TarefaController::class, 'findById']);

Route::get('tarefa/request', [TarefaController::class, 'findByIdRequest']);

Route::get('tarefa/getAll', [TarefaController::class, 'getAll']);

Route::delete('deletar/{id}', [TarefaController::class, 'delete']);

Route::put('tarefa/{id}', [TarefaController::class, 'update']);

Route::get('tarefa/pesquisar/dia/mes', [TarefaController::class, 'findByDayAndMonth']);



