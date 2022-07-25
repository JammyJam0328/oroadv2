<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Document,CampusDocument,Campus};
class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Document::create([
            'name'=>'TOR For UnderGrad (2 yr Course)',
            'price'=>'125'
        ]);
       Document::create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Employment',
            'price'=>'175'
        ]);
       Document::create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Board Exam',
            'price'=>'250'
        ]);
       Document::create([
            'name'=>'TOR For UnderGrad (4-5 Yr Degree) for Tansfer/Evaluation',
            'price'=>'300'
        ]);
       Document::create([
            'name'=>'TOR For Graduate School',
            'price'=>'50',
            'other_description'=>'First Page-75 Succeeding-50'
        ]);

       Document::create([
            'name'=>'Certification (Undergrad students)',
            'price'=>'20'
        ]);
        
       Document::create([
            'name'=>'Certification (Graduate School)',
            'price'=>'30'
        ]);
        
        
       Document::create([
            'name'=>'Certification of Weighted Average',
            'price'=>'30'
        ]);
     
       Document::create([
            'name'=>'CAV',
            'price'=>'50'
        ]);
   
        Document::create([
            'name'=>'Re-issuance of Diploma',
            'price'=>'250'
        ]);         

       Document::create([
            'name'=>'Certificate of good moral',
            'price'=>'30'
        ]);

        Document::create([
            'name'=>'Plan of course work',
            'price'=>'30'
        ]);

        $campuses = Campus::all();
        $documents = Document::all();

        foreach ($campuses as $campus) {
           foreach ($documents as $document) {
               CampusDocument::create([
                   'campus_id'=>$campus->id,
                   'document_id'=>$document->id,
               ]);
           }
        }



        //  DB::table('purposes')->insert([
        //     [
        //         'description'=>'For Licensure examination',
        //     ],
        //     [
        //         'description'=>'For Transfer/evaluation',
        //     ],
        //     [
        //         'description'=>'For Enrollment',
        //     ],
        //     [
        //         'description'=>'For Employment',
        //     ],
        //     [
        //         'description'=>'Promotion',
        //     ],
        //     [
        //         'description'=>'Scholarship',
        //     ],
        //     [
        //         'description'=>'Others',
        //     ],
        // ]);
    }
}