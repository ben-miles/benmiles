<?php
/*
TODO: linkify the animated list items to portfolio subsections?
TODO: work/edu timelines? d3.js + gantt chart: https://github.com/dk8996/Gantt-Chart
TODO: SVG logo?
TODO: normalize gallery item heights to prevent big gaps?
TODO: Scrollspy for main nav?
TODO: SEO
TODO: smaller thumbnails for mobile
TODO: image traversal ( <-- PREV and NEXT --> ) for lightbox
TODO: multiple image support for lightbox
    TODO: update data src, inc multiple images for some gallery items,
    TODO: troubleshoot gallery output function
    TODO: make gallery thumbnails and modal display images as backgrounds for better centering/scaling. set heights/widths as needed
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
