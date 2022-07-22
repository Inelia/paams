<?php

class Product
{

  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  /**
   * Permet de récupérer tous les produits.
   *
   * @param boolean $hidden
   *    (optional) prends en compte ou non les produits non afficher dans la boutique
   * @return array
   */
  public function getProducts($hidden = false)
  {
    $this->db->query("SELECT * FROM products where hidden=:hidden ORDER BY id DESC");
    $this->db->bind(':hidden', $hidden);
    return $this->db->resultSet();
  }
  /**
   * Retourne les informations d'un produit qui il existe
   *
   * @param integer $id
   * @return array|object|false
   */
  public function getProductById($id)
  {
    $this->db->query("SELECT * FROM products WHERE id=:id ");
    $this->db->bind(':id', $id);
    return $this->db->single();
  }

  /**
   * Ajoute un produit dans la base de données
   *
   * @param [array] $data
   * @return boolean
   */
  public function add($data)
  {
    $this->db->query("INSERT INTO products(name, description, price_ht, taxe, created_at, updated_at, stock, status, hidden) VALUES (:name, :description, :price_ht, :taxe, NOW(), NOW(), :stock, status, 0)");
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':price_ht', $data['price_ht']);
    $this->db->bind(':taxe', $data['taxe']);
    $this->db->bind(':stock', $data['stock']);
    $this->db->bind(':status', $data['status']);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Met à jours un produit dans la base de données
   *
   * @param array $data
   * @return boolean
   */
  public function update($data)
  {
    $this->db->query('UPDATE products SET name=:name, description=:description, price_ht=:price_ht, taxe=:taxe, updated_at=NOW(), stock=:stock,status=:status');
    $this->db->bind(':description', $data['description']);
    $this->db->bind(':price_ht', $data['price_ht']);
    $this->db->bind(':taxe', $data['taxe']);
    $this->db->bind(':created_at', $data['created_at']);
    $this->db->bind(':updated_at', $data['updated_at']);
    $this->db->bind(':stock', $data['stock']);
    $this->db->bind(':status', $data['status']);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Met à jours le stock d'un produit dans la base de données
   *
   * @param integer id
   * @param integer $quantity
   * @return boolean
   */
  public function update_stock($id, $quantity)
  {
    $this->db->query('UPDATE products SET quantity = :id WHERE id = :id');
    $this->db->bind(':quantity', $quantity);
    $this->db->bind(':id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * Eneleve un produit de la boutique
   *
   * @param integer $id
   * @return boolean
   */
  public function hideProduct($id)
  {
    $this->db->query("UPDATE products SET hidden = 1 WHERE id=:id");
    $this->db->bind(":id", $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Ajoute une image à un produit
   *
   * @param integer $product_id
   * @param string $picture
   * @return boolean
   */
  public function addPictureToProduct($product_id, $picture)
  {
    $this->db->query("INSERT INTO pictures (product_id, picture) VALUES (:product_id, :picture)");
    $this->db->bind(":product_id", $product_id);
    $this->db->bind(':picture', $picture);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
