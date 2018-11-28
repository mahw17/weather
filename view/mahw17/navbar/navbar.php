<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Get framework
$session    = $this->di->get("session");

// Get session variables
$navbar     = $session->get('navbar', 'home');
$login      = $session->has('user', false);

?>

<nav>
      <ul class="nav topnav">
        <li class="<?= $navbar == 'home' ? 'active' : ''; ?>">
          <a href="<?= url("") ?>"><i class="icon-home"></i> Hem </a>
        </li>
        <li class="dropdown <?= $navbar == 'report' ? 'active' : ''; ?>">
          <a href="#"><i class="icon-leaf"></i> Redovisning <i class="icon-angle-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="<?= url("report/kmom01") ?>">KMOM01</a></li>
            <li><a href="<?= url("report/kmom02") ?>">KMOM02</a></li>
            <li><a href="<?= url("report/kmom03") ?>">KMOM03</a></li>
            <li><a href="<?= url("report/kmom04") ?>">KMOM04</a></li>
            <li><a href="<?= url("report/kmom05") ?>">KMOM05</a></li>
            <li><a href="<?= url("report/kmom06") ?>">KMOM06</a></li>
            <li><a href="<?= url("report/kmom10") ?>">KMOM07-10</a></li>
          </ul>
        </li>
        <li class ="<?= $navbar == 'about' ? 'active' : ''; ?>">
            <a href="<?= url("about") ?>"><i class="icon-briefcase"></i> Om </a>
        </li>
        <li class ="<?= $navbar == 'tool' ? 'active' : ''; ?>">
            <a href="<?= url("tool") ?>"><i class="icon-wrench"></i> Verktyg </a>
        </li>
        <li class ="<?= $navbar == 'weather' ? 'active' : ''; ?>">
            <a href="<?= url("weather") ?>"><i class="icon-umbrella"></i> Väder </a>
        </li>
        <li class="dropdown <?= $navbar == 'api' ? 'active' : ''; ?>">
            <a href="<?= url("#") ?>"><i class="icon-exchange"></i> Api <i class="icon-angle-down"></i></a>
            <ul class="dropdown-menu" style="display: none;">
                <li class="dropdown"><a href="#">Väder <i class="icon-angle-right"></i></a>
                    <ul class="dropdown-menu sub-menu" style="display: none;">
                        <li><a href="<?= url("api/weatherforecast") ?>">Prognos</a></li>
                        <li><a href="<?= url("api/weatherhistory") ?>">Historik</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="dropdown <?= $navbar == 'login' ? 'active' : ''; ?>">
          <a href="<?= url("user/login") ?>"><i class="icon-user" style="color:<?= $login ? 'green' : 'red' ?>"></i></a>
          <ul class="dropdown-menu">
                <?= !$login ? "<li><a href=".url("user/login").">Logga in</a></li>" : "<li><a href=".url("user/logout").">Logga ut</a></li>" ?>
          </ul>
        </li>
      </ul>
</nav>
