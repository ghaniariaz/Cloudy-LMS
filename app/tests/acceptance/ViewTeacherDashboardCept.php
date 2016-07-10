<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','naila');
$I->fillField('password','asd123');
$I->click('Login');
$I->wantTo('View Teacher Dashboard');
$I->amgoingto('View Teacher Dashboard');
$I->amOnPage('/cloudy/public/portal-teacher');
$I->see('Welcome, Naila Abidi');
$I->see('Teacher Dashboard');