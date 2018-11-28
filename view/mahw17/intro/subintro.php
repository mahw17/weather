<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

$intro_path = isset($intro_path) ? $intro_path : $this->di->get("session")->get('subintro', 'saknas..');

?>



<!-- Subintro
================================================== -->
      <div class="span8">
        <ul class="breadcrumb">
          <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
          <li><a href="#"><?= $intro_mount ?></a><i class="icon-angle-right"></i></li>
          <li class="active"><?= $intro_path ?></li>
        </ul>
      </div>
