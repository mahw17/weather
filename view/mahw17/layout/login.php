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
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

<?php if (isset($favicon)) : ?>
    <link rel="icon" href="<?= $favicon ?>">
<?php endif; ?>


<link rel="stylesheet" type="text/css" href="<?= asset("assets/lib/css/bootstrapLogin.css") ?>">


</head>
<body>

<!-- main -->
<?php if (regionHasContent("main")) : ?>
                <?php renderRegion("main") ?>
<?php endif; ?>


<?php foreach ($javascripts as $javascript) : ?>
<script async src="<?= asset($javascript) ?>"></script>
<?php endforeach; ?>

</body>
</html>
