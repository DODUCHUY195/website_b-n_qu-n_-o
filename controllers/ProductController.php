<?php
require_once __DIR__ . '/../models/Product.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Product::create($_POST['name'], $_POST['price'], $_POST['description']);
            header("Location: index.php");
        }
        include __DIR__ . '/../views/product/create.php';
        break;

    case 'edit':
        $id = $_GET['id'];
        $product = Product::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            Product::update($id, $_POST['name'], $_POST['price'], $_POST['description']);
            header("Location: index.php");
        }

        include __DIR__ . '/../views/product/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        Product::delete($id);
        header("Location: index.php");
        break;

    default:
        $products = Product::all();
        include __DIR__ . '/../views/product/index.php';
        break;
}
