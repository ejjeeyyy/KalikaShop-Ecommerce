<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Blog;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    // use RefreshDatabase;
    /** @test */
    public function a_blog_can_be_created()
    {
        // Create a new blog instance with some test data
        $blog = new Blog([
            'title' => 'Test Blog',
            'category' => 'Technology',
            'description' => 'This is a test blog post',
            'image' => 'test.jpg',
        ]);

        // Save the blog to the database
        $blog->save();

        // Ensure that the blog was saved to the database
        $this->assertDatabaseHas('blogs', [
            'title' => 'Test Blog',
            'category' => 'Technology',
            'description' => 'This is a test blog post',
            'image' => 'test.jpg',
        ]);
    }

     /** @test */
    public function a_blog_can_be_updated()
    {
       
        // Create a new blog instance with some test data and save it to the database
        $blog = Blog::create([
            'title' => 'Test Blog',
            'category' => 'Technology',
            'description' => 'This is a test blog post',
            'image' => 'test.jpg',
        ]);

        // Update the blog with new data
        $blog->update([
            'title' => 'Updated Test Blog',
            'category' => 'Sports',
            'description' => 'This is an updated test blog post',
            'image' => 'updated_test.jpg',
        ]);

        // Ensure that the blog was updated in the database
        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'title' => 'Updated Test Blog',
            'category' => 'Sports',
            'description' => 'This is an updated test blog post',
            'image' => 'updated_test.jpg',
        ]);
    }

     /** @test */
    public function a_blog_can_be_deleted()
    {
        // Create a new blog instance with some test data and save it to the database
        $blog = Blog::create([
            'title' => 'Test Blog',
            'category' => 'Technology',
            'description' => 'This is a test blog post',
            'image' => 'test.jpg',
        ]);

        // Delete the blog from the database
        $blog->delete();

        // Ensure that the blog was deleted from the database
        $this->assertDatabaseMissing('blogs', [
            'id' => $blog->id,
        ]);
    }

    
}

