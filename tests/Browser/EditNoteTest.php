<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNoteTest extends DuskTestCase
{
    /**
     * @group edit-note
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
            ->clickLink('Edit')
            ->assertPathIs('/edit-note-page/8')
            ->type('title', 'PPL Note 1')
            ->type('description', 'Mulai gampang')
            ->press('UPDATE')
            ->screenshot('edit-note-success');
        });
    }
}
