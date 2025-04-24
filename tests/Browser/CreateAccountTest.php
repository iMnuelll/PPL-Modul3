<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateAccountTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Modul 3')
                    ->clickLink('Register')
                    ->assertPathIs('/register')
                    ->screenshot('register-form')
                    ->type('name', 'Test User')
                    ->type('email', 'testuser'.time().'@example.com') // Unique email
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('button[type="submit"]')
                    ->assertPathIs('/dashboard')
                    ->screenshot('registration-success');
        });
    }
}
