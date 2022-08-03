<article id="modal__add" class="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <section class="modal__content">
      <article class="modal__header">
        <h5 class="modal__title" id="modalLabel">Ajouter un produit</h5>
        <button type="button" class="btn--close" data-dismiss="modal" aria-label="Close">&times;</button>
        <!-- &times; -->
      </article> <!-- modal__header -->
      <article class="modal__body">
        <form action="" method="POST" enctype="multipart/form-data" role="form">
          <div>
            <label for="product_name">Nom du produit</label>
            <input type="text" name="product_name" id="product_name" placeholder="Nom du produit" required>
          </div>
          <div>
            <label for="price_ht">Prix hors taxe</label>
            <input type="number" name="price_ht" id="price_ht" placeholder="Prix hors taxe" required>
          </div>
          <div>
            <label for="img">Images du produit</label>
            <input type="file" name="product_img" id="product_img" accept="image/png, image/jpeg">
          </div>
          <div>
            <label for="descriptions">Description du produit</label>
            <textarea id="descriptions" name="descriptions" placeholder="Description du produit"></textarea>
          </div>

          <div>
            <label for="color">Couleur principal du produit</label>
            <select name="color" id="color">
              <option value="blue">Bleu</option>
              <option value="green">vert</option>
              <option value="yellow">Jaune</option>
              <option value="red">Rouge</option>
              <option value="orange">Orange</option>
              <option value="purple">Violet</option>
              <option value="black">Noir</option>
              <option value="white">Blanc</option>
              <option value="transparent">Transparent</option>
            </select>
            <br>
            <br>
            <br><br><br><br><br>
          </div>
          <div>
            <label for=""></label>
            <input type="text">
          </div>

        </form>
      </article> <!-- modal__body -->

    </section>
  </div>
</article>