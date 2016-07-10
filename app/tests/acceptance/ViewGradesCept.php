<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View Grades');
$I->amgoingto('View Grades');
$I->amOnPage('/cloudy/public/portal');
$I->see('Recent Grades');
$I->click('Second Grade Music');
$I->seeInCurrentUrl('/cloudy/public/portal/courses/11/grades');
$I->see('Grades');