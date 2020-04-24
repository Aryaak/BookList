<?php 

  class Book_model extends Controller {

        private $table = "books_table";
        private $db;

        public function __construct () {

               $this->db = new Database ();

        }

        public function searchBooks() {

               if ( isset($_POST["keyword"]) ) {

                   $keyword = $_POST["keyword"];

               } else {

                   $keyword = "";
               }
               $this->db->query("SELECT * FROM ".$this->table." WHERE title LIKE :keyword  ORDER BY id DESC");
               $this->db->bind("keyword", "%$keyword%");
               return $this->db->resultSet();

        }

        public function getBookByLimit($earlyData, $dataPages) {

               $this->db->query("SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT $earlyData, $dataPages");

               return $this->db->resultSet();

        }

        public function getAllBooks() {
               
               $this->db->query("SELECT * FROM ".$this->table." ORDER BY id DESC");  
               return $this->db->resultSet();
        }

        public function getBookById ($id) {

               $this->db->query("SELECT * FROM ".$this->table." WHERE id=$id");
               $this->db->bind("id", $id);
               return $this->db->single();

        }

        public function countPages ($page, $dataPages = 5) {
                 
               if ( isset($_POST["keyword"]) ) {
                  
                  $earlyData = ( $dataPages * $page ) - $dataPages;
                  $allData = count($this->searchBooks($earlyData));

               } else {
                  
                  $allData = count($this->getAllBooks());
                  return $pages = ceil($allData / $dataPages);

               }

        }

        public function pagination($page) {

               $allData   = count($this->getAllBooks());
               $dataPages = 5;
               $pages     = $this->countPages($allData, $dataPages);
               $page      = $page;
               $earlyData = ( $dataPages * $page ) - $dataPages;

               return $data = $this->getBookByLimit($earlyData, $dataPages); 

        }

        public function insertImage($image) {

               $imgName  = $image["image"]["name"];
               $imgTmp   = $image["image"]["tmp_name"];
               $imgValid = ["jpg", "jpeg"];
               $imgExtension = explode(".", $imgName);
               $imgExtension = end($imgExtension);

               if ( in_array($imgExtension, $imgValid) ) {
                  
                  $imgUniqid = uniqid();
                  $imgUniqid .= ".".$imgExtension;            
                  move_uploaded_file($imgTmp, $_SERVER['DOCUMENT_ROOT']."/BookList/public/img/".$imgUniqid);
                  return $imgUniqid;

               } else {

                  return 0;
                  exit;

               }

        }

        public function insertBookData($data) {

               if ( $_FILES["image"]["error"] != 4 ) {

               $image = $this->insertImage($_FILES);
               if ($image == 0) return 0;

               } else {

               $image = " ";

               }

               $query = "INSERT INTO books_table VALUES ('', :title, :author, :publisher, :price, :image)";

               $this->db->query($query);
               $this->db->bind("title",$data["title"]);
               $this->db->bind("author",$data["author"]);
               $this->db->bind("publisher",$data["publisher"]);
               $this->db->bind("price",$data["price"]);
               $this->db->bind("image",$image);

               $this->db->execute();
               
               return $this->db->rowCount();

        }

        public function deleteBookData ($id) {

               // Delete image

               $image = $this->getBookById($id);
               unlink($_SERVER['DOCUMENT_ROOT']."/BookList/public/img/".$image["image"]);

               $query = "DELETE FROM books_table WHERE id = $id";

               $this->db->query($query);
               $this->db->bind("id", $id);

               $this->db->execute();

               return $this->db->rowCount(); 

        }

        public function changeBookData($data) {

               // Check image 
               
               $oldImage = $this->getBookById($data["id"]);

               if ( $_FILES["image"]["error"] != 4 ) {
                  
                  $image = $this->insertImage($_FILES);
                  if ( $image == 0 ) return false;
                  unlink($_SERVER['DOCUMENT_ROOT']."/BookList/public/img/".$oldImage["image"]);

               } else {

                  $image = $oldImage["image"];

               }

               var_dump($image);

               $query = "UPDATE books_table SET title = :title, author = :author, publisher = :publisher, price = :price, image = :image WHERE id = :id";

               $this->db->query($query);
               $this->db->bind("id",$data["id"]);
               $this->db->bind("title",$data["title"]);
               $this->db->bind("author",$data["author"]);
               $this->db->bind("publisher",$data["publisher"]);
               $this->db->bind("price",$data["price"]);
               $this->db->bind("image",$image);

               $this->db->execute();
               
               return 1;

        }



  }

?>