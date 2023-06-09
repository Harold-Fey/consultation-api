<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        DB::statement("SET foreign_key_checks=1");
        $admin=User::Create([
            'nom' => 'Admin',
            'email' => 'admin@admin.com',
            'mot_de_passe' => bcrypt('123456789'),
            'prenoms' => 'admin',
            'numero_de_telephone' => 00000000

        ]);
        $admin->assignRole('Admin');


    }
}
