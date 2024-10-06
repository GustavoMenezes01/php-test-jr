<?php

namespace App\Services;

class BookService {
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    public function addBook(Book $book): void {
        $this->bookRepository->save($book);
    }

    public function removeBook(string $isbn): void {
        $this->bookRepository->deleteByIsbn($isbn);
    }

    public function listBooks(): array {
        return $this->bookRepository->getAll();
    }
}
