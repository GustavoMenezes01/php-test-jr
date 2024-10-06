<?php

namespace App\Models;

/**
 * Class Book
 * Represents a book with its basic attributes and operations such as borrowing and returning.
 */
class Book {
    private string $title;
    private string $author;
    private string $isbn;

    /**
     * Constructor to initialize a Book with its title, author, and ISBN.
     *
     * @param string $title
     * @param string $author
     * @param string $isbn
     */
    public function __construct(string $title, string $author, string $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }

    /**
     * Returns the title of the book.
     *
     * @return string
     */
    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * Returns the author of the book.
     *
     * @return string
     */
    public function getAuthor(): string {
        return $this->author;
    }

    /**
     * Returns the ISBN of the book.
     *
     * @return string
     */
    public function getIsbn(): string {
        return $this->isbn;
    }

    /**
     * Marks the book as borrowed.
     */
    public function borrow(): void {
    }

    /**
     * Marks the book as returned.
     */
    public function return(): void {
    }
}
