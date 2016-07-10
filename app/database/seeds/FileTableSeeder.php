<?php

class FileTableSeeder extends Seeder {

    public function run()
    {
        DB::table('files')->delete();

        Sfile::create(array('filepath' => 'lecture1.pdf'));
        Sfile::create(array('filepath' => 'lecture2.pdf'));
        Sfile::create(array('filepath' => 'lecture3.pdf'));
        Sfile::create(array('filepath' => 'chap1.ppt'));
        Sfile::create(array('filepath' => 'chap2.ppt'));
        Sfile::create(array('filepath' => 'chap3.ppt'));
        Sfile::create(array('filepath' => 'chap4.ppt'));
        Sfile::create(array('filepath' => 'worksheet.pdf'));
        Sfile::create(array('filepath' => 'quiz1_paper.pdf'));
        Sfile::create(array('filepath' => 'explore.ppt'));
        Sfile::create(array('filepath' => 'humans.ppt'));
        Sfile::create(array('filepath' => 'fear.ppt'));
        Sfile::create(array('filepath' => 'moday_lecture.ppt'));
        Sfile::create(array('filepath' => 'meow.ppt'));
        Sfile::create(array('filepath' => 'chap11.ppt'));
    }

}