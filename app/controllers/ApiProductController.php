<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('ProductModel');
        $this->call->library('api');
        $this->call->database();
    }

    /**
     * GET /api/products
     * Returns all products (protected)
     */
    public function index()
    {
        $this->api->require_method('GET');
        $this->api->rate_limit();
        $this->api->require_jwt();

        $products = $this->ProductModel->all();

        $this->api->respond([
            'message'  => 'Products retrieved successfully.',
            'products' => $products,
        ]);
    }

    /**
     * GET /api/products/{id}
     * Returns a single product (protected)
     */
    public function show($id)
    {
        $this->api->require_method('GET');
        $this->api->rate_limit();
        $this->api->require_jwt();

        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->api->respond([
            'message' => 'Product retrieved successfully.',
            'product' => $product,
        ]);
    }

    /**
     * POST /api/products
     * Create a new product (protected)
     */
    public function store()
    {
        $this->api->require_method('POST');
        $this->api->rate_limit();
        $this->api->require_jwt();

        $body = $this->api->body();

        $product_name = $body['product_name'] ?? '';
        $description  = $body['description'] ?? '';
        $price        = $body['price'] ?? 0;
        $quantity     = $body['quantity'] ?? 0;

        if (empty($product_name)) {
            $this->api->respond_error('Product name is required.', 422);
        }

        $data = [
            'product_name' => $product_name,
            'description'  => $description,
            'price'        => $price,
            'quantity'     => (int)$quantity,
        ];

        $this->ProductModel->insert($data);

        $this->api->respond([
            'message' => 'Product created successfully.',
        ], 201);
    }

    /**
     * PUT/PATCH /api/products/{id}
     * Update an existing product (protected)
     */
    public function update($id)
    {
        $this->api->rate_limit();
        $this->api->require_jwt();

        $method = $_SERVER['REQUEST_METHOD'];
        if (!in_array($method, ['PUT', 'PATCH'])) {
            $this->api->respond_error('Method Not Allowed', 405);
        }

        $product = $this->ProductModel->find($id);
        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $body = $this->api->body();

        $data = [
            'product_name' => $body['product_name'] ?? $product['product_name'],
            'description'  => $body['description'] ?? $product['description'],
            'price'        => $body['price'] ?? $product['price'],
            'quantity'     => (int)($body['quantity'] ?? $product['quantity']),
        ];

        $this->ProductModel->update($id, $data);

        $this->api->respond([
            'message' => 'Product updated successfully.',
        ]);
    }

    /**
     * DELETE /api/products/{id}
     * Delete a product (protected)
     */
    public function destroy($id)
    {
        $this->api->require_method('DELETE');
        $this->api->rate_limit();
        $this->api->require_jwt();

        $product = $this->ProductModel->find($id);
        if (!$product) {
            $this->api->respond_error('Product not found.', 404);
        }

        $this->ProductModel->delete($id);

        $this->api->respond([
            'message' => 'Product deleted successfully.',
        ]);
    }
}
