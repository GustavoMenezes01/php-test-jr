<?php

namespace App\Repositories;

use App\Models\Book;

/**
 * Class BookRepository
 * Manages the persistence of books, including saving, deleting, and retrieving books.
 */
class BookRepository {
    private array $books = [];

    /**
     * Saves a book in the repository.
     *
     * @param Book $book
     */
    public function save(Book $book): void {
        $this->books[] = $book;
    }

    /**
     * Deletes a book from the repository by its ISBN.
     *
     * @param string $isbn
     */
    public function deleteByIsbn(string $isbn): void {
        $this->books = array_filter($this->books, function(Book $book) use ($isbn) {
            return $book->getIsbn() !== $isbn;
        });
    }

    /**
     * Retrieves all books from the repository.
     *
     * @return array
     */
    public function getAll(): array {
        return $this->books;
    }

    /**
     * Finds a book in the repository by its ISBN.
     *
     * @param string $isbn
     * @return Book|null
     */
    public function findByIsbn(string $isbn): ?Book {
        foreach ($this->books as $book) {
            if ($book->getIsbn() === $isbn) {
                return $book;
            }
        }
        return null;
    }
}
