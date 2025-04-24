<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateAccountTest extends DuskTestCase
{
    // use DatabaseMigrations;
    /**
     * @group register
     * Test register functionality
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Enterprise')
                    ->clickLink('Register')
                    ->assertPathIs('/register')
                    ->type('name', 'nuel')
                    ->type('email', 'nuel@example.com') // Unique email
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard')
                    ->screenshot('registration-success')
                    ->click('#click-dropdown')
                    ->clickLink('Log Out')
                    ->assertSee('Enterprise')
                    ->screenshot('final-registration');
        });
    }
}
