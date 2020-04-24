<?php 

  class Book extends Controller {

        public function index ($page) {
                        
               $data["judul"] = "Books List";
               $data["books"] = $this->model("Book_model")->pagination($page);
               $countData["books"] = $this->model("Book_model")->getAllBooks();
               $pages = $this->model("Book_model")->countPages(count($countData["books"]));
               $this->view("templates/header", $data);
               $this->view("book/index", $data, $pages, $page);
               $this->view("templates/footer");


        }

        public function search($page) {
               
               $data["judul"] = "Books List";
               $data["books"] = $this->model("Book_model")->searchBooks();
               $pages = $this->model("Book_model")->countPages($page);
               $this->view("templates/header", $data);
               $this->view("book/index", $data, $pages, $page);
               $this->view("templates/footer");
             
        }

        public function detail ($id) {

               $data["judul"] = "Books Details";
               $data["books"] = $this->model("Book_model")->getBookById($id);
               $this->view("templates/header", $data);
               $this->view("book/details", $data);
               $this->view("templates/footer");


        }

        public function insert () {

               if ( $this->model("Book_model")->insertBookData($_POST) > 0 ) {
                   
                  Flasher::setFlash("success", "added", "success");
                  header("Location: ".BASEURL."book");

               } else {

                  Flasher::setFlash("failed", "added", "danger");
                  header("Location: ".BASEURL."book");

               }

        }

        public function change () {

               if ( $this->model("Book_model")->changeBookData($_POST) > 0 ) {
                   
                  Flasher::setFlash("success", "changed", "success");
                  header("Location: ".BASEURL."book");

               } else {

                  Flasher::setFlash("failed", "changed", "danger");
                  header("Location: ".BASEURL."book");

               }

        }

        public function delete ($id) {

               if ( $this->model("Book_model")->deleteBookData($id) > 0 ) {
                   
                  Flasher::setFlash("success", "deleted", "success");
                  header("Location: ".BASEURL."book");

               } else {

                  Flasher::setFlash("failed", "deleted", "danger");
                  header("Location: ".BASEURL."book");

               }

        }

        public function getchange () {

               echo json_encode($this->model("Book_model")->getBookById($_POST["id"]));

        }

  }

?>