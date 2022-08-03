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
  public function getProducts($hidden = 0)
  {
    $this->db->query("SELECT * FROM Products where hidden=:hidden ORDER BY product_id DESC");
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
    $this->db->query("SELECT * FROM Products WHERE product_id=:product_id ");
    $this->db->bind(':product_id', $id);
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
    $this->db->query("INSERT INTO Products(name, description, price_ht, taxe, created_at, updated_at, stock, status, hidden) VALUES (:name, :description, :price_ht, :taxe, NOW(), NOW(), :stock, status, 0)");
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
    $this->db->query('UPDATE Products SET name=:name, description=:description, price_ht=:price_ht, taxe=:taxe, updated_at=NOW(), stock=:stock, status=:status');
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
    $this->db->query('UPDATE Products SET stock = :quantity WHERE product_id = :product_id');
    $this->db->bind(':quantity', $quantity);
    $this->db->bind(':product_id', $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * Enlève un produit de la boutique
   *
   * @param integer $id
   * @return boolean
   */
  public function hideProduct($id)
  {
    $this->db->query("UPDATE Products SET hidden = 1 WHERE product_id=:product_id");
    $this->db->bind(":product_id", $id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function getPictures($hidden = 0)
  {
    $this->db->query("SELECT * FROM Pictures where hidden=:hidden GROUP BY product_id ORDER BY picture_id DESC");
    $this->db->bind(':hidden', $hidden);
    return $this->db->resultSet();
  }
  public function getPicturesById($product_id)
  {
    $this->db->query("SELECT * FROM Pictures WHERE product_id = $product_id AND hidden = 0");
    return $this->db->resultSet();
  }
  /**
   * Ajoute une image à un produit
   *
   * @param integer $product_id
   * @param string $picture
   * @return boolean
   */
  public function addPictureToProduct($product_id, $src, $principal = 0)
  {
    $this->db->query("INSERT INTO Pictures (product_id, src, principal) VALUES (:product_id, :src, :principal)");
    $this->db->bind(":product_id", $product_id);
    $this->db->bind(':src', $src);
    $this->db->bind(':principal', $principal);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function editPrincipalPicture($product_id, $picture_id)
  {
    $this->db->query('UPDATE Pictures SET principal = 0 WHERE product_id =:product_id;UPDATE Pictures SET principal =1 WHERE picture_id =:picture_id;');
    $this->db->bind(':product_id', $product_id);
    $this->db->bind(':picture_id', $picture_id);
    if ($this->db->execute()) {
      return true;
    } else return false;
  }
  public function removePicture($picture_id)
  {
    $this->db->query("UPDATE Pictures SET hidden = 1 WHERE picture_id=:picture_id");
    $this->db->bind(":picture_id", $picture_id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
