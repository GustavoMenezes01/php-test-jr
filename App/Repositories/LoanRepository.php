<?php

namespace App\Repositories;

class LoanRepository {
    private array $loans = [];

    public function save(Loan $loan): void {
        $this->loans[] = $loan;
    }

    public function update(Loan $loan): void {
        // Logic to update loan status in the repository
    }

    public function findByBook(Book $book): ?Loan {
        foreach ($this->loans as $loan) {
            if ($loan->getBook() === $book) {
                return $loan;
            }
        }
        return null;
    }

    public function getAll(): array {
        return $this->loans;
    }
}
