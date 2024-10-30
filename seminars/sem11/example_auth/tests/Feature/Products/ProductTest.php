<?php

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->artisan('db:seed');
});

test('products_index', function () {
    $response = $this->get('/api/products');

    $response->assertStatus(200);
});


test('products_can_be_shown', function () {
    $product = Product::factory()->create();

    $response = $this->get('/api/products/' . $product->getKey());
    $response->assertStatus(200);
});


test('product_can_be_created', function () {
    $attributes = [
        'sku' => '54648',
        'name' => 'Test Product',
        'price' => 444.44,
    ];

    $response = $this->post('/api/products', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('products', $attributes);
});


test('product_can_be_updated', function () {
    $product = Product::factory()->create();
    $attributes = [
        'sku' => 'upd54648',
        'name' => 'upd Test Product',
        'price' => 444.44,
    ];
    $response = $this->patch('/api/products/' . $product->getKey(), $attributes);
    $response->assertStatus(202);
    $this->assertDatabaseHas('products', array_merge(
        ['id' => $product->getKey()],
        $attributes
    ));
});


test('product_can_be_deleted', function () {
    $product = Product::factory()->create();
    $response = $this->delete('/api/products/' . $product->getKey());
    $response->assertStatus(204);
    $this->assertDatabaseMissing('products', ['id' => $product->getKey()]);
});
