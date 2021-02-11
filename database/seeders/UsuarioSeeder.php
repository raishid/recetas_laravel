<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'federico',
            'email' => 'federicoelbroder@gmail.com',
            'password' => Hash::make('fadr085805'),
            'url' => 'http://federico.com',
        ]);

        User::create([
            'name' => 'federico2',
            'email' => 'federico2@gmail.com',
            'password' => Hash::make('fadr085805'),
            'url' => 'http://federico2.com',
        ]);

    }
}
