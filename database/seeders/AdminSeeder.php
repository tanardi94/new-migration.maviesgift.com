<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'uuid' => Str::uuid(),
            'name' => 'Admin Mavies Gift',
            'email' => 'admin@maviesgift.com',
            'password' => bcrypt('maviesjaya'),
        ]);
    }
}
