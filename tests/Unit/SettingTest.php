<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SettingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCanSettingCreate()
    {
        // Generate random data for website setting
        $data = [
            'website_name' => $this->faker->company,
            'website_url' => $this->faker->url,
            'page_title' => $this->faker->sentence,
            'meta_keyword' => $this->faker->words(5, true),
            'meta_description' => $this->faker->sentence,
            'address' => $this->faker->address,
            'phone1' => $this->faker->phoneNumber,
            'phone2' => $this->faker->phoneNumber,
            'email1' => $this->faker->email,
            'email2' => $this->faker->email,
            'facebook' => $this->faker->url,
            'twitter' => $this->faker->url,
            'instagram' => $this->faker->url,
            'youtube' => $this->faker->url,
        ];

        // Make a POST request to create the website setting
        $response = $this->post('/api/settings', $data);

        // Check if the website setting is created
        $response->assertStatus(201);
        $this->assertDatabaseHas('settings', $data);
    }

    public function testCanUpdateWebsiteSetting()
    {
        // Create a new website setting
        $websiteSetting = Setting::create([
            'website_name' => 'My Website',
            'website_url' => 'https://mywebsite.com',
            'page_title' => 'Welcome to My Website',
            'meta_keyword' => 'my website, welcome, products',
            'meta_description' => 'Welcome to my website, where you can find a wide range of products',
            'address' => '123 Main Street, Anytown USA',
            'phone1' => '555-1234',
            'phone2' => '555-5678',
            'email1' => 'info@mywebsite.com',
            'email2' => 'sales@mywebsite.com',
            'facebook' => 'https://www.facebook.com/mywebsite',
            'twitter' => 'https://www.twitter.com/mywebsite',
            'instagram' => 'https://www.instagram.com/mywebsite',
            'youtube' => 'https://www.youtube.com/mywebsite',
        ]);

        // Update the website setting
        $updatedWebsiteSetting = [
            'website_name' => 'My New Website',
            'website_url' => 'https://mynewwebsite.com',
            'page_title' => 'Welcome to My New Website',
            'meta_keyword' => 'my new website, welcome, products',
            'meta_description' => 'Welcome to my new website, where you can find a wide range of products',
            'address' => '456 Oak Street, Anytown USA',
            'phone1' => '555-1111',
            'phone2' => '555-2222',
            'email1' => 'info@mynewwebsite.com',
            'email2' => 'sales@mynewwebsite.com',
            'facebook' => 'https://www.facebook.com/mynewwebsite',
            'twitter' => 'https://www.twitter.com/mynewwebsite',
            'instagram' => 'https://www.instagram.com/mynewwebsite',
            'youtube' => 'https://www.youtube.com/mynewwebsite',
        ];

        $response = $this->put('/settings/' . $websiteSetting->id, $updatedWebsiteSetting);

        $response->assertStatus(200);

        // Verify that the website setting was updated
        $this->assertDatabaseHas('settings', $updatedWebsiteSetting);
    }


}
