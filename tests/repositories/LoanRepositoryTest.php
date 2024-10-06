<?php

namespace Tests\Repositories;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Repositories\LoanRepository;
use PHPUnit\Framework\TestCase;

class LoanRepositoryTest extends TestCase
{
    private LoanRepository $loanRepository;

    protected function setUp(): void
    {
        $this->loanRepository = new LoanRepository();
    }

    public function testSaveAndGetAllLoans()
    {
        $book = new Book('Test Book', 'Test Author', '123456789');
        $user = new User('Test User');
        $loanDate = new \DateTime();

        $loan = new Loan($book, $user, $loanDate);
        $this->loanRepository->save($loan);

        $loans = $this->loanRepository->getAll();
        $this->assertCount(1, $loans);
        $this->assertSame($loan, $loans[0]);
    }

    public function testFindByBook()
    {
        $book = new Book('Test Book', 'Test Author', '123456789');
        $user = new User('Test User');
        $loanDate = new \DateTime();

        $loan = new Loan($book, $user, $loanDate);
        $this->loanRepository->save($loan);

        $foundLoan = $this->loanRepository->findByBook($book);
        $this->assertSame($loan, $foundLoan);
    }
}
