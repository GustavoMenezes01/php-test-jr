<?php

namespace App\Models;

use DateTime;

/**
 * Class Loan
 * Represents a loan transaction, linking a book with a user and tracking the loan and return dates.
 */
class Loan {
    private Book $book;
    private User $user;
    private DateTime $loanDate;
    private ?DateTime $returnDate;

    /**
     * Constructor to initialize a Loan with the book, user, and loan date.
     *
     * @param Book $book
     * @param User $user
     * @param DateTime $loanDate
     */
    public function __construct(Book $book, User $user, DateTime $loanDate) {
        $this->book = $book;
        $this->user = $user;
        $this->loanDate = $loanDate;
        $this->returnDate = null;
    }

    /**
     * Returns the book associated with the loan.
     *
     * @return Book
     */
    public function getBook(): Book {
        return $this->book;
    }

    /**
     * Returns the user who borrowed the book.
     *
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }

    /**
     * Returns the loan date.
     *
     * @return DateTime
     */
    public function getLoanDate(): DateTime {
        return $this->loanDate;
    }

    /**
     * Returns the return date, or null if the book has not been returned yet.
     *
     * @return DateTime|null
     */
    public function getReturnDate(): ?DateTime {
        return $this->returnDate;
    }

    /**
     * Marks the loan as returned by setting the return date to the current date.
     */
    public function markAsReturned(): void {
        $this->returnDate = new DateTime();
    }
}
