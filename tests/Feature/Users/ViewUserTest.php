<?php

use App\Models\User;

test('a user can fetch its own account details', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->getJson('/api/user');

    $response->assertSuccessful();
});
