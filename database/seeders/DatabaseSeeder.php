<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $data = new User;
        $data->name = "Lugaru";
        $data->username = "lugaru";
        $data->email = "lugaru@lugaru.id";
        $data->password = Hash::make("lugaru");
        $data->save();
    }
}
