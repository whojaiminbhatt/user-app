<?

namespace App\Repositories;

interface UserRepositoryInterface {
    public function all();
    public function find(int $id);
    public function add(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
?>
