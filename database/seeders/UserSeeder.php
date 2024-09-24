<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*User::create([
            'nome' => 'Igor',
            'email' => 'igor_stm@yahoo.com.br',
            'senha' => bcrypt('1234'),
            'adm' => 1,
        ]);
        */

        User::Factory(10)->create();
    }
}
