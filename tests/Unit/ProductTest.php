<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductColor;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    //use RefreshDatabase;

    public function testCanCreateProduct()
    {
        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'description' => 'Test category description',
            'image' => 'test-category.jpg',
            'meta_title' => 'Test Category',
            'meta_keyword' => 'Test, Category',
            'meta_description' => 'Test category meta description',
            'status' => 0,
        ]);

        // Create a brand
        $brand = Brand::create([
            'name' => 'Test Brand',
            'slug' => 'test-brand',
            'status' => 0,
            'category_id' => $category->id,
        ]);

        // Create a product
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Test Product',
            'slug' => 'test-product',
            'brand' => $brand->name,
            'small_description' => 'Test product small description',
            'description' => 'Test product description',
            'original_price' => 1000,
            'selling_price' => 800,
            'quantity' => 10,
            'allocation_percentage' => 50,
            'trending' => 0,
            'featured' => 0,
            'status' => 0,
            'meta_title' => 'Test Product',
            'meta_keyword' => 'Test, Product',
            'meta_description' => 'Test product meta description',
        ]);

        // Assert that the product was created successfully
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Test Product',
            'slug' => 'test-product',
            'brand' => 'Test Brand',
            'small_description' => 'Test product small description',
            'description' => 'Test product description',
            'original_price' => 1000,
            'selling_price' => 800,
            'quantity' => 10,
            'allocation_percentage' => 50,
            'trending' => 0,
            'featured' => 0,
            'status' => 0,
            'meta_title' => 'Test Product',
            'meta_keyword' => 'Test, Product',
            'meta_description' => 'Test product meta description',
        ]);
    }

    public function testCanUpdateProduct()
    {
        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'description' => 'Test category description',
            'image' => 'test-category.jpg',
            'meta_title' => 'Test Category',
            'meta_keyword' => 'Test, Category',
            'meta_description' => 'Test category meta description',
            'status' => 0,
        ]);

        // Create a brand
        $brand = Brand::create([
            'name' => 'Test Brand',
            'slug' => 'test-brand',
            'status' => 0,
            'category_id' => $category->id,
        ]);

        // Create a product
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Test Product',
            'slug' => 'test-product',
            'brand' => $brand->name,
            'small_description' => 'Test product small description',
            'description' => 'Test product description',
            'original_price' => 1000,
            'selling_price' => 800,
            'quantity' => 10,
            'allocation_percentage' => 50,
            'trending' => true,
            'featured' => true,
            'status' => 0,
            'meta_title' => 'Test Product',
            'meta_keyword' => 'Test, Product',
            'meta_description' => 'Test product meta description',
        ]);

        // Update the product
        $product->name = 'New Product Name';
        $product->selling_price = 900;
        $product->save();

        // Assert that the product was updated successfully
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'New Product Name',
            'selling_price' => 900,
        ]);
    }

    public function testCanDeleteProduct()
{
    // Create a category
    $category = Category::create([
        'name' => 'Test Category',
        'slug' => 'test-category',
        'description' => 'Test category description',
        'image' => 'test-category.jpg',
        'meta_title' => 'Test Category',
        'meta_keyword' => 'Test, Category',
        'meta_description' => 'Test category meta description',
        'status' => 0,
    ]);

    // Create a brand
    $brand = Brand::create([
        'name' => 'Test Brand',
        'slug' => 'test-brand',
        'status' => 0,
        'category_id' => $category->id,
    ]);

    // Create a product
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Test Product',
        'slug' => 'test-product',
        'brand' => $brand->name,
        'small_description' => 'Test product small description',
        'description' => 'Test product description',
        'original_price' => 1000,
        'selling_price' => 800,
        'quantity' => 10,
        'allocation_percentage' => 50,
        'trending' => 0,
        'featured' => 0,
        'status' => 0,
        'meta_title' => 'Test Product',
        'meta_keyword' => 'Test, Product',
        'meta_description' => 'Test product meta description',
    ]);

    // Delete the product
    $product->delete();

    // Assert that the product was deleted successfully
    $this->assertDatabaseMissing('products', [
        'id' => $product->id,
    ]);
}


    public function testColorCanBeCreated()
    {
        // Create a color
        $color = Color::create([
            'name' => 'Test Color',
            'code' => '#FF0000',
            'status' => 0,
        ]);

        // Test that the color was created
        $this->assertDatabaseHas('colors', [
            'id' => $color->id,
            'name' => 'Test Color',
            'code' => '#FF0000',
            'status' => 0,
        ]);
    }

    public function testColorCanBeUpdated()
    {
        // Create a color
        $color = Color::create([
            'name' => 'Test Color',
            'code' => '#FF0000',
            'status' => 0,
        ]);

        // Update the color's name and code
        $color->update([
            'name' => 'Updated Color',
            'code' => '#00FF00',
        ]);

        // Test that the color was updated
        $this->assertDatabaseHas('colors', [
            'id' => $color->id,
            'name' => 'Updated Color',
            'code' => '#00FF00',
        ]);
    }

    public function testColorCanBeDeleted()
    {
        // Create a color
        $color = Color::create([
            'name' => 'Test Color',
            'code' => '#FF0000',
            'status' => 0,
        ]);

        // Delete the color
        $color->delete();

        // Test that the color was deleted
        $this->assertDatabaseMissing('colors', [
            'id' => $color->id,
        ]);
    }

    public function testCanCreateProductColor()
    {
        // Create a category
        $category = Category::create([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'description' => 'Test description',
            'image' => 'test.png',
            'meta_title' => 'Test meta title',
            'meta_keyword' => 'Test meta keyword',
            'meta_description' => 'Test meta description',
            'status' => 1,
        ]);

        // Create a brand
        $brand = Brand::create([
            'name' => 'Test Brand',
            'slug' => 'test-brand',
            'status' => 1,
            'category_id' => $category->id,
        ]);

        // Create a product
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'Test Product',
            'slug' => 'test-product',
            'brand' => $brand->name,
            'small_description' => 'Test small description',
            'description' => 'Test description',
            'original_price' => 100.00,
            'selling_price' => 80.00,
            'quantity' => 10,
            'allocation_percentage' => 50,
            'trending' => 1,
            'featured' => 1,
            'status' => 1,
            'meta_title' => 'Test meta title',
            'meta_keyword' => 'Test meta keyword',
            'meta_description' => 'Test meta description',
        ]);

        // Create a color
        $color = Color::create([
            'name' => 'Test Color',
            'code' => '#ffffff',
            'status' => 1,
        ]);

        // Create a product color
        $productColorData = [
            'product_id' => $product->id,
            'color_id' => $color->id,
            'quantity' => 5,
        ];
        $productColor = ProductColor::create($productColorData);

        // Test that the product color was created
        $this->assertDatabaseHas('product_colors', $productColorData);
}

public function testCanUpdateProductColor()
{
    // Create a category
    $categoryData = [
        'name' => 'Test Category',
        'slug' => 'test-category',
        'description' => 'Test description',
        'image' => 'test.png',
        'meta_title' => 'Test meta title',
        'meta_keyword' => 'Test meta keyword',
        'meta_description' => 'Test meta description',
        'status' => 1,
    ];
    $category = Category::create($categoryData);

    // Create a brand with the category's ID
    $brandData = [
        'name' => 'Test Brand',
        'slug' => 'test-brand',
        'status' => 1,
        'category_id' => $category->id,
    ];
    $brand = Brand::create($brandData);

    // Create a product with the brand's ID
    $productData = [
        'category_id' => $category->id,
        'name' => 'Test Product',
        'slug' => 'test-product',
        'brand' => $brand->name,
        'small_description' => 'Test small description',
        'description' => 'Test description',
        'original_price' => 10.00,
        'selling_price' => 9.50,
        'quantity' => 100,
        'allocation_percentage' => 0.75,
        'trending' => 1,
        'featured' => 0,
        'status' => 1,
        'meta_title' => 'Test meta title',
        'meta_keyword' => 'Test meta keyword',
        'meta_description' => 'Test meta description',
    ];
    $product = Product::create($productData);

    // Create a color
    $colorData = [
        'name' => 'Test Color',
        'code' => '#000000',
        'status' => 1,
    ];
    $color = Color::create($colorData);

    // Create a product color with the product and color IDs
    $productColorData = [
        'product_id' => $product->id,
        'color_id' => $color->id,
        'quantity' => 10,
    ];
    $productColor = ProductColor::create($productColorData);

    // Update the quantity of the product color
    $newQuantity = 20;
    $productColor->update(['quantity' => $newQuantity]);

    // Test that the product color was updated
    $this->assertDatabaseHas('product_colors', [
        'id' => $productColor->id,
        'quantity' => $newQuantity,
    ]);
}

public function testCanDeleteProductColor()
{
    // Create a category
    $category = Category::create([
        'name' => 'Test Category',
        'slug' => 'test-category',
        'description' => 'Test description',
        'image' => 'test.png',
        'meta_title' => 'Test meta title',
        'meta_keyword' => 'Test meta keyword',
        'meta_description' => 'Test meta description',
        'status' => 1,
    ]);

    // Create a brand
    $brand = Brand::create([
        'name' => 'Test Brand',
        'slug' => 'test-brand',
        'status' => 1,
        'category_id' => $category->id,
    ]);

    // Create a product
    $product = Product::create([
        'category_id' => $category->id,
        'name' => 'Test Product',
        'slug' => 'test-product',
        'brand' => $brand->name,
        'small_description' => 'Test small description',
        'description' => 'Test description',
        'original_price' => 100.00,
        'selling_price' => 80.00,
        'quantity' => 10,
        'allocation_percentage' => 50,
        'trending' => 1,
        'featured' => 1,
        'status' => 1,
        'meta_title' => 'Test meta title',
        'meta_keyword' => 'Test meta keyword',
        'meta_description' => 'Test meta description',
    ]);

    // Create a color
    $color = Color::create([
        'name' => 'Test Color',
        'code' => '#ffffff',
        'status' => 1,
    ]);

    // Create a product color
    $productColor = ProductColor::create([
        'product_id' => $product->id,
        'color_id' => $color->id,
        'quantity' => 5,
    ]);

    // Delete the product color
    ProductColor::destroy($productColor->id);

    // Test that the product color was deleted
    $this->assertDatabaseMissing('product_colors', [
        'id' => $productColor->id,
    ]);
}


}
