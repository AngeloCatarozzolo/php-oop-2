<?php

require_once __DIR__ . "/classes/Product.php";
require_once __DIR__ . "/classes/Food.php";
require_once __DIR__ . "/classes/Category.php";
require_once __DIR__ . "/classes/Toy.php";

// categoria Cane
$dog = new Category("Cane", "<i class=\"fa-solid fa-dog\"></i>");
// categoria Gatto
$cat = new Category("Gatto", "<i class=\"fa-solid fa-cat\"></i>");
// prodotto
$product = new Product("Collare", "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.thekill.it%2Fpellecuoio%2F2202-collare-cuoio-artigianale-marrone.html&psig=AOvVaw25wkvCOCagsZHA-P7XawS6&ust=1674664837455000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNjr5ujS4PwCFQAAAAAdAAAAABAT", 4.99, $cat);
// cibo
$food = new Food("Cibo in scatola", "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.petingros.it%2Fprodotti-disattivati-mini-adult-light-cane-royal-canin-p-12972.html&psig=AOvVaw03iKHYyrD_0bF5gKUOY1HY&ust=1674667734385000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCIC8pc7d4PwCFQAAAAAdAAAAABAG", 1.79, $dog);
$food->setExpiration("31/01/2023");
// giocattoli
$toy = new Toy("Osso di gomma", "https://www.google.com/url?sa=i&url=https%3A%2F%2Filcerchiodeipet.com%2Fit%2Fgiochi-e-accessori-divertenti-per-il-tuo-cane-favoriscono-intelligenza-e-migliorano-la-socializzazione%2F72-198-gioco-per-cani-a-forma-di-osso-in-plastica-colorata-geobone-varie-misure-colori.html&psig=AOvVaw2JuxES61mi9negXZzd_nL0&ust=1674673015848000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCPCm58nx4PwCFQAAAAAdAAAAABAF", 10, $dog );
$toy->setMaterial("gomma");

// array per duplicare le card
$products = [
    $product,
    $food,
    $game
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>ShopOop-2</title>
</head>
<body>
    <h1>Sho(o)p</h1>
    <div class="container">
        <div class="row">
            <?php foreach($products as $product) { ?>
            <div class="col-4">
                <div class="card">
                    <img src="<?php echo $product->getImage(); ?>" class="card-img-top" alt="<?php echo $product->getName(); ?>">
                    <div class="card-body">
                        <!-- Richiama l'icona -->
                        <div>
                            <?php echo $product->getCategory()->getIcon(); ?>
                        </div>
                        <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                        <p class="card-text"><?php echo $product->getPrice(); ?>€</p>
                        <!-- Metodo per far passare la scadenza dove possibile -->
                        <?php if(method_exists($product, 'getExpiration') ) { ?>
                        <p>Scadenza: <?php echo $product->getExpiration(); ?></p>
                        <?php } ?>
                        <?php if(method_exists($product, 'getMaterial') ) { ?>
                        <p>Materiale: <?php echo $product->getMaterial(); ?></p>
                        <?php } ?>
                        <a href="#" class="btn btn-primary">Compra</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
</body>
</html>