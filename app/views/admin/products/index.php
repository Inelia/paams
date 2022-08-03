<?php require APPROOT . '/views/inc/head.php'; ?>

<main>
  <h1><?php echo $data['title'] ?></h1>
  <a href="<?= URLROOT . '/admin/addProduct' ?>" type="button" class="btn__link" data-toggle="modal" data-target="#modal__add" aria-haspopup="dialog" aria-expanded="false" id="addProduct">Ajouter un produit</a>
  <aside>
    <?php require APPROOT . '/views/inc/admin_sidebar.php' ?>
  </aside>
  <section>
    <table>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Prix HT</th>
          <th>Stock</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $products = $data['products']; ?>
        <?php foreach ($products as $product) :  ?>

          <tr>
            <td><?= $product->name; ?></td>
            <td><?= number_format(($product->prix_ht / 100), 2, ",", " "); ?> €</td>
            <td><?= $product->stock; ?></td>
            <td><a href="#" class="btn__link">Editer</a> <button type="button" class="btn" data-toggle="modal" data-target="#deleteProduct" aria-haspopup="dialog" aria-expanded="false">Supprimer un produit</button></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>



  <!-- Modal -->
  <div class="modal" id="deleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer un produit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous vraiment supprimer ce produit ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Oui</button>
        </div>
      </div>
    </div>
  </div>

</main>
<?php require APPROOT . '/views/inc/end_page.php'; ?>