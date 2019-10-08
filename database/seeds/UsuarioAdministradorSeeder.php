<?php

use Illuminate\Database\Seeder;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'email'=> 'hector.leon@crystalmedia.mx',
            'password' => bcrypt('Ab_12345678')
        ]);
    }
}
