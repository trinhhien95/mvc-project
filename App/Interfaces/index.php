<?php
// class SimpleBook có phương thức getAuthor() và getTitle()
class SimpleBook {
    private $author;
    private $title;
    function __construct($author_in, $title_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
}

// class BookAdapter là lớp chuyển đổi của class SimpleBook nhằm mục đích tạo phương thức getAuthorAndTitle() mà không phải
// sửa đổi lớp gốc (SimpleBook).
class BookAdapter {
    private $book;
    function __construct(SimpleBook $book_in) {
        $this->book = $book_in;
    }
    function getAuthorAndTitle() {
        return $this->book->getTitle().' by '.$this->book->getAuthor();
    }
}

// TESTING ADAPTER PATTERN
$book = new SimpleBook("Gamma, Helm, Johnson, and Vlissides", "Design Patterns");
$bookAdapter = new BookAdapter($book);
writeln('Author and Title: '.$bookAdapter->getAuthorAndTitle());

?>