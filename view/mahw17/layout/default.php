<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?? "Ramverk1" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Fav icons -->
<?php if (isset($favicon)) : ?>
    <link rel="icon" href="<?= $favicon ?>">
<?php endif; ?>

<!-- Touch icons -->
<?php foreach ($touchicons as $touchicon) : ?>
    <link rel="apple-touch-icon-precomposed" sizes="<?= $touchicon['size'] ?>" href="<?= $touchicon['href'] ?>">
<?php endforeach; ?>


<!-- Style sheets -->
<?php foreach ($stylesheets as $stylesheet) : ?>
<link rel="stylesheet" type="text/css" href="<?= asset($stylesheet) ?>">
<?php endforeach; ?>


</head>
<body>
    <div id="wrapper">


<!-- Navbar
================================================== -->
<?php if (regionHasContent("navbar")) : ?>
        <header>
            <div class="navbar navbar-static-top">
                <div class="navbar-inner">
                    <div class="container">

                        <!-- logo -->
                        <?php if (isset($logo)) : ?>
                            <div class="logo">
                                <a href=""><img src="<?= asset($logo) ?>" alt="" /></a>
                            </div>
                        <?php endif; ?>
                        <!-- end logo -->

                        <!-- top menu -->
                        <div class="navigation">
                            <?php renderRegion("navbar") ?>
                        </div>
                        <!-- end menu -->

                    </div>
                </div>
            </div>
        </header>
<?php endif; ?>


<!-- Intro
================================================== -->
<?php if (regionHasContent("intro")) : ?>
<section id="intro">

      <div class="container">
        <div class="row">
          <div class="span12">
                <?php renderRegion("intro") ?>
          </div>
        </div>
      </div>
</section>
<?php endif; ?>

<!-- Subintro
================================================== -->
<?php if (regionHasContent("subintro")) : ?>
    <section id="subintro">
      <div class="container">
        <div class="row">
                <?php renderRegion("subintro") ?>
          </div>
        </div>
      </section>
<?php endif; ?>


<!-- Main content without sidebar
================================================== -->
<?php if (regionHasContent("main") && !regionHasContent("sidebar")) : ?>
    <section id="main">
      <div class="container">
            <?php renderRegion("main") ?>
      </div>
    </section>
<?php endif; ?>

<!-- Main content with sidebar
================================================== -->
<?php if (regionHasContent("main") && regionHasContent("sidebar")) : ?>
    <section id="main">
      <div class="container">
          <div class="row">
              <div class="span4">
                  <?php renderRegion("sidebar") ?>
              </div>
              <div class="span8">
                <!-- start article full post -->
                <article class="blog-post">
                    <?php renderRegion("main") ?>
                </article>
              </div>
          </div>
      </div>
    </section>
<?php endif; ?>



<?php if (regionHasContent("footer")) : ?>
    <!-- Footer
 ================================================== -->
    <footer class="footer">
        <?php renderRegion("footer") ?>
    </footer>
<?php endif; ?>

<!-- end wrapper -->
<a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>
  </div>

<!-- Javascripts -->
<?php foreach ($javascripts as $javascript) : ?>
<script src="<?= asset($javascript) ?>"></script>
<?php endforeach; ?>

</body>
</html>
