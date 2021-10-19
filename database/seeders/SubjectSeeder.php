<?php
namespace Database\Seeders;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PSC = [
            'psc'
        ];

        $JSC = [
            'jsc'
        ];

        $JDC = [
            'jdc'
        ];

        // ssc / evaluation course
        $SSC = [
            'Science',
            'Humanities',
            'Business Studies',
        ];

        $Dakhil = [
            'Science',
            'Humanities',
            'Business Studies',
            'General',
        ];

        $S_S_C_Vocational = [
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Textile Technology'
        ];

        $O_Level_Cambridge = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Textile Technology'
        ];

        $S_S_C_Equivalent = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Textile Technology'
        ];

        $Trade_Certificate = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Textile Technology'
        ];

        //hsc evaluation group
        $HSC = [
            'Science',
            'Humanities',
            'Business Studies',
        ];


        $Alim = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Pharmacy',
            'Medical Technology(Lab)',
            'Medical Technology(Radiography)',
            'Medical Technology(Blood Transfusion)'
        ];


        $Business_Management = [
            'Humanities',
            'Business Studies',
        ];


        $Diploma_Engineering = [
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Pharmacy',
            'Medical Technology(Lab)',
            'Medical Technology(Radiography)',
            'Medical Technology(Blood Transfusion)'
        ];


        $A_Level_Sr_Cambridge = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Pharmacy',
            'Medical Technology(Lab)',
            'Medical Technology(Radiography)',
            'Medical Technology(Blood Transfusion)'
        ];


        $H_S_C_Equivalent = [
            'Science',
            'Humanities',
            'Business Studies',
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Pharmacy',
            'Medical Technology(Lab)',
            'Medical Technology(Radiography)',
            'Medical Technology(Blood Transfusion)'
        ];


        $Diploma = [
            'Agriculture Technology',
            'Architecture and Interior Design Technology',
            'Automobile Technology',
            'Civil Technology',
            'Computer Science &amp; Technology',
            'Chemical Technology',
            'Electrical Technology',
            'Data Telecommunication and Network Technology',
            'Electrical and Electronics Technology',
            'Environmental Technology',
            'Instrumentation &amp; Process Control Technology',
            'Mechanical Technology',
            'Mechatronics Technology',
            'Power Technology',
            'Refregeration &amp; Air Conditioning Technology',
            'Telecommunication Technology',
            'Electronics Technology',
            'Library Science',
            'Survey',
            'General Mechanics',
            'Firm Machinery',
            'Pharmacy',
            'Medical Technology(Lab)',
            'Medical Technology(Radiography)',
            'Medical Technology(Blood Transfusion)'
        ];

        // Graduation all subject
        $B_A_Honors = ['Akaid', 'Arabic', 'Archaeology', 'Bangla', 'Development Studies', 'Drama &amp; Music', 'Drawing and Printing', 'English', 'Ethics',
            'Fikha', 'Fine Arts', 'Folklore', 'Graphics', 'Hadith', 'History', 'History of Music', 'Home Economics', 'Industrial Arts', 'International Relations',
            'Islamic History and Culture', 'Islamic Studies', 'Language/Linguistic',
            'Library Science', 'Modern Arabic', 'Music', 'Pali', 'Persian', 'Philosophy',
            'Sanskrit', 'Tafsir', 'Urdu', 'World Religion'];

        $B_A_Pass_Course = ['B.A', 'Music'];

        $B_Com_Honors = ['Accounting', 'Finance', 'Management', 'Marketing'];

        $B_Com_Pass_Course = ['B.Com'];

        $B_Ed_Honors = ['Education'];

        $B_S_S_Honors = ['Anthropology', 'Economics', 'Mass Comm. &amp; Journalism',
            'Peace &amp; Conflict', 'Political Science/Govt. and Politics', 'Population Science', 'Public Administration', 'Public Finance', 'Social Welfare',
            'Sociology', 'Urban Development', 'Women Studies'];

        $B_S_S_Pass_Course = ['B.S.S'];

        $B_Sc_Agricultural_Science = ['Agr.Co-operative &amp; Marketing',
            'Agriculture Chemistry', 'Agriculture Co-operatives', 'Agriculture Economics',
            'Agriculture Engineering', 'Agriculture Extension', 'Agriculture Finance',
            'Agriculture Marketing', 'Agriculture Science', 'Agriculture Soil Science',
            'Agriculture Statistics', 'Agriculture Water Management', 'Agro Forestry',
            'Agronnomy', 'Agronomy &amp; Aquaculture', 'Agronomy &amp; Aquaculture Extension',
            'Anatomology', 'Anatomy &amp; Histology', 'Animal Breeding &amp; Genetic', 'Animal Husbandry', 'Animal Nutrition', 'Animal Science',
            'Bio-Technology', 'Corp Botany', 'Dairy Science', 'Doc.of Veterinary Science',
            'Farm Power &amp; Machinery', 'Farm Structure', 'Fisheries', 'Fisheries &amp; Aquaculture',
            'Fisheries Biology', 'Fisheries Management', 'Fisheries Technology', 'Food Tech. &amp; Rural Industry', 'Forestry', 'Horticulture',
            'Livestock', 'Microbiology &amp; Hygenic', 'Paratrology', 'Plant Pathology',
            'Poultry Science', 'Production Economics', 'Rural Sociology', 'Surgery &amp; Obstate'
        ];

        $B_Sc_Engineering__Architecture = ['Architecture', 'Chemical', 'Civil',
            'Computer Science', 'Electrical', 'Electrical &amp; Electronics',
            'Electronic', 'Environmental Engineering', 'Genetic Engineering',
            'Industrial', 'Leather Technology', 'Marine', 'Mechanical', 'Metallurgy',
            'Microwave Engineering', 'Mineral', 'Mining', 'Naval Architecture', 'Physical Planning', 'Regional Planning', 'Structural', 'Tele-Comunication Engineering',
            'Textile Technology', 'Town Planning', 'Urban Planning'
        ];

        $B_Sc_Honors = ['Agriculture', 'Applied Chemistry', 'Applied Mathematics',
            'Applied Physics', 'Biochemistry', 'Botany', 'Chemistry', 'Clinical Psychology', 'Computer Science', 'Forestry', 'Genetic and Breeding',
            'Geography', 'Geology/Environment', 'Information Com. Tech. (ICT)',
            'Marine Science', 'Mathematics', 'Medical Technology', 'Microbiology',
            'Pharmaceutical Chemistry', 'Pharmacy', 'Physics', 'Psychology',
            'Soil Water and Environment Science', 'Statistics', 'Water &amp; Environment Science', 'Zoology'
        ];

        $B_Sc_Pass_Course = ['B.Sc'];

        $B_Tech = ['A & B Section of A.M.I.E'];

        $BBA = ['Accounting', 'Accounting and Information Systems', 'Banking', 'Banking and Insurance', 'Business Administration', 'Finance', 'Finance and Banking',
            'Human Resource Management', 'International Business', 'Management',
            'Management Information Systems', 'Marketing', 'Organization Strategy and Leadership', 'Tourism and Hospitality Management'
        ];

        $BBS = ['Accounting', 'Accounting and Information Systems', 'Banking', 'Banking and Insurance', 'Business Administration', 'Finance', 'Finance and Banking',
            'Human Resource Management', 'International Business', 'Management',
            'Management Information Systems', 'Marketing', 'Organization Strategy and Leadership', 'Tourism and Hospitality Management'
        ];

        $BBS_Pass_Course = ['BBS'];

        $Fazil = ['Akaid', 'Arabic', 'Fikha', 'Hadith', 'Islamic Studies', 'Modern Arabic', 'Tafsir'];

        $L_L_B_Pass_Course = ['L.L.B'];

        $LL_B_Honours = ['International Law', 'Law/Jurisprudence'];

        $M_B_B_S__B_D_S = ['Dental Surgery', 'Medicine & Surgery'];


        // Master all subject
        $Kamil = ['Akaid', 'Arabic', 'Fikha', 'Hadith', 'Islamic Studies', 'Modern Arabic', 'Tafsir'];

        $LL_M = ['International Law', 'Law/Jurisprudence'];

        $M_A = ['Akaid', 'Arabic', 'Archaeology', 'Bangla', 'Development Studies',
            'Drama &amp; Music', 'Drawing and Printing', 'English', 'Ethics', 'Fikha',
            'Fine Arts', 'Folklore', 'Graphics', 'Hadith', 'History', 'History of Music',
            'Home Economics', 'Industrial Arts', 'International Relations',
            'Islamic History and  Culture', 'Islamic Studies', 'Language/Linguistic',
            'Library Science', 'M.A',
            'Modern Arabic', 'Music', 'Pali', 'Persian', 'Philosophy', 'Sanskrit',
            'Tafsir', 'Urdu', 'World Religion'];

        $M_Com = ['Accounting', 'Finance', 'Management', 'Marketing'];

        $M_Ed = ['Education'];

        $M_S_S = ['Anthropology', 'Economics', 'English', 'M.S.S', 'Mass Comm. &amp; Journalism',
            'Peace &amp; Conflict', 'Political Science/Govt. and Politics',
            'Population Science', 'Public Administration', 'Public Finance',
            'Social Welfare/Social Work', 'Sociology', 'Urban Development', 'Women Studies'
        ];

        $M_Sc = ['Agriculture', 'Applied Chemistry', 'Applied Mathematics', 'Applied Physics',
            'Biochemistry', 'Botany', 'Chemistry', 'Clinical Psychology',
            'Computer Science', 'Forestry', 'Genetic and Breeding', 'Geography',
            'Science', 'Mathematics', 'Medical Technology', 'Microbiology',
            'Pharmaceutical Chemistry', 'Pharmacy', 'Physics', 'Psychology',
            'Soil Water and Environment Science', 'Statistics',
            'Water &amp; Environment Science', 'Zoology'
        ];

        $M_Sc_Agricultural_Science = ['Agr.Co-operative &amp; Marketing',
            'Agriculture Chemistry', 'Agriculture Co-operatives',
            'Agriculture Economics', 'Agriculture Engineering', 'Agriculture Extension',
            'Agriculture Finance', 'Agriculture Marketing', 'Agriculture Science',
            'Agriculture Soil Science', 'Agriculture Statistics',
            'Agriculture Water Management', 'Agro Forestry', 'Agronnomy',
            'Agronomy &amp; Aquaculture', 'Agronomy &amp; Aquaculture Extension',
            'Anatomology', 'Anatomy &amp; Histology', 'Animal Breeding &amp; Genetic',
            'Animal Husbandry', 'Animal Nutrition', 'Animal Science', 'Bio-Technology',
            'Corp Botany', 'Dairy Science', 'Doc.of Veterinary Science',
            'Farm Power &amp; Machinery', 'Farm Structure', 'Fisheries',
            'Fisheries &amp; Aquaculture', 'Tech. &amp; Rural Industry', 'Forestry',
            'Horticulture', 'Livestock', 'Microbiology &amp; Hygenic', 'Paratrology',
            'Plant Pathology', 'Poultry Science', 'Production Economics', 'Rural Sociology',
            'Surgery &amp; Obstate'
        ];

        $M_Sc_Engineering_Architecture = ['Architecture', 'Chemical', 'Civil',
            'Computer Science', 'Electrical', 'Electrical &amp; Electronics',
            'Electronic', 'Environmental Engineering', 'Genetic Engineering',
            'Industrial', 'Leather Technology', 'Marine', 'Mechanical', 'Metallurgy',
            'Microwave Engineering', 'Mineral', 'Mining', 'Naval Architecture',
            'Physical Planning', 'Regional Planning', 'Structural', 'Tele-Comunication Engineering',
            'Textile Technology', 'Town Planning', 'Urban Planning'
        ];

        $MBA = ['Accounting', 'Accounting and Information Systems', 'Banking',
            'Banking and Insurance', 'Business Administration', 'Finance',
            'Finance and Banking', 'Human Resource Management', 'International Business',
            'Management', 'Leadership', 'Tourism and Hospitality Management'
        ];

        $MBM = ['MBM'];

        $MBS = ['Accounting', 'Accounting and Information Systems', 'Banking',
            'Banking and Insurance', 'Business Administration', 'Finance',
            'Finance and Banking', 'Human Resource Management', 'International Business',
            'Management', 'Management Information Systems', 'Marketing',
            'Organization Strategy and Leadership', 'Tourism and Hospitality Management'
        ];

        $ME_Mtech = ['A & B Section of A.M.I.E'];

        $Mmed = ['Dental Surgery', 'Medicine &amp; Surgery'];


        $subjects = [

            '1' => $psc_class = [
                $PSC
            ],

            '2' => $jsc_class = [
                $JSC,
                $JDC,
            ],


            '3' => $ssc_class = [
                $SSC,
                $Dakhil,
                $S_S_C_Vocational,
                $O_Level_Cambridge,
                $S_S_C_Equivalent,
                $Trade_Certificate
            ],

            '4' => $hsc_class = [
                $HSC,
                $Alim,
                $Business_Management,
                $Diploma_Engineering,
                $A_Level_Sr_Cambridge,
                $H_S_C_Equivalent,
                $Diploma
            ],

            '5' => $Graduations = [
                $B_A_Honors,
                $B_A_Pass_Course,
                $B_Com_Honors,
                $B_Com_Pass_Course,
                $B_Ed_Honors,
                $B_S_S_Honors,
                $B_S_S_Pass_Course,
                $B_Sc_Agricultural_Science,
                $B_Sc_Engineering__Architecture,
                $B_Sc_Honors,
                $B_Sc_Pass_Course,
                $B_Tech,
                $BBA,
                $BBS,
                $BBS_Pass_Course,
                $Fazil,
                $L_L_B_Pass_Course,
                $LL_B_Honours,
                $M_B_B_S__B_D_S
            ],

            '6' => $Masters = [
                $Kamil,
                $LL_M,
                $M_A,
                $M_Com,
                $M_Ed,
                $M_S_S,
                $M_Sc,
                $M_Sc_Agricultural_Science,
                $M_Sc_Engineering_Architecture,
                $MBA,
                $MBM,
                $MBS,
                $ME_Mtech,
                $Mmed
            ]
        ];

        $section_names = [
            "PSC",
            "JSC",
            "JDC",
            "S.S.C",
            "Dakhil",
            "S.S.C Vocational",
            "O Level/Cambridge",
            "S.S.C Equivalent",
            "Trade Certificate",
            "H.S.C",
            "Alim",
            "Business Management",
            "Diploma Engineering",
            "A Level/Sr. Cambridge",
            "H.S.C Equivalent",
            "Diploma",
            "B.A (Honors)",
            "B.A (Pass Course)",
            "B.Com (Honors)",
            "B.Com (Pass Course)",
            "B.Ed (Honors)",
            "B.S.S (Honors)",
            "B.S.S (Pass Course)",
            "B.Sc (Agricultural Science)",
            "B.Sc (Engineering/Architecture)",
            "B.Sc (Honors)",
            "B.Sc (Pass Course)",
            "B.Tech",
            "BBA",
            "BBS",
            "BBS (Pass Course)",
            "Fazil",
            "L.L.B (Pass Course)",
            "LL.B. (Honours)",
            "M.B.B.S/ B.D.S",
            "Kamil",
            "LL.M",
            "M.A",
            "M.Com",
            "M.Ed",
            "M.S.S",
            "M.Sc",
            "M.Sc (Agricultural Science)",
            "M.Sc (Engineering/Architecture)",
            "MBA",
            "MBM",
            "MBS",
            "ME/Mtech",
            "Mmed",
        ];

        $count = -1;
        foreach ($subjects as $class_type_id => $subject) {

            foreach ($subject as $key => $subject_name) {
                $count++;
                $section_id = Section::where('section_name', $section_names[$count])->pluck('id')->first();

                foreach ($subject_name as $value) {

                    Subject::create([
                        'class_id' => $class_type_id,
                        'section_id' => $section_id,
                        'subject_name' => $value,
                        'slug' => Str::slug($value),
                        'created_by' => Auth::id(),
                    ]);
                }
            }
        }
    }
}
