<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
	// não podemos esquecer de adicionar o nome da tabela
	protected $table = 'alunos';
}
