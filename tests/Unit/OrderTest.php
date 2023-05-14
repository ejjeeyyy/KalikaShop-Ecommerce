<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\ProductColor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{
    /**
     * Test if an order can be created
     *
     * @return void
     */
    public function testCanCreateOrder()
    {
        $order = Order::create([
            'user_id' => 1,
            'tracking_no' => 'ABC123',
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'pincode' => '12345',
            'address' => '123 Main St',
            'status_message' => 'Order created',
            'payment_mode' => 'Credit Card',
            'payment_id' => '123456'
        ]);

        $this->assertInstanceOf(Order::class, $order);
        $this->assertEquals('ABC123', $order->tracking_no);
        $this->assertEquals('John Doe', $order->fullname);
        $this->assertEquals('johndoe@example.com', $order->email);
        $this->assertEquals('1234567890', $order->phone);
        $this->assertEquals('12345', $order->pincode);
        $this->assertEquals('123 Main St', $order->address);
        $this->assertEquals('Order created', $order->status_message);
        $this->assertEquals('Credit Card', $order->payment_mode);
        $this->assertEquals('123456', $order->payment_id);
    }
 
    public function testCanUpdateOrder()
    {
        $order = Order::create([
            'user_id' => 1,
            'tracking_no' => 'ABC123',
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'pincode' => '12345',
            'address' => '123 Main St',
            'status_message' => 'Order created',
            'payment_mode' => 'Credit Card',
            'payment_id' => '123456'
        ]);

        $order->update([
            'status_message' => 'Order updated',
            'payment_mode' => 'Debit Card'
        ]);

        $this->assertEquals('Order updated', $order->status_message);
        $this->assertEquals('Debit Card', $order->payment_mode);
        }

    public function testCanDeleteOrder()
    {
        $order = Order::create([
            'user_id' => 1,
            'tracking_no' => 'ABC123',
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'pincode' => '12345',
            'address' => '123 Main St',
            'status_message' => 'Order created',
            'payment_mode' => 'Credit Card',
            'payment_id' => '123456'
        ]);

        $order->delete();

        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
        }

    public function testCreateOrderItem()
    {
        $product = Product::create([
            'name' => 'Product 1',
            'description' => 'Description for product 1',
            'price' => 9.99
        ]);

        $productColor = ProductColor::create([
            'name' => 'Red',
            'color' => '#FF0000',
            'product_id' => $product->id
        ]);

        $order = Order::create([
            'user_id' => 1,
            'tracking_no' => 'ABC123',
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'pincode' => '12345',
            'address' => '123 Main St',
            'status_message' => 'Order created',
            'payment_mode' => 'Credit Card',
            'payment_id' => '123456'
        ]);

        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_color_id' => $productColor->id,
            'quantity' => 2,
            'allocation_percentage' => 50,
            'price' => 19.98
        ]);

        $this->assertEquals($order->id, $orderItem->order_id);
        $this->assertEquals($product->id, $orderItem->product_id);
        $this->assertEquals($productColor->id, $orderItem->product_color_id);
        $this->assertEquals(2, $orderItem->quantity);
        $this->assertEquals(50, $orderItem->allocation_percentage);
        $this->assertEquals(19.98, $orderItem->price);
    }

    public function testUpdateOrderItem()
    {
        $product = Product::create([
            'name' => 'Product 1',
            'description' => 'Description for product 1',
            'price' => 9.99
        ]);

        $productColor = ProductColor::create([
            'name' => 'Red',
            'color' => '#FF0000',
            'product_id' => $product->id
        ]);

        $order = Order::create([
            'user_id' => 1,
            'tracking_no' => 'ABC123',
            'fullname' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'pincode' => '12345',
            'address' => '123 Main St',
            'status_message' => 'Order created',
            'payment_mode' => 'Credit Card',
            'payment_id' => '123456'
        ]);

        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'product_color_id' => $productColor->id,
            'quantity' => 2,
            'allocation_percentage' => 50,
            'price' => 19.98
        ]);

        // Update order item
        $orderItem->quantity = 3;
        $orderItem->allocation_percentage = 75;
        $orderItem->save();

        $this->assertEquals(3, $orderItem->fresh()->quantity);
        $this->assertEquals(75, $orderItem->fresh()->allocation_percentage);
        }

    public function testOrderItemDelete()
    {
        // Create an order
        $order = Order::factory()->create();

        // Create an order item
        $orderItem = OrderItem::factory()->create([
            'order_id' => $order->id,
        ]);

        // Delete the order item
        $response = $this->delete("/api/order-items/{$orderItem->id}");

        // Check if the order item is deleted
        $response->assertStatus(204);
        $this->assertDeleted($orderItem);
        }
}


