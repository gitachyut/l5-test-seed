<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(App\Country::class,100)->create();
        factory(App\User::class,10)->create();
        factory(App\Role::class,4)->create();
        factory(App\Article::class,100)->create();
        factory(App\Phone::class,10)->create();
        factory(App\UserRole::class,10)->create();


        // DB::table('user_role')->insert(
        //     [
        //         'user_id' => factory(App\User::class)->create()->id,
        //         'role_id' => factory(App\Role::class)->create()->id,
        //     ]
        // );


        Model::reguard();
    }
}
