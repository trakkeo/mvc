<?php
namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\UserModel;
session_start();

class NewsController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function list()
    {
        $news = $this->newsModel->getNews();
        require_once __DIR__ . '/../Views/News/list.php';
    }

    public function createNews()
    {
        $userModel = new UserModel();
        $isAdmin = $userModel->isAdmin($_SESSION['email']);
        if (!$isAdmin) {
            $_SESSION['ERROR_MESSAGE'] = 'Vous n\'êtes pas autorisé à accéder à cette page.';
            header('Location: /news');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
            // get user id from userModel function getUserByEmail
            $userModel = new UserModel();
            $user = $userModel->getUserByEmail($_SESSION['email']);

            $title = $_POST['title'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $userId = $user['id'];

            $this->newsModel->createNews($title, $content, $status, $userId);
            header('Location: /list_news');
            exit;
        }
        require_once __DIR__ . '/../Views/News/create.php';
    }

    public function updateNews()
    {
        $userModel = new UserModel();
        $isAdmin = $userModel->isAdmin($_SESSION['email']);
        if (!$isAdmin) {
            $_SESSION['ERROR_MESSAGE'] = 'Vous n\'êtes pas autorisé à accéder à cette page.';
            header('Location: /');
            exit;
        }

        $newsId = $_GET['id'];
        $news = $this->newsModel->getNewsById($newsId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $newsId;
            $title = $_POST['title'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $userId = $_POST['userId'];

            $this->newsModel->updateNews($id, $title, $content, $status, $userId);

            header('Location: /list_news');
        }
        require_once __DIR__ . '/../Views/News/update.php';
    }

    public function showNews()
    {

        $news = $this->newsModel->getNews(); 
        require_once __DIR__ . '/../Views/News/show.php';
    }
}