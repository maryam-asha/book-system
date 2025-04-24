<?php

namespace  App\Repositories\Contracts;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

interface BookRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Book;
    public function create(array $data): Book;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
