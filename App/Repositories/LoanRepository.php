<?php

namespace App\Repositories;

use App\Models\Loan;
use App\Models\Book;

/**
 * Class LoanRepository
 * Manages the persistence of loan transactions, including saving, updating, and retrieving loans.
 */
class LoanRepository {
    private array $loans = [];

    /**
     * Saves a loan in the repository.
     *
     * @param Loan $loan
     */
    public function save(Loan $loan): void {
        $this->loans[] = $loan;
    }

    /**
     * Updates a loan in the repository.
     *
     * @param Loan $loan
     */
    public function update(Loan $loan): void {
        // Logic to update loan status in the repository
    }

    /**
     * Finds a loan by a specific book in the repository.
     *
     * @param Book $book
     * @return Loan|null
     */
    public function findByBook(Book $book): ?Loan {
        foreach ($this->loans as $loan) {
            if ($loan->getBook() === $book) {
                return $loan;
            }
        }
        return null;
    }

    /**
     * Retrieves all loans from the repository.
     *
     * @return array
     */
    public function getAll(): array {
        return $this->loans;
    }
}
