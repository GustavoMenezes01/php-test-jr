<?php

class Loan {
    private Book $book;
    private User $user;
    private DateTime $loanDate;
    private ?DateTime $returnDate;

    public function __construct(Book $book, User $user, DateTime $loanDate) {
        $this->book = $book;
        $this->user = $user;
        $this->loanDate = $loanDate;
        $this->returnDate = null;
    }

    public function getBook(): Book {
        return $this->book;
    }

    public function getUser(): User {
        return $this->user;
    }

    public function getLoanDate(): DateTime {
        return $this->loanDate;
    }

    public function getReturnDate(): ?DateTime {
        return $this->returnDate;
    }

    public function markAsReturned(): void {
        $this->returnDate = new DateTime();
    }
}
