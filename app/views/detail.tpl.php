<?php 

$pokemon = $viewData['pokemon'];
dump($pokemon);
$listType = $viewData['listOfType'];
dump($listType);
?>


<div class="container-fluid">

<h2 class="text-light">Détail de <?= $pokemon->getName();  ?></h2>

        <div>
            <img class="img-fluid" src="/assets/img/<?= $pokemon->getNumber();  ?>.png" alt="<?= $pokemon->getName();  ?>">

            <div>
                <h3 class="text-light">#<?= $pokemon->getNumber() . " " . $pokemon->getName(); ?></h3> 
                <div class="container-fluid d-flex justify-content-start" >
                        <?php foreach($listType as $type): ?>
                            <div class="rounded text-light p-2 m-2" style="background: <?= '#' . $type->getColor();?>" > 
                                <?= $type->getName(); ?> 
                            </div>
                        <?php endforeach; ?>
               
                </div>

                <div>
                    <h4>Statistiques</h4>
                    <span>PV</span>
                    <span>Attaque</span>
                    <span>Défense</span>
                    <span>Attaque Spé.</span>
                    <span>Défense Spé.</span>
                    <span>Vitesse
                    </span>
                </div>

            </div>



        </div>
