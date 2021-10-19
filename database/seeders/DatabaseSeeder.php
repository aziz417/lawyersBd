<?php
namespace Database\Seeders;
use App\Models\Institute;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UserSeeder::class);
//         $this->call(BoardSeeder::class);
//         $this->call(DivisionSeeder::class);
//         $this->call(DistrictSeeder::class);
//         $this->call(UpazilaSeeder::class);
//         $this->call(UnionSeeder::class);
//         $this->call(ClassTypeSeeder::class);
//         $this->call(InstituteSeeder::class);
//         $this->call(SectionSeeder::class);
//         $this->call(SubjectSeeder::class);
//         $this->call(QuotaSeeder::class);
         $this->call(CategorySeeder::class);
    }
}
