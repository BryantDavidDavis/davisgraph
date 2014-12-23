<?php
	
Class LoginTest extends TestCase {
	
	public function setup() {
		parent::setUp();
		
		Artisan::call('migrate');
		
	}
	
	public function test_displays_login_form() {
		$this->action('GET', 'SessionsController@create');
		$this->assertResponseOK();
		//$this->assertCount(1, $crawler->filter('body:contains("<form>")'));
	}
}