<?php

namespace Tests\Feature;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PacienteTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_listar_y_registrar_un_paciente(): void
    {
        $this->get(route('pacientes.index'))->assertOk();

        $datos = [
            'dni'              => '71234568',
            'nombres'          => 'Lucía',
            'apellidos'        => 'Quispe Mamani',
            'fecha_nacimiento' => '1998-05-14',
            'sexo'             => 'F',
            'telefono'         => '984123456',
            'direccion'        => 'Av. El Sol 450',
        ];

        $this->post(route('pacientes.store'), $datos)
             ->assertRedirect();

        $this->assertDatabaseHas('pacientes', ['dni' => '71234568']);
    }

    public function test_no_permite_registrar_dni_duplicado(): void
    {
        Paciente::factory()->create(['dni' => '71234568']);

        $this->post(route('pacientes.store'), [
            'dni'              => '71234568',
            'nombres'          => 'Otro',
            'apellidos'        => 'Paciente',
            'fecha_nacimiento' => '1995-01-10',
            'sexo'             => 'M',
        ])->assertSessionHasErrors('dni');
    }
}