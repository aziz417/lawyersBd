<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories['name'] = ['Corporate Law', 'Civil Litigation', 'Criminal Litigatio', 'Banking & Insurance'];
        $categories['position'] = ['Senior', 'Senior', 'junior', 'mid level'];

        foreach ($categories['name'] as $key => $name){
            Category::create([
                'name' => $name,
                'position' => $categories['position'][$key],
            ]);
        }
    }
}