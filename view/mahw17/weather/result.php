<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>

<div class="container">

    <div class="row">
        <div class="span12">
            <h1><?= $weatherType === "forecast" ? "Väderprognos" : "Väderhistorik" ?></h1>
            <p>(Latitude:  <?= $weatherType === "forecast" ? $weatherInfo->latitude : $weatherInfo[0]->latitude ?> / Longitude:  <?= $weatherType === "forecast" ? $weatherInfo->longitude : $weatherInfo[0]->longitude ?>)</p>
        </div>
    </div>

    <div class="row">
        <div class="span7">
            <?php if ($weatherType === "forecast") : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Väderprognos</th>
                        </tr>
                    </thead>
                <?php foreach ($weatherInfo->daily->data as $day) : ?>
                    <tbody>
                        <tr>
                            <td><?= date("Y-m-d", $day->time) ?></td>
                            <td><?= $day->summary ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
                </table>
            <?php endif; ?>

            <?php if ($weatherType === "history") : ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Väderhistorik</th>
                        </tr>
                    </thead>
                <?php foreach ($weatherInfo as $day) : ?>
                    <tbody>
                        <tr>
                            <td><?= date("Y-m-d", $day->currently->time) ?></td>
                            <td><?= $day->currently->summary ?></td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>

        <div class="span5">
            <a onclick="ipMap.initMap(<?= $weatherType === "forecast" ? $weatherInfo->latitude : $weatherInfo[0]->latitude ?>, <?= $weatherType === "forecast" ? $weatherInfo->longitude : $weatherInfo[0]->longitude ?>)" class="btn btn-primary">Kartvy</a>
            <a href="<?= url("weather") ?>" class="btn btn-primary">Tillbaka</a>
            <div id="mapdiv"></div>
        </div>
    </div>
</div>
