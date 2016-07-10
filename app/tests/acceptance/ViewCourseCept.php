<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View Course');
$I->amgoingto('View Course');
$I->amOnPage('/cloudy/public/portal');
$I->see('Second Grade Science');