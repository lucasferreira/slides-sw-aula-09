<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curso;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy("name", "ASC")->get(); // SELECT * FROM cursos ORDER BY name DESC

        return view("home.index", ["cursos" => $cursos]);
    }

    public function teste($id)
    {
        $curso = Curso::find($id);
        // $curso = Curso::where("id", $id)->first();

        return view("home.teste", ["nome" => $curso->name]);
    }
}
