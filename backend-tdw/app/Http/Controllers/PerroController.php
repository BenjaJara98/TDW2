<?php

namespace App\Http\Controllers;

use App\Models\Perro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\PerroRequest;

class PerroController extends Controller
{
    public function create(PerroRequest $request)
    {
        try {
            $perro = new Perro();
            $perro->name = $request->name;
            $perro->urlFoto = $request->urlFoto;
            $perro->description = $request->description;
            $perro->save();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
  
    public function GET(Perro $perro)
    {
        $perro = Perro::all();
        return response()->json(["perro" => $perro], Response::HTTP_OK);
    }

    
    public function UPDATE(Request $request, Perro $perro)
{
    try {
        $perro->name = $request->name;
        $perro->urlFoto = $request->urlFoto;
        $perro->description = $request->description;
        $perro->save();

        return response()->json(["perro" => $perro], Response::HTTP_OK);
    } catch (Exception $e) {
        return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}

    public function DELETE(Perro $perro, $id)
    {
        try {
            $perro = Perro::find($id);
            $perro->DELETE();
            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
