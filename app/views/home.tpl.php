<?php 

$pokemonList = $viewData['pokemonList'];

?>

<body>
    <div class="container-fluid d-flex flex-row flex-wrap justify-content-center">
    <?php foreach($pokemonList as $key => $pokemon) :  ?>
      <div class="container d-flex flex-column container_pokemon justify-content-center align-items-center w-25 m-2">
          <img class="img-fluid" src="/assets/img/<?= $pokemon->getNumber();  ?>.png" alt="<?= $pokemon->getName() ?>"> 
        <a href="<?= $router->generate('pokemon', ['id' => $pokemon->getId()]) ?>">    
          <h2>#<?= $pokemon->getId() . " " . $pokemon->getName() ?></h2>
        </a>

      </div>
    <?php endforeach;   ?>
    </div>  
</body>

