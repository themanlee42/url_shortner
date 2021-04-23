<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class UrlApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_can_create_and_get_url()
    {
        $data = [
            'url' => 'http://google.com'
        ];

        $this->json('POST', route('urls.store'), $data)
            ->assertStatus(201);

        $this->json('POST', route('urls.check'), $data)
            ->assertStatus(200);
    }

    public function test_cannot_create_and_cannot_get_url()
    {
        $data = [
            'url' => 'abadsfdsfasdfads'
        ];

        $this->json('POST', route('urls.store'), $data)
            ->assertStatus(422);

        $this->json('POST', route('urls.check'), $data)
            ->assertStatus(422);
    }

}
