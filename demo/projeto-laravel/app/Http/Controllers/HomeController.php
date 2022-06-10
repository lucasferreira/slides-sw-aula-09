<?php
namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index()
	{
		$alunos = Aluno::orderBy('nome', 'asc')->get();

		return view('home/index', array("alunos" => $alunos));
	}

	public function create(Request $request)
	{
		// validation rules.
		$rules = array(
			'nome' => 'required|string|max:255',
			'email' => 'required|email|string|max:255',
		);

		// custom validation error messages.
		$messages = array(
			'nome.required' => 'Por favor informe um nome completo',
			'email.required' => 'Por favor informe um e-mail de aluno válido',
			'email.email' => 'Por favor informe um e-mail de aluno válido',
		);

		$labels = array(
			"email" => "e-mail",
		);

		// validando uma requisição...
		// se isso aqui falhar o código não irá adiante e voltará para a tela anterior
		$validatedData = $request->validate($rules, $messages, $labels);

		$novoAluno = new Aluno();
		$novoAluno->nome = $request->input('nome');
		$novoAluno->email = $request->input('email');
		$novoAluno->save();

		return redirect("/")
			->with('success', 'Aluno cadastrado com sucesso!');
	}

	public function delete(Request $request, $id)
	{
		Aluno::destroy($id);

		return redirect("/")
			->with('success', 'Aluno excluído com sucesso!');
	}
}
