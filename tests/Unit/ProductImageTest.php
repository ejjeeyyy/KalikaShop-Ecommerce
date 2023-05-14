<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductImageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testProductImageCreate()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create a fake image file
        $file = UploadedFile::fake()->image('test.jpg');

        // Make a POST request to create a new product image
        $response = $this->postJson("/api/products/{$product->id}/images", [
            'image' => $file,
        ]);

        // Check if the product image is created
        $response->assertStatus(201);
        $this->assertDatabaseHas('product_images', [
            'product_id' => $product->id,
            'image' => $file->hashName(),
        ]);

        // Check if the image file is stored in the disk
        Storage::disk('public')->assertExists("product_images/{$file->hashName()}");
    }

    public function testProductImageUpdate()
    {
        // Create a product and a product image
        $product = Product::factory()->create();
        $productImage = ProductImage::factory()->create([
            'product_id' => $product->id,
        ]);

        // Create a fake image file
        $newFile = UploadedFile::fake()->image('new_test.jpg');

        // Make a PUT request to update the product image
        $response = $this->putJson("/api/products/{$product->id}/images/{$productImage->id}", [
            'image' => $newFile,
        ]);

        // Check if the product image is updated
        $response->assertStatus(200);
        $this->assertDatabaseHas('product_images', [
            'id' => $productImage->id,
            'product_id' => $product->id,
            'image' => $newFile->hashName(),
        ]);

        // Check if the old image file is deleted and the new image file is stored in the disk
        Storage::disk('public')->assertMissing("product_images/{$productImage->image}");
        Storage::disk('public')->assertExists("product_images/{$newFile->hashName()}");
    }

    public function testProductImageDelete()
    {
        // Create a product and a product image
        $product = Product::factory()->create();
        $productImage = ProductImage::factory()->create([
            'product_id' => $product->id,
        ]);

        // Make a DELETE request to delete the product image
        $response = $this->delete("/api/products/{$product->id}/images/{$productImage->id}");

        // Check if the product image is deleted
        $response->assertStatus(204);
        $this->assertDeleted($productImage);

        // Check if the image file is deleted from the disk
        Storage::disk('public')->assertMissing("product_images/{$productImage->image}");
    }
    }
