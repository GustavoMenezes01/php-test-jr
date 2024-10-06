<?php

namespace Tests\Services;

use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use App\Services\LoanService;
use App\Repositories\LoanRepository;
use PHPUnit\Framework\TestCase;

class LoanServiceTest extends TestCase
{
    private $loanRepository;
    private $loanService;

    protected function setUp(): void
    {
        $this->loanRepository = $this->createMock(LoanRepository::class);
        $this->loanService = new LoanService($this->loanRepository);
    }
    
    
    public function testReturnBook(): void
    {
        $book = new Book('12345', 'Sample Title', 'Sample Author');
        $user = new User('Gustavo Menezes');
        $loan = new Loan($book, $user, new \DateTime());

        $loan->markAsReturned();

        $this->loanRepository->expects($this->once())
            ->method('update')
            ->with($loan);

        $this->loanService->returnBook($loan);
    }
    
}
