<?php

namespace Tests\Repositories;

use App\Models\Book;
use App\Repositories\BookRepository;
use PHPUnit\Framework\TestCase;

class BookRepositoryTest extends TestCase {
    private BookRepository $bookRepository;

    protected function setUp(): void {
        parent::setUp();
        $this->bookRepository = new BookRepository();
    }

    public function testSaveAndGetAllBooks() {
        $book1 = new Book('Title 1', 'Author 1', '1234567890');
        $book2 = new Book('Title 2', 'Author 2', '0987654321');

        $this->bookRepository->save($book1);
        $this->bookRepository->save($book2);

        $books = $this->bookRepository->getAll();
        $this->assertCount(2, $books);
        $this->assertSame($book1, $books[0]);
        $this->assertSame($book2, $books[1]);
    }

    public function testDeleteByIsbn() {
        $book = new Book('Title 1', 'Author 1', '1234567890');
        $this->bookRepository->save($book);

        $this->bookRepository->deleteByIsbn('1234567890');
        $books = $this->bookRepository->getAll();

        $this->assertCount(0, $books);
    }

    public function testFindByIsbn() {
        $book = new Book('Title 1', 'Author 1', '1234567890');
        $this->bookRepository->save($book);

        $foundBook = $this->bookRepository->findByIsbn('1234567890');
        $this->assertSame($book, $foundBook);
    }

    public function testFindByIsbnNotFound() {
        $foundBook = $this->bookRepository->findByIsbn('not-existing-isbn');
        $this->assertNull($foundBook);
    }
}
