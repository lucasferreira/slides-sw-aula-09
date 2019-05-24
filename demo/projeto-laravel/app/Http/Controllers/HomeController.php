<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::orderBy('nome', 'asc')->get();

        return view('home/index', array("alunos" => $alunos));
    }

    public function teste(Request $request)
    {
        $aluno = new Aluno();
        $aluno->nome = $request->input("nome");
        $aluno->save();

        return "Cadastrado!";
    }

    public function salvar()
    {
        $aluno = new Aluno();
        $aluno->codigo = 1000;
        $aluno->nome = "TESTE 3";
        $aluno->email = "lucas.ferreira@satc.edu.br";
        $aluno->save();

        return "Aluno adicionado com sucesso!";
    }

    public function alterar($id)
    {
        $aluno = Aluno::find($id);
        $aluno->nome = "TESTE 10000";
        $aluno->save();

        return "Aluno alterar com sucesso!";
    }

    public function excluir($id)
    {
        Aluno::destroy($id);

        return "Aluno excluído com sucesso!";
    }
}
