<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laracasts');
        });
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel News');
        });
    }
}
