<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View Lecture');
$I->amgoingto('View Lecture');
$I->amOnPage('/cloudy/public/portal/courses/6');
$I->see('Lectures');
