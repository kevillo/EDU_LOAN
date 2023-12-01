<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rol_usuarios')->insert([

            'descripcion' => 'Administrador',
            'created_at' => '2023-12-01 00:00:00',
            'updated_at' => '2023-12-01 00:00:00'
        ]);
        // para llenar el usuario
        DB::table('users')->insert([

            'id_rol_user' => 1,
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_available' => 1,
            'created_at' => '2023-12-01 00:00:00',
            'updated_at' => '2023-12-01 00:00:00'

        ]);
    }
}
