<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class QuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quotas = [
            'Non Quota',
            'Freedom Fighter',
            'Ethnic Minority',
            'Child of Freedom Fighter',
            'Grand Child of Freedom Fighter',
            'Ansar-VDP',
            'Orphan',
            'Physically Handicapped',
        ];

        foreach ($quotas as $quota){
            \App\Models\Quota::create([
                'quota' => $quota,
                'quota_type' => 'base_quota',
            ]);
        }
    }
}
