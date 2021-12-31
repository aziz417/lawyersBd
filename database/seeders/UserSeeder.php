<?php
namespace Database\Seeders;
use App\Models\User;
use App\Registration;
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
        $register = Registration::create([
            'applicants_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'type'  => 'admin',
        ]);
       $user = User::create([
            'registration_id' => $register->id,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
            'role'  => 'admin',
        ]);

        $register->update([
            'user_id' => $user->id,
        ]);
    }
}
