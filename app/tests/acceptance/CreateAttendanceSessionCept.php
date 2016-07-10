<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','naila');
$I->fillField('password','asd123');
$I->click('Login');
$I->wantTo('Create Attendance Session');
$I->amgoingto('Create Attendance Session');
$I->amOnPage('/cloudy/public/portal/courses/4/attendance');
$I->see('Create Attendance Session');
$I->fillField('starttime','03:10 PM');
$I->fillField('endtime', '03:50 PM');
$I->click('Create');
$I->see('15:10 PM');