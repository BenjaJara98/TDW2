<?php

namespace App\Http\Controllers;

use App\Models\Interaccion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\InteraccionRequest;

class InteraccionController extends Controller
{

    public function CREATE(InteraccionRequest $request)
    {
        try {
            $interaccion = new Interaccion();
            $interaccion->idDogInteresado = $request->idDogInteresado;
            $interaccion->idDogCandidato = $request->idDogCandidato;

            if($interaccion->idDogInteresado == $interaccion->idDogCandidato){
                return response()->json(["error" => "Es el mismo perro"], Response::HTTP_BAD_REQUEST);
            }

            $interaccion->preference = $request->preference;
            $interaccion->save();

            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function GET(Interaccion $interaccion, $id)
    {
        try {
            $interaccion = Interaccion::where('idDogInteresado', $id)->get();
            return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

}
