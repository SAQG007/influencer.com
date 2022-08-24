<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'display_name' => 'Admin',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'Subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Can access limited features!'
            ],
        ];

        foreach ($roles as $key => $value)
        {
            $role = Role::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description'],
            ]);
        }
    }
}
