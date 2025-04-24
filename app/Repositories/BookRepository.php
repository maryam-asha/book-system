<?php

namespace  App\Repositories;

use App\Models\Book;
use App\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookRepository implements BookRepositoryInterface
{
    public function all(): Collection
    {
        return Book::with('author', 'category')->get();
    }
    public function find(int $id): ?Book
    {
        return Book::with('author', 'category')->find($id);
    }
    public function create(array $data): Book
    {
        return Book::create($data);
    }
    public function update(int $id, array $data): bool
    {

        $book = Book::find($id);
        if (! $book) {
            return false;
        }
        return $book->update($data);
    }
    public function delete(int $id): bool
    {
        $book = Book::find($id);
        if (! $book) {
            return false;
        }
        return $book->delete($id);
    }
}
