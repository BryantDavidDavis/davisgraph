<?php

class ExampleTest extends TestCase {
	
	public function setUp() {
		parent::setUp();
		
		Artisan::call('migrate');
	}
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	  
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function test_fetches_password_users() {
		Eloquent::unguard();
		User::create(['username' => 'Ted', 'password' => '123', 'email' => 'ted@example.com']);
		User::create(['username' => 'George', 'password' => '456', 'email' => 'george@exmple.com']);
		
		$users = User::goodpassword()->get();
		
		$this->assertCount(2, $users);
	}

}
