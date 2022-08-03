<?php

class Boutique extends Controller
{

  public function __construct()
  {
    $this->productModel = $this->model('Product');
    // $this->cartModel  = $this->model('Cart');
  }

  public function index()
  {
    $products = $this->productModel->getProducts();
    $pictures = $this->productModel->getPictures();
    $data = [
      'title' => "Bienvenue dans la boutique",
      'products' => $products,
      'pictures' => $pictures,
    ];
    $this->view('boutique/index', $data); // adresse à changer ?
  }

  public function show($id)
  {
    $product = $this->productModel->getProductById($id);
    $pictures = $this->productModel->getPicturesById($id);
    $data = [
      'title' => $product->name,
      'data' => $product,
    ];
    $this->view('boutique/show', $data);
  }
}
