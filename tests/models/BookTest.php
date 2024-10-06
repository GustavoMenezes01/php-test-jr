<?php

use PHPUnit\Framework\TestCase;
use App\Models\Book;

/**
 * This class contains unit tests for the Book model.
 */
class BookTest extends TestCase {

    /**
     * Test if a Book object is created with correct attribute values.
     */
    public function testBookCreation() {
        $book = new Book('Mr. Robot', 'Live eCommerce ', '123456789');

        $this->assertEquals('Mr. Robot', $book->getTitle());
        $this->assertEquals('Live eCommerce ', $book->getAuthor());
        $this->assertEquals('123456789', $book->getIsbn());
    }

    /**
     * Test if the title of the book can be updated and retrieved correctly.
     */
    public function testSetAndGetTitle() {
        $book = new Book('Initial Title', 'Author', '123456789');
        $book->setTitle('New Title');

        $this->assertEquals('New Title', $book->getTitle());
    }
}
