<?php

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->artisan('db:seed');
});

test('hotels_index', function () {
    $response = $this->get('/api/hotels');

    $response->assertStatus(200);
});


test('hotels_can_be_shown', function () {
    $hotel = Hotel::factory()->create();

    $response = $this->get('/api/hotels/' . $hotel->getKey());
    $response->assertStatus(200);
});


test('hotel_can_be_created', function () {
    $attributes = [
        'name' => 'Test Hotel',
        'address' => 'Test address',
    ];

    $response = $this->post('/api/hotels', $attributes);
    $response->assertStatus(201);
    $this->assertDatabaseHas('hotels', $attributes);
});


test('hotel_can_be_updated', function () {
    $hotel = Hotel::factory()->create();
    $attributes = [
        'name' => 'Updated Test Hotel',
        'address' => 'Updated Test address',
    ];
    $response = $this->patch('/api/hotels/' . $hotel->getKey(), $attributes);
    $response->assertStatus(202);
    $this->assertDatabaseHas('hotels', array_merge(
        ['id' => $hotel->getKey()],
        $attributes
    ));
});


test('hotel_can_be_deleted', function () {
    $hotel = Hotel::factory()->create();
    $response = $this->delete('/api/hotels/' . $hotel->getKey());
    $response->assertStatus(204);
    $this->assertDatabaseMissing('hotels', ['id' => $hotel->getKey()]);
});
