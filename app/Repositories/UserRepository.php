<?php

namespace App\Repositories;

use App\Models\V1\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class UserRepository implements UserRepositoryInterface{

    // When Using this function, we have cached the user so that this function will return the user from cache if it is present in cache.ssss
    public function all() {
        Cache::remember('users', 60, function () {
            return User::all();
        });
    }

    public function find(int $id) {
        return User::findOrFail($id);
    }

    public function add(array $data) {
        return User::create($data);
    }

    public function update(int $id, array $data) {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete(int $id) {
        $user = User::findOrFail($id);
        $user->delete();
    }
}