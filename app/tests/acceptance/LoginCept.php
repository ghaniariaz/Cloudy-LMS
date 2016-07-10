<?php
$I = new WebGuy($scenario);

$I->wantTo('login as a user');

$I->amGoingTo('Login');
$I->amOnPage('/cloudy/public/login');
$I->see('Login to your account');
$I->haveInDatabase('users', array(
	'name' 		=> 'Jawad', 
	'suspended' => false, 
	'dob' 		=> '8-2-1980', 
	'email' 	=> 'jawad@gmail.com', 
	'username' 	=> 'asdqweasd12312546', 
	'password' 	=> 'asd123', 
	'type' 		=> 'student', 
	'school_id' => 1));
$I->fillField('username','asdqweasd12312546');
$I->fillField('password','asd123');
$I->click('Login');
$I->seeInCurrentUrl('/cloudy/public/portal');
