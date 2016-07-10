<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','naila');
$I->fillField('password','asd123');
$I->click('Login');
$I->wantTo('Delete Attendace');
$I->amgoingto('Delete Attendace');
$I->amOnPage('/cloudy/public/portal/courses/4/attendance');
$I->see('Delete');
$I->click('Delete');
//$I->click('Delete');
//$I->seeInCurrentUrl('cloudy/public/portal/attendance/10/edit');
//$I->see('Attendance');