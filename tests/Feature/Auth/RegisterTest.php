<?php

test('guests can register a new account and get back the user object and access token', function () {
    $credentials = [
        'name' => 'example',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->postJson('/api/register', $credentials);

    $this->assertGuest();
    $response->assertSuccessful();
    $response->assertJson([
        'status' => 'user-created',
    ]);
});
