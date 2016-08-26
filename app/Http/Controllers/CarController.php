<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CategoryCar;
use App\CategoryPerson;

use Excel;

class CarController extends Controller
{

	public function  store(Request $req) {
		$car = new CategoryCar();
		$car->nombre_encuestador = $req->nombre;
		$car->particular = $req->particular;
		$car->bicicleta = $req->bicicleta;
		$car->motocicleta = $req->motocicleta;
		$car->taxi = $req->taxi;
		$car->publico = $req->publico;
		$car->repartidor = $req->repartidor;
		$car->calle_relevamiento = $req->relevamiento;
		$car->calle_lateral_a = $req->lateral_a;
		$car->calle_lateral_b = $req->lateral_b;
		$car->temperatura = $req->temperatura;
		$car->condiciones = $req->condiciones;
		$car->hora_inicio = $req->inicio;
		$car->hora_fin = $req->fin;
		$car->fecha = $req->fecha;
		$car->nota = $req->nota;
		$car->save();
		return "1";
	}

	public function datos() {
		//$dataCar = CategoryCar::All()->orderBy('id', 'asc')->get();
		/*$dataPerson = CategoryPerson::All();
		$data = array();
		array_push($data, $dataCar);
		array_push($data, $dataPerson);*/
		
		return view('welcome');
	}

	public function buscar(Request $req) {
		$dataCar = CategoryCar::orwhere('nombre_encuestador', 'like', '%'.$req->nombre.'%')
								->orderBy('id', 'asc')
								->get();

		$dataPeople = CategoryPerson::orwhere('nombre_encuestador', 'like', '%'.$req->nombre.'%')
								->orderBy('id', 'asc')
								->get();

		$data = array();
		array_push($data, $dataCar);
		array_push($data, $dataPeople);

		return view('welcome')->with('data', $data);
	}


	public function downloadExcel($nombre, $category) {
		if($category == 1) {
			$nombrecar = "Datos Vehiculos ". $nombre;
			
			Excel::create($nombrecar, function($excel) use($nombre){

		    return 	$excel->sheet('Excel sheet', function($sheet) use($nombre){
			    		$dataCar = CategoryCar::orwhere('nombre_encuestador', 'like', '%'.$nombre.'%')
								->orderBy('id', 'asc')
								->get();
			    		$sheet->fromArray($dataCar);
			        	$sheet->setOrientation('landscape');

			    	});

				})->export('xls');
			}
			else {
				$nombreperson = "Datos Personas ". $nombre;
				Excel::create($nombreperson, function($excel) use($nombre) {

			    return $excel->sheet('Excel sheet', function($sheet) use($nombre){
			    		$dataPeople = CategoryPerson::orwhere('nombre_encuestador', 'like', '%'.$nombre.'%')
								->orderBy('id', 'asc')
								->get();
			    		$sheet->fromArray($dataPeople);
			        	$sheet->setOrientation('landscape');

			    	});

				})->export('xls');
			}	 
		}
		
		

	public function getDownload() {
		$file = public_path()."/download/count_ultimate.apk";

    	return response()->download($file);
	}

}
