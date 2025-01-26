<?php 

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait UserTrait {

    private array $userData;

    private function userDataMapper(array $userData) {
        return [
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => Hash::make($userData['password']),
        ];
    }
}
?>