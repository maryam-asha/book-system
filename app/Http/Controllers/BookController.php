<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index(): JsonResponse
    {
        $books = $this->bookService->getAllBooks();
        return response()->json(['data' => $books], 200);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = $this->bookService->createBook($request->validated());
        return response()->json(['data' => $book, 'message' => 'Book created successfully'], 201);
    }

    public function show($id): JsonResponse
    {

        $book = $this->bookService->getBookById($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json(['data' => $book], 200);
    }

    public function update(UpdateBookRequest $request, $id): JsonResponse
    {

        $updated = $this->bookService->updateBook($id, $request->validated());
        if (!$updated) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json(['message' => 'Book updated successfully'], 200);
    }

    public function destroy($id): JsonResponse
    {
        $deleted = $this->bookService->deleteBook($id);
        if (!$deleted) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
