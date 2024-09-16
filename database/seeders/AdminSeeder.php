<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use PhpParser\Node\Expr\New_;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = New User();
        $user->name = 'admin';
        $user->email = 'admin@toko.com';
        $user->password = bcrypt('admintoko');
        $user->role = 'admin';
        $user->save();
    }
}
