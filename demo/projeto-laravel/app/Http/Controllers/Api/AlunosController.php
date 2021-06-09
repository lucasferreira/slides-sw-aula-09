<?php
namespace App\Http\Controllers\Api;

use App\Aluno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $alunos = Aluno::with('curso')->orderBy('name', 'ASC')->get();

    return response()->json($alunos);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $aluno = new Aluno();
    $aluno->codigo = $request->codigo;
    $aluno->name = $request->name;
    $aluno->email = $request->email;
    $aluno->curso_id = $request->curso_id;
    $aluno->save();

    return response()->json($aluno);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    try {
      $aluno = Aluno::with('curso')->findOrFail($id);
      return response()->json($aluno);
    }
    catch (\Exception $err)
    {
      return response()->json(array("error" => "Aluno not found"), 404);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $aluno = Aluno::find($id);
    $aluno->codigo = $request->codigo;
    $aluno->name = $request->name;
    $aluno->email = $request->email;
    $aluno->curso_id = $request->curso_id;
    $aluno->save();

    return response()->json($aluno);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    try {
      $aluno = Aluno::findOrFail($id);
      $aluno->delete();

      return response()->json(array("id" => $id));
    }
    catch (\Exception $err)
    {
      return response()->json(array("error" => "Aluno not found"), 404);
    }
  }
}
