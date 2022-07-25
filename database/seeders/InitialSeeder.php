<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Campus;
use App\Models\Program;
use App\Models\Document;
// use hash
use Illuminate\Support\Facades\Hash;
class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::create([
            "role" => "requestor",
            "name" => "Norjamille Kasan",
            "password" => Hash::make("qwert12345"),
            "email" => "jamclong0328@gmail.com",
        ]);
        User::create([
            "role" => "admin",
            "name" => "Administrator",
            "password" => Hash::make("adminsksyou123"),
            "email" => "sksuoroad@sksu.edu.ph",
        ]);
        $campus = Campus::create([
            'name' => 'ACCESS Campus',
        ]);

        $campus->programs()->create([
            'name'=>"Bachelor of Physical Education (BPEd)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Elementary Education (BEED)"
        ]);
    
        $campus->programs()->create([
            'name'=>"Bachelor in Secondary Education Major in English (BSEd-English)"
        ]);
    
        $campus->programs()->create([
            'name'=>"Bachelor in Secondary Education Major in Filipino (BSEd-Filipino)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Secondary Education Major in Science (BSEd-Science)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Secondary Education Major in Social Studies (BSEd-Social Studies)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Secondary Education Major in Mathematics (BSEd-Mathematics)"
        ]);
        $campus->programs()->create([
            'name'=>"Diploma in Teaching (DIT)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Agricultural Technology (BAT)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Criminology"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Nursing (BSN)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Midwifery (BSM)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Medical Technology"
        ]);
        $campus->programs()->create([
            'name'=>"Diploma in Midwifery"
        ]);
        $campus->programs()->create([
            'name'=>"Juris Doctor"
        ]);
        User::create([
            'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Access Campus",
            "password" => Hash::make("access12345"),
            "email" => "accessreg@gmail.com",
        ]);

         $documents=Document::get();

    foreach ($documents as $document) {
        $campus->campus_documents()->attach($document);
    }
        $campus = Campus::create([
            'name' => 'Isulan Campus',
        ]);

         $campus->programs()->create([
            'name'=>"Bachelor of Science in Civil Engineering (BSCE)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Computer Engineering (BSCpE)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Electronics Engineering (BSECE)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Computer Science (BSCS)"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor of Science in Information Technology (BSIT)"
        ]);

         $campus->programs()->create([
            'name'=>"Bachelor of Science in Information Systems (BSIS)"
        ]);
         $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Food Service Management"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Drafting Technology"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Automotive Technology"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd) Major in Electrical Technology"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd)  Major in Electronic Technology"
        ]);
        $campus->programs()->create([
            'name'=>"Bachelor in Technical-Vocational Teacher Education (BTVTEd)   Major in Civil Technology"
        ]);
         User::create([
              'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Isulan Campus",
            "password" => Hash::make("isulan12345"),
            "email" => "isulanreg@gmail.com",
        ]);

         $documents=Document::get();

        foreach ($documents as $document) {
            $campus->campus_documents()->attach($document);
        }



        $campus = Campus::create([
            'name' => 'Tacurong Campus',
        ]);

         $campus->programs()->create([
            'name' => 'Bachelor of Arts in Economics'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Arts in Political Science'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Biology'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Environmental Science'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Entrepreneurship'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Accountancy'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Management Accounting'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Hospitality Management'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Accounting Information System'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Tourism Management'
        ]);

         User::create([
              'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Tacurong Campus",
            "password" => Hash::make("tacurong12345"),
            "email" => "tacurongreg@gmail.com",
        ]);

         $documents=Document::get();

    foreach ($documents as $document) {
        $campus->campus_documents()->attach($document);
    }



        $campus = Campus::create([
            'name' => 'Kalamansig Campus',
        ]);

        $campus->programs()->create([
        'name' => 'Diploma in Teaching'
        ]);
            $campus->programs()->create([
                'name' => 'Bachelor of Science in Secondary Education'
            ]);
            $campus->programs()->create([
                'name' => 'Bachelor in Elementary Education'
            ]);
            $campus->programs()->create([
                'name' => 'Bachelor in Biology'
            ]);
            $campus->programs()->create([
                'name' => 'Bachelor in Fisheries'
            ]);

            $campus->programs()->create([
                'name' => 'Bachelor of Science in Criminology'
            ]);

            $campus->programs()->create([
                'name' => 'Bachelor of Science in Information Technology'
            ]);

               User::create([
                'campus_id' => $campus->id,
                "role" => "registrar",
                "name" => "Kalamansig Campus",
                "password" => Hash::make("kalamansig12345"),
                "email" => "kalamansigreg@gmail.com",
            ]);


        $campus = Campus::create([
            'name' => 'Palimbang Campus',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education'
        ]);
         User::create([
              'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Palimbang Campus",
            "password" => Hash::make("palimbang12345"),
            "email" => "palimbangreg@gmail.com",
        ]);

         $documents=Document::get();

    foreach ($documents as $document) {
        $campus->campus_documents()->attach($document);
    }
        $campus = Campus::create([
            'name' => 'Bagumbayan Campus',
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agribusiness'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Technology and Livelihood Education major in Agri-fisheries'
        ]);
         User::create([
              'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Bagumbayan Campus",
            "password" => Hash::make("bagumbayan12345"),
            "email" => "bagumbayanreg@gmail.com",
        ]);

         $documents=Document::get();

    foreach ($documents as $document) {
        $campus->campus_documents()->attach($document);
    }
        $campus = Campus::create([
            'name' => 'Lutayan Campus',
        ]);

        $campus->programs()->create([
            'name' => 'Bachelor in Agricultural Technology'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor of Science in Agriculture'
        ]);
        $campus->programs()->create([
            'name' => 'Bachelor in Elementary Education'
        ]);
         User::create([
              'campus_id' => $campus->id,
            "role" => "registrar",
            "name" => "Lutayan Campus",
            "password" => Hash::make("lutayan12345"),
            "email" => "lutayanreg@gmail.com",
        ]);

         $documents=Document::get();

    foreach ($documents as $document) {
        $campus->campus_documents()->attach($document);
    }

    }
}