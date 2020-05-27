<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $alunos = \App\Aluno::get();

        return view('home.index', ['alunos' => $alunos]);
    }

    public function teste()
    {
        return view('home.teste', ['nome' => 'a', 'email' => 'b']);
    }
}
