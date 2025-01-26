<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService {

    public function __construct(protected UserRepositoryInterface $userRepository) {}

    public function all() {
        return $this->userRepository->all();
    }

    public function find(int $id) {
        return $this->userRepository->find($id);
    }

    public function add(array $data) {
        return $this->userRepository->add($data);
    }

    public function update(int $id, array $data) {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id) {
        return $this->userRepository->delete($id);
    }
}
?>