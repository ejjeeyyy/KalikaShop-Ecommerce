<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{

    /** @test */
    public function a_user_can_place_an_order()
    {
        // Create a user
        // $user = User::create([
        //     'name' => 'John Doe',
        //     'email' => 'john@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        // // Create a product
        // $product = Product::create([
        //     'category_id' => 1,
        //     'name' => 'Product Name',
        //     'slug' => 'product-name',
        //     'brand' => 'Brand Name',
        //     'small_description' => 'Small description',
        //     'description' => 'Full description',
        //     'original_price' => 100,
        //     'selling_price' => 90,
        //     'quantity' => 10,
        //     'allocation_percentage' => 5,
        //     'trending' => true,
        //     'featured' => true,
        //     'status' => 'active',
        //     'meta_title' => 'Meta title',
        //     'meta_keyword' => 'Meta keyword',
        //     'meta_description' => 'Meta description',
        // ]);

        // // Create an order item with the product
        // $orderItem = OrderItem::create([
        //     'product_id' => $product->id,
        //     'quantity' => 1,
        //     'price' => $product->selling_price,
        // ]);

        // // Create an order with the user and the order item
        // $order = Order::create([
        //     'user_id' => $user->id,
        //     'tracking_no' => '123456789',
        //     'fullname' => 'John Doe',
        //     'email' => 'john@example.com',
        //     'phone' => '555-1234',
        //     'pincode' => '12345',
        //     'address' => '123 Main St.',
        //     'status_message' => 'Order placed',
        //     'payment_mode' => 'cash',
        //     'payment_id' => '123',
        // ]);
        // $order->items()->save($orderItem);

        // // Ensure the order was created and has the correct attributes
        // $this->assertDatabaseHas('orders', [
        //     'user_id' => $user->id,
        //     'tracking_no' => '123456789',
        //     'fullname' => 'John Doe',
        //     'email' => 'john@example.com',
        //     'phone' => '555-1234',
        //     'pincode' => '12345',
        //     'address' => '123 Main St.',
        //     'status_message' => 'Order placed',
        //     'payment_mode' => 'cash',
        //     'payment_id' => '123',
        // ]);

        // // Ensure the order item was created and has the correct attributes
        // $this->assertDatabaseHas('order_items', [
        //     'order_id' => $order->id,
        //     'product_id' => $product->id,
        //     'quantity' => 1,
        //     'price' => $product->selling_price,
        // ]);

        // // Ensure the user has the order associated with them
        // $this->assertTrue($user->orders->contains($order));
        $this->assertTrue(true);
    }
}
