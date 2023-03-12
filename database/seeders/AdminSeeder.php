<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory(1)->create();
        $adminInfo = new Admin();
        $adminInfo->name = 'Admin';
        $adminInfo->email = 'rahmansohel155@gmail.com';
        $adminInfo->password = Hash::make('password');
        $adminInfo->status = 0;
        $adminInfo->save();
    }
}