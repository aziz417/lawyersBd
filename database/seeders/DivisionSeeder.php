<?php
namespace Database\Seeders;
use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = array(
            array('name' => 'Chattagram','bn_name' => 'চট্টগ্রাম'),
            array('name' => 'Rajshahi','bn_name' => 'রাজশাহী'),
            array('name' => 'Khulna','bn_name' => 'খুলনা'),
            array('name' => 'Barisal','bn_name' => 'বরিশাল'),
            array('name' => 'Sylhet','bn_name' => 'সিলেট'),
            array('name' => 'Dhaka','bn_name' => 'ঢাকা'),
            array('name' => 'Rangpur','bn_name' => 'রংপুর'),
            array('name' => 'Mymensingh','bn_name' => 'ময়মনসিংহ')
        );

        foreach ($divisions as $division){

            Division::create([
                'name' => $division['name'],
                'bn_name' => $division['bn_name'],
            ]);
        }
    }
}
