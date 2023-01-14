<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_route_returns_ok()
    {
        $response = $this->get('/products');

        $response->assertSee('Products index');

        $response->assertStatus(200);
    }

    public function test_product_has_name()
    {
        $product = Product::factory()->create();

        $this->assertNotEmpty($product->name);
    }

    public function test_products_are_not_empty()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products');
        $response->assertSee($product->name);
    }
}
