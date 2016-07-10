<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View Attendace');
$I->amgoingto('View Attendace');
$I->amOnPage('/cloudy/public/portal/attendance');
$I->see('Attendance');
