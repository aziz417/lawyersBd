<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'registration_id' => 0,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'role'  => 'admin',
        ]);
    }
}
