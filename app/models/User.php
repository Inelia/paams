<?php

class User
{
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  /**
   * Récupère un utilisateur par son email
   *
   * @param string $email
   * @return boolean
   */
  public function findUserByEmail($email): bool
  {
    $this->db->query("SELECT * FROM Users WHERE email = :email");
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    if ($this->db->rowCount() > 0) return true;
    else return false;
  }
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM Users WHERE email = :email");
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) return $row;
    else return false;
  }
  /**
   * Insertion des utilisateurs dans la base de données
   *
   * @param [type] $data
   * @return boolean
   */
  public function register($data)
  {
    $this->db->query("INSERT INTO Users(civility, first_name, last_name, email, password, birthdate, created_at) VALUES(:civility, :first_name, :last_name, :email, :password, :birthdate, NOW())");
    $this->db->bind(':civility', $data['civility']);
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':birthdate', $data['birthdate']);
    if ($this->db->execute()) return true;
    else return false;
  }
}
