<?php
/*
TODO: linkify the animated list items to portfolio subsections
TODO: work/edu timelines: d3.js + gantt chart: https://github.com/dk8996/Gantt-Chart
TODO: SVG logo
TODO: menubar font gray(?) on load, fade to black on scroll
TODO: SEO
TODO: mobile, intro, increase vertical spacing between elements. social icons should be at the bottom, account for address bar
TODO: smaller thumbnails for mobile
TODO: normalize gallery item heights to prevent big gaps(?) still trying to decide if this is actually better
TODO: multiple image support for lightbox
TODO: image traversal (? <-- PREV and NEXT --> ) for lightbox
TODO: make gallery thumbanils and modal display images backgrounds for better centering/scaling. set heights/widths as needed
TODO: Favicon
TODO: Unify styles between buttons, btn-toolbars and navs
*/

// error_reporting(0);
require 'assets/data.php';
require 'assets/functions.php';

// load content
require 'core/head.php';
require 'core/nav.php';
require 'core/section-intro.php';
require 'core/section-portfolio.php';
require 'core/section-about.php';
require 'core/modal.php';
require 'core/foot.php';

?>
