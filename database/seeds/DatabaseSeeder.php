<?php

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
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(RepresentativeSeeder::class);       

    }
}
