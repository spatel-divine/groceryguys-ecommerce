<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserEmailPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $getAll = User::all();
        // foreach ($getAll as $AKey => $Avalue) {
        //     $Avalue->password = Hash::make('12345678');
        //     $Avalue->save();
        // }
        // php artisan db:seed --class=UserEmailPasswordSeeder

        $admin = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'user_phone' => '12345678',
                'user_city' => '1',
                'user_area' => '1',
                'reg_date' => date("Y/m/d")
            ],
        ];

        foreach ($admin as $key => $value) {
            $check = User::where('email', $value['email'])->first();
            if (empty($check)) {
                User::create($value);
            }
        }
    }
}
