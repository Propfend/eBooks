<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;

class FavControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_if_favorite_list_is_empty(): void
    {
        $itens = \Cart::getContent();
        $itens[] = 'Bíblia';
        $this->assertEmpty($itens);
    }
}