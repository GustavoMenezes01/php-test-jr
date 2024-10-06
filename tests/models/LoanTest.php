<?php

use PHPUnit\Framework\TestCase;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use DateTime;

class LoanTest extends TestCase {

    public function testLoanCreation() {
        $book = new Book('Mr. Robot', 'F. Scott Fitzgerald', '123456789');
        $user = new User('Gustvo Menezes');
        $loanDate = new DateTime();

        $loan = new Loan($book, $user, $loanDate);

        $this->assertEquals($book, $loan->getBook());
        $this->assertEquals($user, $loan->getUser());
        $this->assertEquals($loanDate, $loan->getLoanDate());
    }
}
