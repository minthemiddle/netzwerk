<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /** @test */
    public function guest_can_see_landing_page()
    {
        $response = $this->get(route('index'));
        $response->assertSuccessful();
        $response->assertSee('Landing Page');
    }
}
