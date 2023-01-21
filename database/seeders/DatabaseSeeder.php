<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use App\Models\Student;
use App\Models\Cource;
use App\Models\Registration;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    *
    * @return void
    */
    public function run()
    {
        $profile_programer = Profile::create(['name' => 'Programer']);
        $profile_database = Profile::create(['name' => 'Database']);
        
        $students_data = [
            [
                'first_name' => 'Jhon',
                'last_name' => 'Cespedes',
                'profile_id' => $profile_database->id,
            ],
            [
                'first_name' => 'Juan',
                'last_name' => 'Medina',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'Pedro',
                'last_name' => 'Quispe',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'Sadith',
                'last_name' => 'Ramos',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'Renzo',
                'last_name' => 'Zavala',
                'profile_id' => $profile_database->id,
            ],
            [
                'first_name' => 'Diana',
                'last_name' => 'Guzmán',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'Benjamín',
                'last_name' => 'Choque',
                'profile_id' => $profile_database->id,
            ],
            [
                'first_name' => 'Alonso',
                'last_name' => 'Paredes',
                'profile_id' => $profile_database->id,
            ],
            [
                'first_name' => 'Araceli',
                'last_name' => 'Chacon',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'Angel',
                'last_name' => 'Mamani',
                'profile_id' => $profile_programer->id,
            ],
            [
                'first_name' => 'José',
                'last_name' => 'Quintana',
                'profile_id' => $profile_database->id,
            ],
        ];
        
        $students = [];
        
        foreach ($students_data as $student) {
            $students[] = Student::create($student);
        }
        
        $cource_php = Cource::create([
            'name' => 'PHP',
            'profile_id' => $profile_programer->id,
        ]);
        
        $cource_python = Cource::create([
            'name' => 'Python',
            'profile_id' => $profile_programer->id,
        ]);
        
        $cource_javascript = Cource::create([
            'name' => 'Javascipt',
            'profile_id' => $profile_programer->id,
        ]);
        
        $cource_laravel = Cource::create([
            'name' => 'Laravel',
            'profile_id' => $profile_programer->id,
        ]);
        
        $cource_sqlserver = Cource::create([
            'name' => 'SQL Server',
            'profile_id' => $profile_database->id,
        ]);
        
        $cource_mysql =  Cource::create([
            'name' => 'Mysql',
            'profile_id' => $profile_database->id,
        ]);
        
        $cource_mongodb =  Cource::create([
            'name' => 'MongoDB',
            'profile_id' => $profile_database->id,
        ]);
        
        
        Registration::create([
            'student_id' => 2,
            'cource_id' => 1,
            'score' => 14,
            'attempts' => 1,
            'approval_date' => date("Y-m-d H:i:s"),
        ]);

        Registration::create([
            'student_id' => 2,
            'cource_id' => 2,
            'score' => 17,
            'attempts' => 1,
            'approval_date' => date("Y-m-d H:i:s"),
        ]);
        
        
        Registration::create([
            'student_id' => 3,
            'cource_id' => 1,
            'score' => 16,
            'attempts' => 2,
            'approval_date' => date("Y-m-d H:i:s"),
        ]);
    }
}
