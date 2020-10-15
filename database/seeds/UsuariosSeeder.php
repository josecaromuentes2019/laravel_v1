<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jose Caro',
            'email' => 'josecaro@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://josecaroprogramador.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Juan Lopez',
            'email' => 'juanlopez@correo.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://juanlopezprogramador.com',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
