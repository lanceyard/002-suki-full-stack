<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\Contoh\WordCount;
use Tests\TestCase;

class ExampleTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function test_the_application_returns_a_successful_response()
  {
    $response = $this->get('/');

    $response->assertStatus(200);
  }

  public function test_wordCount_bisa_apa_nggak()
  {
    $wc = new WordCount();
    $cobaTest = $wc->countWords('cobalah hentikan langit kau coba lagi');
    $this->assertEquals(6, $cobaTest);
  }
}
