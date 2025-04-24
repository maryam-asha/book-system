<?php

namespace App\Services;

use App\Models\Book;
use App\Repositories\Contracts\BookRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BookService
{

    protected $bookRepository;
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }
    public function getAllBooks(): Collection
    {
        return $this->bookRepository->all();
    }

    public function getBookById(int $id): ?Book
    {
        return $this->bookRepository->find($id);
    }

    public function createBook(array $data): Book
    {
        if (!$this->isValidIsbn($data['isbn'])) {
            throw new \InvalidArgumentException('Invalid ISBN format.');
        }
        return $this->bookRepository->create($data);
    }

    public function updateBook(int $id, array $data): bool
    {
        if (isset($data['isbn']) && !$this->isValidIsbn($data['isbn'])) {
            throw new \InvalidArgumentException('Invalid ISBN format.');
        }
        return $this->bookRepository->update($id, $data);
    }

    public function deleteBook(int $id): bool
    {
        return $this->bookRepository->delete($id);
    }

    private function isValidIsbn(string $isbn): bool
    {
        return preg_match('/^\d{10}(\d{3})?$/', $isbn);
    }
}
