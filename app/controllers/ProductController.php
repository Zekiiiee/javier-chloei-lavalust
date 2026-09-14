<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');

        // Check if user is logged in
        if (empty($_SESSION['authenticated'])) {
            header('Location: https://javier-chloei-lavalust.onrender.com/login');
            exit;
        }
    }

    public function index()
    {
        $products = $this->ProductModel->all();

        $this->call->view('products', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $this->call->view('product_create');
    }

    public function store()
    {
        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'description'  => $_POST['description'] ?? '',
            'price'        => $_POST['price'] ?? 0,
            'quantity'     => $_POST['quantity'] ?? 0
        ];

        $this->ProductModel->insert($data);

        header('Location: https://javier-chloei-lavalust.onrender.com/products');
        exit;
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            header('Location: https://javier-chloei-lavalust.onrender.com/products');
            exit;
        }

        $this->call->view('product_edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $data = [
            'product_name' => $_POST['product_name'] ?? '',
            'description'  => $_POST['description'] ?? '',
            'price'        => $_POST['price'] ?? 0,
            'quantity'     => $_POST['quantity'] ?? 0
        ];

        $this->ProductModel->update($id, $data);

        header('Location: https://javier-chloei-lavalust.onrender.com/products');
        exit;
    }

    public function delete($id)
    {
        $this->ProductModel->delete($id);

        header('Location: https://javier-chloei-lavalust.onrender.com/products');
        exit;
    }
}