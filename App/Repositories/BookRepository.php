<?php

namespace App\Repositories;

class BookRepository {
    private array $books = [];

    public function save(Book $book): void {
        $this->books[] = $book;
    }

    public function deleteByIsbn(string $isbn): void {
        $this->books = array_filter($this->books, function(Book $book) use ($isbn) {
            return $book->getIsbn() !== $isbn;
        });
    }

    public function getAll(): array {
        return $this->books;
    }

    public function findByIsbn(string $isbn): ?Book {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $isbn) {
                return $book;
            }
        }
        return null;
    }
}
