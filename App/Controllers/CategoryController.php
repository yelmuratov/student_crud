<?php
namespace App\Controllers;

use App\Models\Author\Author;
use App\Models\Book\Book;

define('VIEW_PATH', realpath(__DIR__ . '/../Views/'));

session_start();

class BaseController {
    protected function render($view, $data = []) {
        extract($data); 
        include VIEW_PATH . "/$view.php"; 
    }
}

class CategoryController extends BaseController {
    public function index() {
        $this->render('index'); 
    }

    //authors
    public function authors() {
        $this->render('authors/index'); 
    }

    public function author_create() {
        $this->render('authors/create'); 
    }

    public function author_edit() {
        $this->render('authors/edit');
    }

    public function save_author() {
        if(isset($_POST['name']) && isset($_POST['bio'])) {
            Author::create([
                'name' => htmlspecialchars($_POST['name']),
                'bio' => htmlspecialchars($_POST['bio']),
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $_SESSION['author_create'] = 'Author created successfully';
            header('Location: /authors');
        }
    }

    public function update_author() {
        if(isset($_POST['name']) && isset($_POST['bio'])) {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'bio' => htmlspecialchars($_POST['bio'])
            ];

            Author::update($_GET['id'], $data);
        }
    }

    public function delete_author() {
        $id = $_GET['id'];
        Author::delete($id);
        $_SESSION['author_delete'] = 'Author deleted successfully';
        header('Location: /authors');
    }

    //books
    public function books() {
        $this->render('books/index');
    }

    public function book_create() {
        $this->render('books/create');
    }

    public function book_edit() {
        $this->render('books/edit');
    }

    public function save_book() {
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['text']) && isset($_POST['author_id']) && isset($_FILES['img']) && isset($_POST['genre_id'])) {
            $img = $_FILES['img'];
            $imgName = $img['name'];
            $imgTmp = $img['tmp_name'];
            $imgSize = $img['size'];
            $imgError = $img['error'];
            $imgExt = explode('.', $imgName);
            $imgActualExt = strtolower(end($imgExt));
            $allowed = ['jpg', 'jpeg', 'png'];

            if(in_array($imgActualExt, $allowed)) {
                if($imgError === 0) {
                    if($imgSize < 1000000) {
                        $imgNameNew = uniqid('', true) . "." . $imgActualExt;
                        $imgDestination = 'uploads/' . $imgNameNew;
                        move_uploaded_file($imgTmp, $imgDestination);

                        Book::create([
                            'title' => htmlspecialchars($_POST['title']),
                            'description' => htmlspecialchars($_POST['description']),
                            'text' => htmlspecialchars($_POST['text']),
                            'author_id' => $_POST['author_id'],
                            'img' => $imgDestination,
                            'genre_id' => $_POST['genre_id'],
                            'created_at' => date('Y-m-d H:i:s')
                        ]);
                        $_SESSION['book_create'] = 'Book created successfully';
                        header('Location: /books');
                    } else {
                        echo 'Your file is too big!';
                    }
                } else {
                    echo 'There was an error uploading your file!';
                }
            } else {
                echo 'You cannot upload files of this type!';
            }
        }
    }

    public function update_book() {
        if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['text']) && isset($_POST['author_id']) && isset($_POST['genre_id'])) {
            $data = [
                'title' => htmlspecialchars($_POST['title']),
                'description' => htmlspecialchars($_POST['description']),
                'text' => htmlspecialchars($_POST['text']),
                'author_id' => $_POST['author_id'],
                'genre_id' => $_POST['genre_id']
            ];

            Book::update($_GET['id'], $data);
        }
    }

    public function delete_book() {
        $id = $_GET['id'];
        Book::delete($id);
        $_SESSION['book_delete'] = 'Book deleted successfully';
        header('Location: /books');
    }

    //genres
    public function genres() {
        $this->render('genres/index');
    }

    public function genre_create() {
        $this->render('genres/create');
    }

    public function genre_edit() {
        $this->render('genres/edit');
    }

    public function save_genre() {
        if(isset($_POST['name']) && !empty($_POST['description'])) {
            Genre::create([
                'name' => htmlspecialchars($_POST['name']),
                'description' => htmlspecialchars($_POST['description'])
            ]);
            $_SESSION['genre_create'] = 'Genre created successfully';
            header('Location: /genres');
        }
    }

    public function update_genre() {
        if(isset($_POST['name']) && !empty($_POST['description'])) {
            $data = [
                'name' => htmlspecialchars($_POST['name']),
                'description' => htmlspecialchars($_POST['description'])
            ];

            Genre::update($_GET['id'], $data);
        }
    }

    public function delete_genre() {
        $id = $_GET['id'];
        Genre::delete($id);
        $_SESSION['genre_delete'] = 'Genre deleted successfully';
        header('Location: /genres');
    }   
    }   
?>