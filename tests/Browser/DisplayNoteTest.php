<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DisplayNoteTest extends DuskTestCase
{
    /**
     * @group display-note
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
            ->assertSee('Enterprise')
            ->clickLink('Log in')
            ->assertPathIs('/login')
            ->type('email', 'nuel@example.com') // Unique email
            ->type('password', 'password')
            ->press('LOG IN')
            ->assertPathIs('/dashboard')
            ->clickLink('Notes')
            ->assertPathIs('/notes')
            ->clickLink('PPL Note 1')
            ->assertPathIs('/note/8')
            ->screenshot('display-note-success');
        });
    }
}
