<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslatorControllerTest extends TestCase
{
    /**
     * Test default target translation.
     *
     * @test
     *
     * @return void
     */
    public function itShouldTranslateHello()
    {
        $response = $this->get('/api/translate/hello');

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'translation' => 'こんにちは',
            ]);
    }

    /**
     * Test given target translation.
     *
     * @test
     *
     * @return void
     */
    public function itShouldTranslateHelloInFrench()
    {
        $response = $this->get('/api/translate/hello/fr');

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'translation' => 'Bonjour',
            ]);
    }
}
