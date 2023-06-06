<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("SET foreign_key_checks=0");
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        $roles = ["Medecin", "Professionel de Santé", "Admin"];

        foreach ($roles as $role) {
            $role = Role::Create(['name' => $role, 'guard_name' => "api"]);
        }
    }
}
