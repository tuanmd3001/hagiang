<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('name', 'admin')->first();
        if (!$admin){
            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make(\App\Models\Constants::DEFAULT_PASSWORD),
            ]);
        }
        $super_admin = Role::where('name', 'SuperAdmin')->first();
        if(!$super_admin){
            Role::create([
               'name' => 'SuperAdmin',
               'guard_name' => 'web'
            ]);
        }
        $admin->assignRole('SuperAdmin');

        // $this->call(UsersTableSeeder::class);
    }
}
