<?php

namespace Tests\Services;

use App\Repositories\BookRepository;
use App\Services\BookService;
use App\Models\Book;
use PHPUnit\Framework\TestCase;

class BookServiceTest extends TestCase
{
    private $bookRepository;
    private $bookService;

    protected function setUp(): void
    {
        $this->bookRepository = $this->createMock(BookRepository::class);
        $this->bookService = new BookService($this->bookRepository);
    }

    public function testAddBook()
    {
        $book = new Book('Test Title', 'Test Author', '1234567890');
    
        $this->bookRepository
            ->expects($this->once())
            ->method('save')
            ->with($book);
    
        $this->bookService->addBook($book);
    }
    

    public function testRemoveBook()
    {
        $isbn = '1234567890';
    
        $this->bookRepository
            ->expects($this->once())
            ->method('deleteByIsbn')
            ->with($isbn);
    
        $this->bookService->removeBook($isbn);
    }
    

    public function testListBooks()
    {
        $book = new Book('Test Title', 'Test Author', '1234567890');
    
        $this->bookRepository
            ->expects($this->once())
            ->method('getAll')
            ->willReturn([$book]);
    
        $result = $this->bookService->listBooks();
        $this->assertCount(1, $result);
        $this->assertSame($book, $result[0]);
    }
    
    

    public function testListBooksByIsbn()
    {
        $isbn = '1234567890';
        $book = new Book('Test Title', 'Test Author', $isbn);
    
        $this->bookRepository
            ->expects($this->once())
            ->method('findByIsbn')
            ->with($isbn)
            ->willReturn($book);
    
        $result = $this->bookService->listBooksByIsbn($isbn);
        $this->assertSame($book, $result);
    }
    
    
}