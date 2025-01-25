<?php

namespace App\Repositories;

use App\Models\V1\User;

class UserRepository implements UserRepositoryInterface {

    public function all() {
        return User::all();
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