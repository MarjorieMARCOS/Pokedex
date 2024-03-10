<?php 

$pokemon = $viewData['pokemon'];
$listType = $viewData['listOfType'];
?>


<div class="container-fluid m-3 p-2">

<h2 class="container-fluid text-light center">Détail de <?= $pokemon->getName();  ?></h2>

        <div class="d-flex ">
            <img class="img-fluid w-25" src="/assets/img/<?= $pokemon->getNumber();  ?>.png" alt="<?= $pokemon->getName();  ?>">

            <div class="container-fluid rounded-2 container_detail p-4 w-auto">
                <h3 class="text-light">#<?= $pokemon->getNumber() . " " . $pokemon->getName(); ?></h3> 
                <div class="container-fluid d-flex justify-content-start" >
                        <?php foreach($listType as $type): ?>
                            <div class="rounded text-light p-2 m-2" style="background: <?= '#' . $type->getColor();?>" > 
                                <?= $type->getName(); ?> 
                            </div>
                        <?php endforeach; ?>
                </div>


                <h4 class="text-light " >Statistiques</h4>
                <div class="d-flex justify-content-around">
                        <div class="d-flex flex-column flex-fill">  
                            <span class="text-light" >PV</span>
                            <span class="text-light" >Attaque</span>
                            <span class="text-light" >Défense</span>
                            <span class="text-light" >Attaque Spé.</span>
                            <span class="text-light" >Défense Spé.</span>
                            <span class="text-light" >Vitesse</span>
                        </div>


                        <div class="d-flex flex-column flex-fill">
                            <span class="text-light" ><?= $pokemon->getHp();  ?></span>
                            <span class="text-light" ><?= $pokemon->getAttack();  ?></span>
                            <span class="text-light" ><?= $pokemon->getDefense();  ?></span>
                            <span class="text-light" ><?= $pokemon->getSpe_attack();  ?></span>
                            <span class="text-light" ><?= $pokemon->getSpe_defense();  ?></span>
                            <span class="text-light" ><?= $pokemon->getSpeed();  ?></span>
                        </div>


                        <div class="d-flex flex-column flex-fill">
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getHp();  ?>%;"></div>
                            </div>
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getAttack();  ?>%;"></div>
                            </div>
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getDefense();  ?>%;"></div>
                            </div>
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getSpe_attack();  ?>%;"></div>
                            </div>
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getSpe_defense();  ?>%;"></div>
                            </div>
                            <div class="jauge">
                                <div class="progression" style="width: <?= $pokemon->getSpeed();  ?>%;"></div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
