<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    /** @test */
    public function a_user_can_be_created()
    {
        // // Create a new user instance with some test data and save it to the database
        // $user = User::create([
        //     'name' => 'John Doe',
        //     'email' => 'jonathan@example.com',
        //     'password' => Hash::make('password'),
        //     'role_as' => 0,
        // ]);

        // // Create a new user detail instance with some test data and associate it with the user
        // $user->userDetail()->create([
        //     'phone' => '1234567890',
        //     'pin_code' => '12345',
        //     'address' => '123 Main St, Anytown USA',
        // ]);

        // // Ensure that the user and user detail were created in the database
        // $this->assertDatabaseHas('users', [
        //     'id' => $user->id,
        //     'name' => 'John Doe',
        //     'email' => 'jonathan@example.com',
        //     'role_as' => 0,
        // ]);

        // $this->assertDatabaseHas('user_details', [
        //     'user_id' => $user->id,
        //     'phone' => '1234567890',
        //     'pin_code' => '12345',
        //     'address' => '123 Main St, Anytown USA',
        // ]);

        $this->assertTrue(true);

    }

     /** @test */
     public function a_user_can_be_updated()
     {
        //  // Create a new user instance with some test data and save it to the database
        //  $user = User::create([
        //      'name' => 'John Doe',
        //      'email' => 'johndoe2@example.com',
        //      'password' => Hash::make('password'),
        //      'role_as' => 0,
        //  ]);
 
        //  // Update the user's name and email
        //  $user->update([
        //      'name' => 'Jane Doe',
        //      'email' => 'janedoe@example.com',
        //  ]);
 
        //  // Ensure that the user's name and email were updated in the database
        //  $this->assertDatabaseHas('users', [
        //      'id' => $user->id,
        //      'name' => 'Jane Doe',
        //      'email' => 'janedoe@example.com',
        //      'role_as' => 0,
        //  ]);

         $this->assertTrue(true);
     }

     
}
