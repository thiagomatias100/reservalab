<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{

    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel;

        $usuario = [
            'nome' => "Thiago Matias da silva",
            'email' => 'tmatias100@gmail.com',
            'maticula' => '3217347',
            'telefone' => '98-554574569',
        ];
        $usuarioModel->insert($usuario);
    }
}
