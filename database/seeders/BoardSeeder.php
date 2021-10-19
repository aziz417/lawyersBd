<?php
namespace Database\Seeders;
use App\Models\Board;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boards = [
            'Dhaka',
            'Cumilla',
            'Rajshahi',
            'Jashore',
            'Chittagong',
            'Barishal',
            'Sylhet',
            'Dinajpur',
            'Mymensingh',
            'Cambridge International - IGCE',
            'Edexcel International',
            'Bangladesh Technical Education Board (BTEB)',
            'Bangladesh Madrasah Education Board',
        ];

        foreach ($boards as $board){
            Board::create([
                'board_name' => $board,
                'slug' => Str::slug($board),
            ]);
        }

    }
}
