<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;

class VacanteController extends Controller
{
    //
    public function index()
    {
        return view('vacantes.index');
    }

    public function create()
    {
        return view('vacantes.create');
    }

    public function edit(Vacante $vacante)
    {

        //$this->authorize('update', $vacante);
        if (Gate::allows('update', $vacante)) {
            return view('vacantes.edit', [
                'vacante' => $vacante
            ]);
        } else {
            return redirect()->route('vacantes.index');
        }
    }
}
