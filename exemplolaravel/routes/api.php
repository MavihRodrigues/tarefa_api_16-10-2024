<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('tarefa', [TarefaController::class, 'cadastrar']);

Route::get('tarefa/find/{id}', [TarefaController::class, 'findById']);

Route::get('tarefa/request', [TarefaController::class, 'findByIdRequest']);





