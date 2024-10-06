<?php

namespace App\Models;

/**
 * Class User
 * Represents a user of the library system, with the ability to borrow and return books.
 */
class User {
    private string $name;

    /**
     * Constructor to initialize a User with their name.
     *
     * @param string $name
     */
    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * Returns the name of the user.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Allows the user to borrow a book.
     *
     * @param Book $book
     */
    public function borrowBook(Book $book): void {
    }

    /**
     * Allows the user to return a borrowed book.
     *
     * @param Book $book
     */
    public function returnBook(Book $book): void {
    }

    public function setName(string $name): void {
        $this->name = $name;
    }
}
