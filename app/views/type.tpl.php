<?php 

$typeList = $viewData['listOfType'];

?>

<div class="container">
    <h2 class="container-fluid text-light center">Cliquez sur un type pour voir tous les Pokémon de ce type</h2>
</div>


<div class="container-fluid d-flex flex-column flex-sm-row flex-wrap justify-content-center"> 

        <?php foreach($typeList as $type):  ?>
            <div class="type container text-center w-sm-25 w-100 m-1 p-3 rounded text-light" style="background: <?= '#' . $type->getColor();?>"  >
                <a href="<?= $router->generate('pokemonList', ['id' => $type->getId()]); ?>"><?= $type->getName();  ?></a>
            </div>
        <?php endforeach; ?>
</div>