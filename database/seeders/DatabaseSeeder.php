<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RailCar;
use Illuminate\Support\Facades\Artisan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //Generating User
         User::factory(10)->create();

        //Generating RailCars
        RailCar::factory(50)->create();

        //Generating Permissions
         Artisan::call('permission:create-permission create_railcar');
         Artisan::call('permission:create-permission view_railcar');
         Artisan::call('permission:create-permission edit_railcar');
         Artisan::call('permission:create-permission delete_railcar');

         //Generating Roles and assigning permissions
         Artisan::call('permission:create-role normal web "create_railcar|view_railcar|edit_railcar|delete_railcar"');
         Artisan::call('permission:create-role admin web "view_railcar|delete_railcar"');

         //Assigning Admin Role to the first user
         User::first()->assignRole('admin');

         //Assigning Normal Role to the all other users.
         User::where('id','<>',1)
             ->get()
             ->each(function($user){
                   return $user->assignRole('normal');
             });
    }
}
