<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

?>
<aside>
    <div class="widget">
        <?php
        foreach ($toc as $route => $item) {
            $text = $item["title"];

            if ($item["sectionHeader"] === true) {
                echo "</ul><h4 class='rheading'>" . $item["title"] . "<span></span></h4><ul class='cat'>";
            } elseif ($item["title"] !== "Introduktion") {
                echo "<li><a href=\"" . url($route) . "\">$text</a></li>";
            }
        }
        ?>
    </div>
</aside>
