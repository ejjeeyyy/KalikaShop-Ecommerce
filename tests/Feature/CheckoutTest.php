<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckoutTest extends TestCase
{
    
    /**
     * Test if a cart can be checked out using the PayPal API.
     *
     * @return void
     */
    public function testCartItemsCanBeCheckedOutWithPaypal()
    {
    
        $user = new User([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $cart = [
            'id' => 1,
            'items' => [
                ['name' => 'Product A', 'price' => 10.00, 'quantity' => 2],
                ['name' => 'Product B', 'price' => 15.00, 'quantity' => 1],
            ],
            'total' => 35.00,
        ];

        //PayPal API response
        Http::send([
            'https://api.paypal.com/*' => Http::response(['status' => 'success'], 200),
        ]);

        // Send a request to checkout the cart using PayPal
        $response = $this->actingAs($user)->post('/checkout/paypal', [
            'cart_id' => $cart['id'],
            'amount' => $cart['total'],
        ]);

        // Assert that the response is successful
        $response->assertStatus(200);
        $response->assertJson(['status' => 'success']);

    }
}
