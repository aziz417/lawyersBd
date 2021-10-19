<?php
namespace Database\Seeders;
use App\Models\ClassType;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classTypes = [
            'PSC',
            'JSC',
            'SSC',
            'HSC',
            'Graduation',
            'Masters'
        ];
        foreach ($classTypes as $type){
            ClassType::create([
                'class_name' => $type,
            ]);
        }
    }
}
