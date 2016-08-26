<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CategoryPerson;
use App\CategoryCar;

class PersonController extends Controller
{
	public function store(Request $req) {
		$person = new CategoryPerson();
		$person->nombre_encuestador = $req->nombre;
		$person->hombre = $req->hombre;
		$person->ninia = $req->ninia;
		$person->mujer = $req->mujer;
		$person->anciano = $req->anciano;
		$person->calle_relevamiento = $req->relevamiento;
		$person->calle_lateral_a = $req->lateral_a;
		$person->calle_lateral_b = $req->lateral_b;
		$person->temperatura = $req->temperatura;
		$person->condiciones = $req->condiciones;
		$person->hora_inicio = $req->inicio;
		$person->hora_fin = $req->fin;
		$person->fecha = $req->fecha;
		$person->nota = $req->nota;
		$person->fijoc = $req->fijoc;
		$person->fijon = $req->fijon;
		$person->ambulantec = $req->ambulantec;
		$person->ambulanten = $req->ambulanten;
		$person->indigenah = $req->indigenah;
		$person->indigenam = $req->indigenam;
		$person->comentario = $req->comentario;
		$person->imageMapeo = $req->imageMapeo;
		$person->imageAcera = $req->imageAcera;
		$person->save();
		return "1";
	}
}
