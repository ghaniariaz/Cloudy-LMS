<?php
$I = new WebGuy($scenario);

$I->wantTo('View Welcome Page');
$I->amgoingto('View View Welcome Page');
$I->amOnPage('/cloudy/public/');
$I->see('Welcome to Cloud LMS..');
$I->see('Get Started');
$I->see('Login');