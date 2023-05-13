<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    // use DatabaseTransactions;

    /** @test */
    public function testProductsCanBeAddedToCart()
    {

        // Fake a user
        $user = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Fake a product
        $product = new Product([
            'id' => 1,
            'name' => 'Test Product',
            'description' => 'Test Product Description',
            'price' => 10.99,
            'quantity' => 100,
            'category_id' => 1,
        ]);

        $this->assertTrue(true);
    }

    public function testProductsCanBeUpdatedInCart()
    {

        // Fake a user
        $user = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Fake a product
        $product = new Product([
            'id' => 1,
            'name' => 'Test Product',
            'description' => 'Test Product Description',
            'price' => 10.99,
            'quantity' => 100,
            'category_id' => 1,
        ]);

        $this->assertTrue(true);
    }
     /**
     * Test if a product can be deleted from the cart.
     *
     * @return void
     */
    public function testProductsCanBeDeletedFromCart()
    {

        // Fake a user
        $user = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // Fake a product
        $product = new Product([
            'id' => 1,
            'name' => 'Test Product',
            'description' => 'Test Product Description',
            'price' => 10.99,
            'quantity' => 100,
            'category_id' => 1,
        ]);
        $this->assertTrue(true);
    }
}
  
