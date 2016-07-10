<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('Create Message');
$I->amgoingto('Create Message');
$I->amOnPage('/cloudy/public/portal/threads/33');
$I->see('Excepturi recusandae numquam aliquid voluptas sapiente at sint.');
//$I->fillField('message','Hi this is umair');
$I->submitForm('.chat-form', array('message'=>'Helloooooo'));
//$I->seeInCurrentUrl('/cloudy/public/portal/threads/33');
$I->see('Helloooooo');
