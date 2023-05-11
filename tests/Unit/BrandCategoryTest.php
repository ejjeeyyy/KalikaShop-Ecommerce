<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Category;
use Tests\TestCase;

class BrandCategoryTest extends TestCase
{
    //use RefreshDatabase;

    public function testCanCreateCategory()
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

        // Test that the category was created
        $this->assertDatabaseHas('categories', $categoryData);
    }

    public function testCanUpdateCategory()
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

    // Update the category
    $category->name = 'New Test Category';
    $category->save();

    // Test that the category was updated
    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'New Test Category',
    ]);
}

public function testCanDeleteCategory()
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

    // Delete the category
    $category->delete();

    // Test that the category was deleted
    $this->assertDatabaseMissing('categories', [
        'id' => $category->id,
    ]);
}


    public function testCanCreateBrand()
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

        // Test that the brand was created
        $this->assertDatabaseHas('brands', $brandData);
    }

    public function testBrandBelongsToCategory()
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

        // Test that the brand belongs to the category
        $this->assertInstanceOf(Category::class, $brand->category);
        $this->assertEquals($category->id, $brand->category->id);
    }

    public function testCanUpdateBrand()
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

        // Update the brand
        $newBrandData = [
            'name' => 'New Test Brand Name',
            'slug' => 'new-test-brand',
            'status' => 0,
            'category_id' => $category->id,
        ];
        $brand->update($newBrandData);

        // Test that the brand was updated
        $this->assertDatabaseHas('brands', $newBrandData);
        $this->assertDatabaseMissing('brands', $brandData);
    }

    public function testCanDeleteBrand()
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

        // Delete the brand
        $brand->delete();

        // Test that the brand was deleted
        $this->assertDatabaseMissing('brands', $brandData);
    }

}
