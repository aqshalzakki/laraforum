<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiscussionsTest extends TestCase
{
    /** @test */
    public function assert_ok()
    {
        $response = $this->get('/');

        $response->assertOk();
    }
}
