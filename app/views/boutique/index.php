<?php require_once APPROOT . '/views/inc/head.php';
$products = $data['products'];
$pictures = $data['pictures'];
?>
<main>
  <h1><?= $data['title'] ?></h1>

  <?php foreach ($products as $product) :
    foreach ($pictures as $pict) {
      if ($pict->principal == 1 and $pict->product_id == $product->product_id) {
        $product->src = $pict->src;
        var_dump($pict);
      }
    }
  ?>
    <article class="card">
      <img src="<?= IMGROOT . '/' . $product->src ?>" class="card__img-top" alt="<?= $product->name ?>">
      <div class="card__body">
        <h5 class="card__title"><?= $product->name ?></h5>
        <p class="description"><?= $product->description ?></p>
        <p class="card__price"><?= number_format(($product->price_ht * $product->taxe / 100), 2, ',', ' ') ?>&nbsp;€</p>
        <a href="<?= URLROOT; ?>/products/show/<?= $product->id ?>" class="btn">Voir le produit</a>
      </div>
    </article>
  <?php
  endforeach; ?>
</main>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>