<?php
namespace App\Http\Controllers\Api;

use App\Curso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursosController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cursos = Curso::orderBy('name', 'ASC')->get();

    return response()->json($cursos);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $curso = new Curso();
    $curso->name = $request->name;
    $curso->save();

    return response()->json($curso);
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
      $curso = Curso::findOrFail($id);
      return response()->json($curso);
    }
    catch (\Exception $err)
    {
      return response()->json(array("error" => "Curso not found"), 404);
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
    $curso = Curso::find($id);
    $curso->name = $request->name;
    $curso->save();

    return response()->json($curso);
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
      $curso = Curso::findOrFail($id);
      $curso->delete();

      return response()->json(array("id" => $id));
    }
    catch (\Exception $err)
    {
      return response()->json(array("error" => "Curso not found"), 404);
    }
  }
}
