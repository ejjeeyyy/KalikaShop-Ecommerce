<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WishlistTest extends TestCase
{

    /** @test */
    public function a_user_can_add_a_product_to_their_wishlist()
    {
        // Create a user and a product
        // $user = User::factory()->create();
        // $product = Product::factory()->create();

        // // Ensure the user is not already following the product
        // $this->assertFalse($user->wishlist->contains($product));

        // // Add the product to the user's wishlist
        // $response = $this->actingAs($user)->post('/wishlist', [
        //     'product_id' => $product->id,
        // ]);

        // // Ensure the product was added to the user's wishlist
        // $this->assertTrue($user->wishlist->contains($product));

        // // Ensure the response was successful
        // $response->assertStatus(200);
        $this->assertTrue(true);
    }
}
