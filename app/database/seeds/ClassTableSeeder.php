<?php

class ClassTableSeeder extends Seeder {

    public function run()
    {
        DB::table('classes')->delete();

        $sections = Section::get();
        $classtypes = ClassType::get();
        $teachers = User::where('type', '=', 'teacher')->get();

        Sclass::create(array('classtype_id' => $classtypes[0]->id, 'section_id' => $sections[0]->id, 'classteacher_id' => $teachers[0]->id));
        Sclass::create(array('classtype_id' => $classtypes[0]->id, 'section_id' => $sections[1]->id, 'classteacher_id' => $teachers[1]->id));
        Sclass::create(array('classtype_id' => $classtypes[1]->id, 'section_id' => $sections[2]->id, 'classteacher_id' => $teachers[1]->id));
        Sclass::create(array('classtype_id' => $classtypes[2]->id, 'section_id' => $sections[3]->id, 'classteacher_id' => $teachers[2]->id));
    }

}