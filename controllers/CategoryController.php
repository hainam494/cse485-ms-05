<?php

require_once __DIR__ . '/../models/CategoryModel.php';

class CategoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->model->all();

        require __DIR__ . '/../views/category/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->model->create(
                $_POST['name'],
                $_POST['description']
            );

            $_SESSION['flash']="Thêm thành công";

            header("Location:index.php?controller=category&action=index");
            exit;
        }

        require __DIR__ . '/../views/category/create.php';
    }

    public function edit()
    {
        $id=$_GET['id'];

        if($_SERVER['REQUEST_METHOD']=="POST"){

            $this->model->update(
                $id,
                $_POST['name'],
                $_POST['description']
            );

            $_SESSION['flash']="Cập nhật thành công";

            header("Location:index.php?controller=category&action=index");
            exit;
        }

        $category=$this->model->find($id);

        require __DIR__.'/../views/category/edit.php';
    }

    public function delete()
    {
        $this->model->delete($_POST['id']);

        $_SESSION['flash']="Đã xóa";

        header("Location:index.php?controller=category&action=index");
        exit;
    }
}