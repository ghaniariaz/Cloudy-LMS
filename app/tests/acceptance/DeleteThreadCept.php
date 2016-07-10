<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','naila');
$I->fillField('password','asd123');
$I->click('Login');
$I->wantto('Delete thread');
$I->amgoingto('Delete a thread');
$I->amonpage('/cloudy/public/portal/threads/35');
$I->see('Options');
$I->see('Delete thread');
$I->click('Delete thread');
$I->seeInCurrentUrl('/cloudy/public/portal/lectures/28');
