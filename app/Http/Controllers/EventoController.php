<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    /**
     * Exibe a listagem de eventos com suporte a filtro de busca.
     */
    public function index(Request $request)
    {
        // Captura o termo de busca enviado pelo formulário GET
        $busca = $request->input('busca');

        // Se houver busca, filtra por título; caso contrário, busca todos ordenados por título
        if ($busca) {
            $eventos = Evento::where('titulo', 'like', "%{$busca}%")
                ->orderBy('titulo', 'asc')
                ->get();
        } else {
            $eventos = Evento::orderBy('titulo', 'asc')->get();
        }

        // Retorna a view dos eventos passando a coleção de eventos e o termo pesquisado
        return view('eventos.index', compact('eventos', 'busca'));
    }

    /**
     * Exibe o formulário de cadastro de eventos.
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Salva o novo evento no banco de dados com validação.
     */
    public function store(Request $request)
    {
        // Validação dos campos do formulário
        $dadosValidados = $request->validate([
            'titulo' => 'required|min:3',
            'local' => 'required|min:2',
            'vagas' => 'required|integer|min:1',
            'preco_inscricao' => 'required|numeric|min:0',
        ]);

        // Persistência no banco usando o ORM Eloquent
        Evento::create($dadosValidados);

        // Redireciona para a listagem de eventos com mensagem de sucesso
        return redirect('/eventos')->with('success', 'Evento cadastrado com sucesso!');
    }
}