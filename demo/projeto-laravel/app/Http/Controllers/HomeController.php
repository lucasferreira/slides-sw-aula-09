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
}
