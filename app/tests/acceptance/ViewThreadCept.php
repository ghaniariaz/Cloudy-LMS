<?php
$I = new WebGuy($scenario);

$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->fillField('username','fahey.charles');
$I->fillField('password','dolor');
$I->click('Login');
$I->wantTo('View a thread');
$I->amgoingto('click on a thread');
$I->amOnPage('/cloudy/public/portal/lectures/17');
$I->see('Autem debitis rem eius doloremque aut.');
$I->click('Excepturi recusandae numquam aliquid voluptas sapiente at sint.');
$I->seeInCurrentUrl('/cloudy/public/portal/threads/33');
