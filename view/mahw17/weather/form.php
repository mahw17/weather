<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */



?>

      <!-- <div class="container"> -->
        <div class="row">
          <div class="span12">
              <h1>Hämta väderinformation</h1>
              <form role="form" method="post" action="#">
                <div class="form-group">
                    <div class="weather_input">
                        <label for="IP-adress">Baserat på IP-adress</label>
                        <input type="text" class="form-control" name="ip" value="<?= $currentIp ?>">
                    </div>
                    <div class="weather_radio">
                        <input type="radio" name="weather" value="forecast" checked> Prognos<br>
                        <input type="radio" name="weather" value="history"> Historik<br>
                    </div>
                    <div class="">
                        <label for="coord">eller baserat på koordinater (Lat,Long)</label>
                        <input type="text" class="form-control" name="coord" placeholder="55.12,18.36">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
