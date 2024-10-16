<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function cadastrar(Request $request)
    {
        $tarefa = Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Cadastrado',
            'data' => $tarefa
        ]);
    }

    public function findById($id)
    {
        $tarefa = Tarefa::find($id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não cadastrado'
            ]);
        }


        return response()->json([
            'status' => true,
            'message' => 'Cadastrado id',
            'data' => $tarefa
        ]);
    }

    public function findByIdRequest(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não cadastrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cadastrado Request',
            'data' => $tarefa
        ]);
    }

    public function getAll()
    {
        $tarefa = Tarefa::all();
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não cadastrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Cadastrado Request',
            'data' => $tarefa
        ]);
    }

    public function delete($id)
    {
        $tarefa = Tarefa::find($id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não deletado'
            ]);
        }

        $tarefa->delete();

        return response()->json([
            'status' => true,
            'message' => 'Deletado',
            'data' => $tarefa
        ]);
    }

    public function update(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Não Encontrado'
            ]);
        }

        if (isset($request->titulo)) {
            $tarefa->titulo = $request->titulo;
        }

        if (isset($request->message)) {
            $tarefa->message = $request->message;
        }

        $tarefa->update();

        return response()->json([
            'status' => true,
            'message' => 'Encontrado',
            'data' => $tarefa
        ]);
    }

    public function findByDayAndMonth(Request $request)
    {
        $tarefa = Tarefa::whereDay('created_at', '=', $request->day)->whereMonth('created_at', '=', $request->month)->get();
        if ($tarefa->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Não Encontrado'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Encontrado',
            'data' => $tarefa
        ]);
    }
}
