<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories['title'] = ['Corporate Law', 'Civil Litigation', 'Criminal Litigatio', 'Banking & Insurance'];
        $categories['position'] = ['Senior', 'Senior', 'junior', 'mid level'];

        foreach ($categories['title'] as $key => $title){
            $slug= Str::slug($title);

            Category::create([
                'title' => $title,
                'slug' => $slug,
                'position' => $categories['position'][$key],
            ]);
        }
    }
}
