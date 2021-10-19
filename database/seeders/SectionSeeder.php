<?php
namespace Database\Seeders;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $psc = ['PSC'];

        $jsc = ['JSC', 'JDC'];

        $ssc = ['S.S.C', 'Dakhil', 'S.S.C Vocational', 'O Level/Cambridge', 'S.S.C Equivalent', 'Trade Certificate'];

        $hsc =['H.S.C', 'Alim', 'Business Management', 'Diploma Engineering',
            'A Level/Sr. Cambridge', 'H.S.C Equivalent', 'Diploma'];

        $Graduation = ['B.A (Honors)', 'B.A (Pass Course)', 'B.Com (Honors)',
            'B.Com (Pass Course)', 'B.Ed (Honors)', 'B.S.S (Honors)', 'B.S.S (Pass Course)',
            'B.Sc (Agricultural Science)', 'B.Sc (Engineering/Architecture)', 'B.Sc (Honors)',
            'B.Sc (Pass Course)', 'B.Tech', 'BBA', 'BBS', 'BBS (Pass Course)',
            'Fazil', 'L.L.B (Pass Course)', 'LL.B. (Honours)', 'M.B.B.S/ B.D.S'];

        $Masters = ['Kamil', 'LL.M', 'M.A', 'M.Com', 'M.Ed', 'M.S.S', 'M.Sc',
            'M.Sc (Agricultural Science)', 'M.Sc (Engineering/Architecture)', 'MBA', 'MBM',
            'MBS', 'ME/Mtech', 'Mmed'];

        $sections = [
            1 => $psc,
            2 => $jsc,
            3 => $ssc,
            4 => $hsc,
            5 => $Graduation,
            6 => $Masters,
        ];

        foreach ($sections as $class_type_id => $section) {
            foreach ($section as $key => $section_name) {
                Section::create([
                    'class_type_id' => $class_type_id,
                    'section_name' => $section_name,
                    'slug' => Str::slug($section_name),
                    'created_by' => Auth::id(),
                ]);
            }
        }
    }
}
