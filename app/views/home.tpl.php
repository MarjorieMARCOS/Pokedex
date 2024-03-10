<?php 

$pokemonList = $viewData['pokemonList'];

?>

<body>
    <div class=" container-fluid d-flex flex-column flex-md-row flex-wrap justify-content-center">
    <?php foreach($pokemonList as $key => $pokemon) :  ?>
        <a href="<?= $router->generate('pokemon', ['id' => $pokemon->getId()]) ?>"> 
          <div class=" container d-flex flex-row container_pokemon justify-content-center align-items-center p-2 w-100 w-sm-25">
              <img class=" img-thumbnail m-0 m-sm-3" src="/assets/img/<?= $pokemon->getNumber();  ?>.png" alt="<?= $pokemon->getName() ?>"> 
                <h2 class="text-light">#<?= $pokemon->getId() . " " . $pokemon->getName() ?></h2>
          </div>
        </a>
    <?php endforeach;   ?>
    </div>  
</body>

