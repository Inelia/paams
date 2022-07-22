<?php

class Products extends Controller
{

  public function __construct()
  {
    $this->productModel = $this->model('Product');
    $this->cartModel  = $this->model('Cart');
  }

  public function index()
  {
    $products = $this->productModel->getProducts();
    $data = [
      'title' => "Bienvenue dans la boutique",
      'products' => $products,
    ];
    $this->view('products/index', $data); // adresse à changer ?
  }

  public function show($id)
  {
    $product = $this->productModel->getProductById($id);
    $data = [
      'title' => $product->name,
      'data' => $product,
    ];
    $this->view('products/show', $data);
  }
}
