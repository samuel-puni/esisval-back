<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('rbac_vipfe')->table('users')->insert([
            ['id' => 1, 
            	'usuario' => "admin", 
            	'password' => bcrypt('vipfe11'), 
            	'nombre' => "admin",
            	'paterno' => "admin",
            	'email' => 'admin@vipfe.gob.bo', 'vigente' => 1],
        ]);

		DB::connection('rbac_vipfe')->table('sistemas')->insert([
            ['id' => 1, 'sistema' => "SISPRO-0", 'descripcion' => "Sistema de Programación"],
            ['id' => 2, 'sistema' => "SISPRO-1", 'descripcion' => "Sistema de Programación"],
            ['id' => 3, 'sistema' => "SISPRO-2", 'descripcion' => "Sistema de Programación"],
            ['id' => 4, 'sistema' => "SISPRO-3", 'descripcion' => "Sistema de Programación"],
            ['id' => 5, 'sistema' => "SISPRO-4", 'descripcion' => "Sistema de Programación"],
            ['id' => 6, 'sistema' => "SISPRO-5", 'descripcion' => "Sistema de Programación"],
            ['id' => 7, 'sistema' => "SISPRO-6", 'descripcion' => "Sistema de Programación"],
            ['id' => 8, 'sistema' => "SISPRO-7", 'descripcion' => "Sistema de Programación"],
            ['id' => 9, 'sistema' => "SISPRO-8", 'descripcion' => "Sistema de Programación"],
            ['id' => 10, 'sistema' => "SISPRO-9", 'descripcion' => "Sistema de Programación"],
        ]); 
    }
}
