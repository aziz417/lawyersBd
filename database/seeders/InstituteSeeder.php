<?php
namespace Database\Seeders;
use App\Models\ClassType;
use App\Models\Institute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $graduation = [
            'Sonargaon University',
            'Bangladesh Agricultural University,Mymensingh',
            'Bangladesh Open University',
            'Bangladesh University of Engineering &amp; Technology',
            'Bangladesh University of Professionals',
            'Chittagong University of Engineering &amp; Technology',
            'Chittagong Veterinary and Animal Sciences University',
            'Comilla University',
            'Dhaka University',
            'Dhaka University of Engineering &amp; Technology',
            'Hajee Mohammad Danesh Science &amp; Technology University',
            'Islamic University, Kushtia',
            'Jagannath University',
            'Jahangirnagar University',
            'Jatiya Kabi Kazi Nazrul Islam University',
            'Jessore Science &amp; Technology University',
            'Khulna University',
            'Khulna University of Engineering and Technology',
            'Mawlana Bhashani Science &amp; Technology University',
            'National University',
            'Noakhali Science &amp; Technology University',
            'Pabna University of Science and Technology',
            'Patuakhali Science And Technology University',
            'Rajshahi University',
            'Rajshahi University of Engineering &amp; Technology',
            'Rangpur University',
            'Shahjalal University of Science &amp; Technology',
            'Sher-e-Bangla Agricultural University',
            'Sylhet Agricultural University',
            'University of Chittagong',
            'Ahsanullah University of Science and Technology',
            'America Bangladesh University',
            'American International University Bangladesh',
            'ASA University Bangladesh',
            'Asian University of Bangladesh',
            'Atish Dipankar University of Science &amp; Technology',
            'Bangladesh Islami University',
            'Bangladesh University',
            'Bangladesh University of Business &amp; Technology (BUBT)',
            'BGC Trust University Bangladesh, Chittagong',
            'BRAC University',
            'Central Women`s University',
            'City University',
            'Daffodil International University',
            'Darul Ihsan University',
            'Dhaka International University',
            'East Delta University , Chittagong',
            'East West University',
            'Eastern University',
            'Gono Bishwabidyalay',
            'Green University of Bangladesh',
            'IBAIS University',
            'Independent University, Bangladesh',
            'International Islamic University, Chittagong',
            'International University of Business Agriculture &amp; Technology',
            'Leading University, Sylhet',
            'Manarat International University',
            'Metropolitan University, Sylhet',
            'North South University',
            'Northern University Bangladesh',
            'Premier University, Chittagong',
            'Presidency University',
            'Prime University',
            'Primeasia University',
            'Queens University',
            'Royal University of Dhaka',
            'Shanto Mariam University of Creative Technology',
            'Southeast University',
            'Southern University of Bangladesh , Chittagong',
            'Stamford University, Bangladesh',
            'State University Of Bangladesh',
            'Sylhet International University, Sylhet',
            'The Millenium University',
            'Bangabandhu Sheikh Mujib Medical University',
            'Bangabandhu Sheikh Mujibur Rahman Agricultural University',
            'The Peoples University of Bangladesh',
            'The University of Asia Pacific',
            'United International University',
            'University of Development Alternative',
            'University of Information Technology &amp; Sciences',
            'University of Liberal Arts Bangladesh',
            'University of Science &amp; Technology, Chittagong',
            'University of South Asia',
            'Uttara University',
            'Victoria University of Bangladesh',
            'World University of Bangladesh',
            'Asian University for Women',
            'Islamic University of Technology',
            'South Asian University',
            'Dhaka Medical College',
            'Sir Salimullah Medical College',
            'Mymensingh Medical College',
            'Chittagong Medical College',
            'Rajshahi Medical College',
            'MAG Osmani Medical College',
            'Sher-E-Bangla Medical College',
            'Rangpur Medical College',
            'Comilla Medical College',
            'Khulna Medical College',
            'Shaheed Ziaur Rahman Medical College',
            'Dinajpur Medical College',
            'Faridpur Medical College',
            'Shaheed Suhrawardy Medical College',
            'Pabna Medical College',
            'Noakhali Medical College',
            'Cox`s Bazar Medical College',
            'Jessore Medical College',
            'Shaheed Nazrul Islam Medical College',
            'Kushtia Medical College',
            'Satkhira Medical College',
            'Sheikh Sayera Khatun Medical College, Gopalganj',
            'Feni Medical College,Feni',
            'Gono Bishwabidyalay, Savar, Dhaka',
            'Ad - din Women`s Medical College, Dhaka',
            'Anwer Khan Modern Medical College, Dhaka',
            'Bangladesh Medical College',
            'Jalalabad Rageb - Rabeya Medical College,Sylhet',
            'BGC Trust Medical College, Chittagong',
            'Central Medical College, Comilla',
            'Chottagram Ma - O - Shishu Hospital Medical College',
            'Community Based Medical College(cbmc), Mymensingh',
            'Community Medical College, Dhaka',
            'Delta Medical College, Dhaka',
            'Dhaka National Medical College',
            'Durra Samad Rahman Red Crescent Women�s Medical College, Sylhet',
            'Eastern Medical College, Comilla',
            'Enam Medical College, Savar, Dhaka',
            'Sylhet Women`s Medical College, Sylhet',
            'Green Life Medical College,Dhaka',
            'Holy Family Red Crescent Medical College, Dhaka',
            'Ibrahim Medical College, Dhaka',
            'Ibn Sina Medical College, Dhaka',
            'International Medical College, Gazipur',
            'Islami Bank Medical College, Rajshahi',
            'Jahurul Islam Medical College, Kishoregonj',
            'Jalalabad Ragib - Rabeya Medical College Sylhet',
            'Khawja Yunus Ali Medical College, Sirajganj',
            'Kumudini Medical College, Tangail',
            'Labaid Medical College[6] Dhanmondi, Dhaka',
            'Maulana Bhasani Medical College',
            'Medical College for Women and Hospital, Dhaka',
            'Nightingale Medical College, Dhaka',
            'North Bengal Medical College, Sirajganj',
            'North East Medical College, Sylhet',
            'Northern International Medical College, Dhaka',
            'Northern private Medical College, Rangpur',
            'Popular Medical College & amp; Hospital, Dhaka',
            'Prime Medical College, Rangpur',
            'Rangpur Community Hospital Medical College',
            'Sahabuddin Medical College and Hospital',
            'Samaj Vittik Medical College, Mirzanagar, Savar',
            'Shahabuddin Medical College, Dhaka',
            'Z . H . Sikder Women`s Medical College',
            'Southern Medical College, Chittagong',
            'Tairunnessa Memorial Medical College, Gazipur',
            'TMSS Medical College,Bogra',
            'University Of Science and Technology Chittagong . IAMS',
            'Uttara Adhunik Medical College,Dhaka',
            'Military Institute of Science and Technology(MIST)'
        ];


        $Masters = [
            'Sonargaon University',
            'Bangladesh Agricultural
      University,Mymensingh', 'Bangladesh Open University', 'Bangladesh
      University of Engineering & Technology', 'Bangladesh University of
      Professionals', 'Chittagong University of Engineering & Technology',
            'Chittagong Veterinary and Animal Sciences University', 'Comilla
      University', 'Dhaka University', 'Dhaka University of Engineering &
      Technology', 'Hajee Mohammad Danesh Science & Technology University',
            'Islamic University, Kushtia ', 'Jagannath University', 'Jahangirnagar
      University', 'Jatiya Kabi Kazi Nazrul Islam University', 'Jessore Science
      & Technology University', 'Khulna University', 'Khulna University of
      Engineering and Technology', 'Mawlana Bhashani Science & Technology
      University', 'National University', 'Noakhali Science & Technology
      University', 'Pabna University of Science and Technology', 'Patuakhali
      Science And Technology University', 'Rajshahi University', 'Rajshahi
      University of Engineering & Technology', 'Rangpur University', 'Shahjalal
      University of Science & Technology', 'Sher-e-Bangla Agricultural
      University', 'Sylhet Agricultural University', 'University of Chittagong',
            'Ahsanullah University of Science and Technology', 'America Bangladesh
      University', 'American International University Bangladesh', 'ASA
      University Bangladesh', 'Asian University of Bangladesh', 'Atish Dipankar
      University of Science & Technology', 'Bangladesh Islami University',
            'Bangladesh University', 'Bangladesh University of Business & Technology
      (BUBT)', 'BGC Trust University Bangladesh, Chittagong', 'BRAC University',
            'Central Women`s University', 'City University', 'Daffodil International
      University', 'Darul Ihsan University', 'Dhaka International University',
            'East Delta University , Chittagong', 'East West University', 'Eastern
      University', 'Gono Bishwabidyalay', 'Green University of Bangladesh',
            'IBAIS University', 'Independent University, Bangladesh', 'International
      Islamic University, Chittagong', 'International University of Business
      Agriculture & Technology', 'Leading University, Sylhet', 'Manarat
      International University', 'Metropolitan University, Sylhet', 'North South
      University', 'Northern University Bangladesh', 'Premier University,
      Chittagong', 'Presidency University', 'Prime University', 'Primeasia
      University', 'Queens University',
            'Bangabandhu Sheikh Mujib Medical University', 'Bangabandhu Sheikh Mujibur Rahman Agricultural University',
            'Royal University of Dhaka', 'Shanto
      Mariam University of Creative Technology', 'Southeast University',
            'Southern University of Bangladesh , Chittagong', 'Stamford University,
      Bangladesh', 'State University Of Bangladesh', 'Sylhet International
      University, Sylhet', 'The Millenium University', 'The Peoples University
      of Bangladesh', 'The University of Asia Pacific', 'United International
      University', 'University of Development Alternative', 'University of
      Information Technology & Sciences', 'University of Liberal Arts
      Bangladesh', 'University of Science & Technology, Chittagong', 'University
      of South Asia', 'Uttara University', 'Victoria University of Bangladesh',
            'World University of Bangladesh', 'Asian University for Women', 'Islamic
    University of Technology', 'South Asian University', 'Dhaka Medical
      College', 'Sir Salimullah Medical College', 'Mymensingh Medical College',
            'Chittagong Medical College', 'Rajshahi Medical College', 'MAG Osmani
      Medical College', 'Sher - E - Bangla Medical College', 'Rangpur Medical
      College', 'Comilla Medical College', 'Khulna Medical College', 'Shaheed
      Ziaur Rahman Medical College', 'Dinajpur Medical College', 'Faridpur
      Medical College', 'Shaheed Suhrawardy Medical College', 'Pabna Medical
      College', 'Noakhali Medical College', 'Cox`s Bazar Medical College',
            'Jessore Medical College', 'Shaheed Nazrul Islam Medical College',
            'Kushtia Medical College', 'Satkhira Medical College', 'Sheikh Sayera
      Khatun Medical College, Gopalganj', 'Feni Medical College,Feni', 'Gono
      Bishwabidyalay, Savar, Dhaka', 'Ad-din Women`s Medical College, Dhaka',
            'Anwer Khan Modern Medical College, Dhaka', 'Bangladesh Medical College',
            'Jalalabad Rageb-Rabeya Medical College,Sylhet', 'BGC Trust Medical
      College, Chittagong', 'Central Medical College, Comilla', 'Chottagram
      Ma-O-Shishu Hospital Medical College', 'Community Based Medical College
      (cbmc), Mymensingh', 'Community Medical College, Dhaka', 'Delta Medical
      College, Dhaka', 'Dhaka National Medical College', 'Durra Samad Rahman Red
      Crescent Women�s Medical College, Sylhet', 'Eastern Medical College,
      Comilla', 'Enam Medical College, Savar, Dhaka', 'Sylhet Women`s Medical
      College, Sylhet', 'Green Life Medical College,Dhaka', 'Holy Family Red
      Crescent Medical College, Dhaka', 'Ibrahim Medical College, Dhaka', 'Ibn
      Sina Medical College, Dhaka', 'International Medical College, Gazipur',
            'Islami Bank Medical College, Rajshahi', 'Jahurul Islam Medical College,
      Kishoregonj', 'Jalalabad Ragib-Rabeya Medical College Sylhet', 'Khawja
      Yunus Ali Medical College, Sirajganj', 'Kumudini Medical College,
      Tangail', 'Labaid Medical College[6] Dhanmondi, Dhaka', 'Maulana Bhasani
      Medical College', 'Medical College for Women and Hospital, Dhaka',
            'Nightingale Medical College, Dhaka', 'North Bengal Medical College,
      Sirajganj', 'North East Medical College, Sylhet', 'Northern International
      Medical College, Dhaka', 'Northern Private Medical College, Rangpur',
            'Popular Medical College & Hospital, Dhaka', 'Prime Medical College,
      Rangpur', 'Rangpur Community Hospital Medical College', 'Sahabuddin
      Medical College and Hospital', 'Samaj Vittik Medical College, Mirzanagar,
      Savar', 'Shahabuddin Medical College, Dhaka', 'Z. H. Sikder Women`s
      Medical College', 'Southern Medical College, Chittagong', 'Tairunnessa
      Memorial Medical College, Gazipur', 'TMSS Medical College,Bogra',
            'University Of Science and Technology Chittagong. IAMS', 'Uttara Adhunik
      Medical College,Dhaka', 'Military Institute of Science and Technology
      (MIST)'
        ];

        $institutes = [
            $graduation,
            $Masters
        ];
        $class_names = [
            'Graduation',
            'Masters'
        ];
        $count = -1;
        foreach ($institutes as $institute) {
            $count++;
            $class_type_id = ClassType::where('class_name', $class_names[$count])->pluck('id')->first();
            foreach ($institute as $key => $institute_name) {
                Institute::create([
                    'class_type_id' => $class_type_id,
                    'institute_name' => $institute_name,
                    'slug' => Str::slug($institute_name),
                    'created_by' => Auth::id(),
                ]);
            }
        }
    }
}
