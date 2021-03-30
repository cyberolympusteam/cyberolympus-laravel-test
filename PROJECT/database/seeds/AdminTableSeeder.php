<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [

            [
                'id' => 1, 'name' => 'admin', 'type' => 'admin', 'mobile' => '0895708400201', 'email' => 'admin@test.com',
                'password' => 'admintest', 'images' => '', 'status' => 1,
            ],

        ];

        DB::table('admins')->insert($adminRecords);
    }
}