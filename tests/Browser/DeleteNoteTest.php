<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNoteTest extends DuskTestCase
{
    /**
     * @group delete-note
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
            ->assertSee('PPL Note 1')
            ->press('Delete')
            ->pause(2500)
            ->assertDontSee('PPL Note 1')
            ->screenshot('delete-note-success');
        });
    }
}
