<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $buscar = trim($request->input('buscar', ''));

        $pacientes = Paciente::query()
            ->when($buscar, function ($consulta, $buscar) {
                $consulta->where('dni', 'like', "$buscar%")
                         ->orWhere('apellidos', 'ilike', "%$buscar%");
            })
            ->orderBy('apellidos')
            ->orderBy('nombres')
            ->paginate(10)
            ->withQueryString();

        return view('pacientes.index', compact('pacientes', 'buscar'));
    }

    public function create()
    {
        return view('pacientes.create', ['paciente' => new Paciente()]);
    }

    public function store(StorePacienteRequest $request)
    {
        $paciente = Paciente::create($request->validated());

        return redirect()->route('pacientes.show', $paciente)
            ->with('ok', 'Paciente registrado correctamente.');
    }

    public function show(Paciente $paciente)
    {
        $citas = $paciente->citas()
            ->with('personalMedico')
            ->latest('fecha_hora')
            ->take(5)
            ->get();

        return view('pacientes.show', compact('paciente', 'citas'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->validated());

        return redirect()->route('pacientes.show', $paciente)
            ->with('ok', 'Datos del paciente actualizados.');
    }

    public function destroy(Paciente $paciente)
    {
        //
    }
}