<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\City;
use App\Company;
use App\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $model = new Country;
        $model->name = 'Romania';
        $model->code = 'RO';
        $model->save();

        $model = new Country;
        $model->name = 'United Kingdom';
        $model->code = 'UK';
        $model->save();

        $model = new City;
        $model->name = 'Bucharest';
        $model->country_id = 1;
        $model->save();

        $model = new City;
        $model->name = 'Cluj Napoca';
        $model->country_id = 1;
        $model->save();

        $model = new City;
        $model->name = 'London';
        $model->country_id = 2;
        $model->save();


        $model = new City;
        $model->name = 'Liverpool';
        $model->country_id = 2;
        $model->save();

        $model = new Company;
        $model->name = 'Agentia judeteana pentru ocuparea fortei de munca Bucuresti';
        $model->phone = '021020310';
        $model->address = 'Str. Viitorului 310A, 174239, Bucuresti, Sector 3';
        $model->city_id = 1;
        $model->save();

        User::create([
            'first_name' => 'Popescu',
            'last_name' => 'Andrei',
            'address' => 'Str. Doamne Ajuta, nr.120, 233234, Bucuresti, Romania',
            'phone_number' => '0722333444',
            'email' => 'admin@admin.com',
            'password' => Hash::make('superparola'),
        ]);

        DB::table('company_admins')->insert([
            ['user_id' => 1, 'company_id' => 1]
        ]);
    }
}
