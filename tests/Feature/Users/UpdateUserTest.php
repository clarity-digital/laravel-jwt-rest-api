
<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('a user can update its details', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->patchJson('/api/user', $attributes = [
        'name'  => 'example',
        'email' => 'test@example.com',
    ]);

    $this->assertDatabaseHas('users', $attributes);
    $response->assertSuccessful();
    $response->assertJson([
        'name'  => $user->name,
        'email' => $user->email,
    ]);
});

test('a user can change its password', function () {
    $user = User::factory()->create([
        'password' => Hash::make('password'),
    ]);

    $response = $this->actingAs($user)->patchJson('/api/user/change-password', [
        'current_password'      => 'password',
        'password'              => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $this->assertTrue(Hash::check('new-password', $user->password));
    $response->assertSuccessful();
});
