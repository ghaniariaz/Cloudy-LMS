<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View Student Dashboard');
$I->amgoingto('View Student Dashboard');
$I->amOnPage('/cloudy/public/portal');
$I->see('Welcome, Maximo Mayer');
$I->see('Student Dashboard');