<?php

class Admin extends Controller
{
  public function __construct()
  {
    if (!isAdmin()) {
      redirect('users/login');
    } else {
      //je suis connecté et je suis admin
      $this->userModel = $this->model('User');
      $this->productModel = $this->model('Product');
    }
  }
  public function index()
  {
    // var_dump('on est connecté en admin');
    $data = ['title' => 'Administration'];
    $this->view('admin/index', $data);
  }
  public function products()
  {
    $products = $this->productModel->getProducts();
    $data = [
      'title' => 'Gestion des produits',
      'products' => $products
    ];

    $this->view('admin/products/index', $data);
  }
  public function addProduct()
  {
    
  }
  public function users()
  {
    $data = ['title' => 'Gestion des utilisateurs'];
    $this->view('admin/users/index', $data);
  }

}
