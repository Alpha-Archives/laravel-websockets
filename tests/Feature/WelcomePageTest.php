<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageTest extends TestCase
{
    /** @test */
    public function testWelcomePageExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
