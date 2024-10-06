<?php

namespace App\Services;

/**
 * Class LoanService
 * Provides business logic for managing loan transactions, including creating loans and returning books.
 */
class LoanService {
    private LoanRepository $loanRepository;

    /**
     * Constructor to initialize the LoanService with a LoanRepository.
     *
     * @param LoanRepository $loanRepository
     */
    public function __construct(LoanRepository $loanRepository) {
        $this->loanRepository = $loanRepository;
    }

    /**
     * Creates a new loan for a book by a user and saves it in the repository.
     *
     * @param Book $book
     * @param User $user
     * @return Loan
     */
    public function createLoan(Book $book, User $user): Loan {
        $loan = new Loan($book, $user, new DateTime());
        $this->loanRepository->save($loan);
        return $loan;
    }

    /**
     * Marks a loan as returned and updates the loan in the repository.
     *
     * @param Loan $loan
     */
    public function returnBook(Loan $loan): void {
        $loan->markAsReturned();
        $this->loanRepository->update($loan);
    }

    public function findLoanByBookIsbn(string $isbn): ?Loan {
        foreach ($this->loanRepository->getAll() as $loan) {
            if ($loan->getBook()->getIsbn() === $isbn) {
                return $loan;
            }
        }
        return null;
    }
}
