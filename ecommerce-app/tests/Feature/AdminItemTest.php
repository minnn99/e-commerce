<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_product()
    {
        // Create admin user
        $admin = Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);

        // Login as admin
        $this->actingAs($admin, 'admin');

        // Test product creation
        $response = $this->post(route('admin.item.store'), [
            'name' => 'Test Product',
            'val' => 1000,
            'explanation' => 'This is a test product',
            'picture' => 'images/test.jpg',
            'genre' => 'Tシャツ'
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'val' => 1000,
            'explanation' => 'This is a test product',
            'picture' => 'images/test.jpg',
            'genre' => 'Tシャツ'
        ]);
    }
}