<?php
require_once __DIR__ . "/classes/Product.php";
require_once __DIR__ . "/classes/Food.php";

$product = new Product("Collare", "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.thekill.it%2Fpellecuoio%2F2202-collare-cuoio-artigianale-marrone.html&psig=AOvVaw25wkvCOCagsZHA-P7XawS6&ust=1674664837455000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNjr5ujS4PwCFQAAAAAdAAAAABAT", 4.99);
$food = new Food("Cibo in scatola", "https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.petingros.it%2Fprodotti-disattivati-mini-adult-light-cane-royal-canin-p-12972.html&psig=AOvVaw03iKHYyrD_0bF5gKUOY1HY&ust=1674667734385000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCIC8pc7d4PwCFQAAAAAdAAAAABAG", 1.79);
$food->setExpiration("31/01/2023");

// array per duplicare le card
$products = [
    $product,
    $food
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
                        <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                        <p class="card-text"><?php echo $product->getPrice(); ?>€</p>
                        <!-- Metodo per far passare la scadenza dove possibile -->
                        <?php if(method_exists($product, 'getExpiration') ) { ?>
                        <p>Scadenza: <?php echo $product->getExpiration(); ?></p>
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