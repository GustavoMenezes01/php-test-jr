<?php

namespace App\Services;


/**
 * Class BookService
 * Provides business logic for managing books, including adding, removing, and listing books.
 */
class BookService {
    private BookRepository $bookRepository;

    /**
     * Constructor to initialize the BookService with a BookRepository.
     *
     * @param BookRepository $bookRepository
     */
    public function __construct(BookRepository $bookRepository) {
        $this->bookRepository = $bookRepository;
    }

    /**
     * Adds a new book to the repository.
     *
     * @param Book $book
     */
    public function addBook(Book $book): void {
        $this->bookRepository->save($book);
    }

    /**
     * Removes a book from the repository by its ISBN.
     *
     * @param string $isbn
     */
    public function removeBook(string $isbn): void {
        $this->bookRepository->deleteByIsbn($isbn);
    }

    /**
     * Returns a list of all books from the repository.
     *
     * @return array
     */
    public function listBooks(): array {
        return $this->bookRepository->getAll();
    }

    public function listBooksByIsbn(string $isbn): ?Book {
        return $this->bookRepository->findByIsbn($isbn);
    }
}
