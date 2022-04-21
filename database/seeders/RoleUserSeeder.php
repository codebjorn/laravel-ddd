<?php

namespace Database\Seeders;

use Database\Seeders\Abstracts\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('role_user')->insert(
            [
                [
                    'role_id' => rand(1, 5),
                    'user_id' => rand(1, 5)
                ],
                [
                    'role_id' => rand(1, 5),
                    'user_id' => rand(1, 5)
                ]
            ]
        );
    }
}
