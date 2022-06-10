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
		$cursos = Curso::orderBy('nome', 'ASC')->get();

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
		$curso->nome = $request->input('nome');
		$curso->save();

		return response()->json($curso);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Curso  $curso
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$curso = Curso::find($id);

		return response()->json($curso);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Curso  $curso
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$curso = Curso::find($id);
		$curso->nome = $request->input('nome');
		$curso->save();

		return response()->json($curso);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Curso  $curso
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$curso = Curso::destroy($id);

		return response()->json(array("id" => $id));
	}
}
