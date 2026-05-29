<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nombre'   => 'Gerson',
                'apellido' => 'Borja',
                'correo'   => 'borja@ejemplo.com',
                'clave'    => '$2y$10$fAL1bF2marnL1atyNEhHs.KtDlfMsxfPZ9aHc35op1afo2XM6RikO',
                'rol'      => 'Usuario',
            ],
            [
                'nombre'   => 'Admin',
                'apellido' => 'Sistema',
                'correo'   => 'admin@ejemplo.com',
                'clave'    => '$2y$10$fAL1bF2marnL1atyNEhHs.KtDlfMsxfPZ9aHc35op1afo2XM6RikO',
                'rol'      => 'Administrador',
            ],
        ]);
    }
}
