<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','naila');
$I->fillField('password','asd123');
$I->click('Login');
$I->wantTo('Edit Attendace');
$I->amgoingto('Edit Attendace');
$I->amOnPage('/cloudy/public/portal/courses/4/attendance');
$I->see('Edit');
$I->click('Edit');
$I->seeInCurrentUrl('cloudy/public/portal/attendance/10/edit');
$I->see('Attendance');