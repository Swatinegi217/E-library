<?php

class BookDetailController {
    private $model;
    
    public function __construct() {
        include '../query/readmoreq.php';
        $this->model = new BookDetailModel();
    }
    
    public function show($id) {
        $book = $this->model->getBookDetail($id);
        include '../pages/readmore.php';
    }
}

if (isset($_GET['id'])) {
    $controller = new BookDetailController();
    $controller->show($_GET['id']);
}
?>