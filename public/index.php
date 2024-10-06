<?php

require_once '../App/Models/Book.php';
require_once '../App/Models/User.php';
require_once '../App/Models/Loan.php';
require_once '../App/Repositories/BookRepository.php';
require_once '../App/Repositories/LoanRepository.php';
require_once '../App/Services/BookService.php';
require_once '../App/Services/LoanService.php';

$bookRepository = new BookRepository();
$bookService = new BookService($bookRepository);
$loanRepository = new LoanRepository();
$loanService = new LoanService($loanRepository);

function displayMenu() {
    echo "\n--- Live e-commerce - Gustavo Menezes - Library Management---\n";
    echo "1. Add a Book\n";
    echo "2. Remove a Book\n";
    echo "3. List all Books\n";
    echo "4. Borrow a Book\n";
    echo "5. Return a Book\n";
    echo "6. Exit\n";
    echo "Enter your choice: ";
}

function addBook($bookService) {
    echo "Enter book title: ";
    $title = trim(fgets(STDIN));
    echo "Enter book author: ";
    $author = trim(fgets(STDIN));
    echo "Enter book ISBN: ";
    $isbn = trim(fgets(STDIN));
    
    $book = new Book($title, $author, $isbn);
    $bookService->addBook($book);
    
    echo "Book '{$title}' added successfully!\n";
}

function removeBook($bookService) {
    echo "Enter ISBN of the book to remove: ";
    $isbn = trim(fgets(STDIN));
    
    $bookService->removeBook($isbn);
    echo "Book with ISBN '{$isbn}' removed successfully!\n";
}

function listBooks($bookService) {
    $books = $bookService->listBooks();
    
    if (count($books) === 0) {
        echo "No books available in the library.\n";
    } else {
        echo "\n--- List of Books ---\n";
        foreach ($books as $book) {
            echo "Title: {$book->getTitle()}, Author: {$book->getAuthor()}, ISBN: {$book->getIsbn()}\n";
        }
    }
}

function borrowBook($bookService, $loanService) {
    echo "Enter your name: ";
    $userName = trim(fgets(STDIN));
    echo "Enter ISBN of the book to borrow: ";
    $isbn = trim(fgets(STDIN));

    $book = $bookService->listBooksByIsbn($isbn);

    if ($book) {
        $user = new User($userName);
        $loanService->createLoan($book, $user);
        echo "Book '{$book->getTitle()}' borrowed by {$user->getName()}.\n";
    } else {
        echo "Book with ISBN '{$isbn}' not found.\n";
    }
}

function returnBook($loanService) {
    echo "Enter ISBN of the book to return: ";
    $isbn = trim(fgets(STDIN));
    
    $loan = $loanService->findLoanByBookIsbn($isbn);
    
    if ($loan) {
        $loanService->returnBook($loan);
        echo "Book '{$loan->getBook()->getTitle()}' returned successfully.\n";
    } else {
        echo "No loan found for book with ISBN '{$isbn}'.\n";
    }
}

while (true) {
    displayMenu();
    
    $choice = trim(fgets(STDIN));
    
    switch ($choice) {
        case '1':
            addBook($bookService);
            break;
        case '2':
            removeBook($bookService);
            break;
        case '3':
            listBooks($bookService);
            break;
        case '4':
            borrowBook($bookService, $loanService);
            break;
        case '5':
            returnBook($loanService);
            break;
        case '6':
            echo "Exiting the system.\n";
            exit();
        default:
            echo "Invalid choice. Please try again.\n";
            break;
    }
}
