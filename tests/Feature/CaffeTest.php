<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CaffeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_kategori()
    {
        $response = $this->get('/kategori');

        $response->assertStatus(302);
    }

    public function test_menu()
    {
        $response = $this->get('/menu');

        $response->assertStatus(302);
    }

    public function test_user()
    {
        $response = $this->get('/user');

        $response->assertStatus(302);
    }
}
