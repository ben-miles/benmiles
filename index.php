<?php
// TODO: linkify the animated list items to portfolio subsections
// TODO: work/edu timelines: d3.js + gantt chart: https://github.com/dk8996/Gantt-Chart
// TODO: mobile, fixed background in about section needs to scroll/position better
// TODO: mobile, about: timeline needs to go full width
// TODO: SVG logo
// TODO: menubar font gray(?) on load, fade to black on scroll
// TODO: SEO
// TODO: Break sections out into individual php files
// TODO: mobile, intro, increase vertical spacing between elements. social icons should be at the bottom, account for address bar
// TODO: clear out unused images
// TODO: smaller thumbnails for mobile
// TODO: normalize gallery item heights to prevent big gaps



// error_reporting(0);
require 'assets/data.php';
require 'assets/functions.php';
require 'core/head.php';
require 'core/nav.php';

$output = '';
foreach( $arrayPortfolio as $arrayPortfolioPiece ){
    $output .= displayPortfolioPiece( $arrayPortfolioPiece );
}
?>

<!-- intro -->
<section id="hey">
    <div class="container-fluid">
        <div class="row whats-up">
            <div class="col-xs-12 col-md-6 col-xl-4 offset-md-6">
                <div class="col-inner">
                    <h1 class="animated" data-animation="fadeInUp">Hey.</h1>
                    <h1 class="animated" data-animation="fadeInUp" style="animation-delay: 1s;">I'm Ben.</h2>
                    <div class="titles scroll animated" data-animation="fadeInUp" style="animation-delay: 1.2s;">
                        <ul>
                            <li>Graphic Designer.</li>
                            <li>Web Developer.</li>
                            <li>DIY Enthusiast.</li>
                        </ul>
                    </div>
                    <button class="btn btn-default animated scroll"  data-animation="fadeInUp" style="animation-delay: 1.3s;" data-section="portfolio">
                        <i class="fa fa-angle-down bounce" aria-hidden="true"></i>
                    </button>
                    <ul class="social list-unstyled list-inline">
                        <li class="list-inline-item facebook animated" data-animation="fadeInUp" style="animation-delay: 1.7s;">
                            <a href="https://www.facebook.com/bcgm3/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item twitter animated" data-animation="fadeInUp" style="animation-delay: 1.8s;">
                            <a href="https://twitter.com/bcgm3" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item instagram animated" data-animation="fadeInUp" style="animation-delay: 1.9s;">
                            <a href="https://www.instagram.com/bencgmiles/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item codepen animated" data-animation="fadeInUp" style="animation-delay: 2s;">
                            <a href="https://codepen.io/benmiles/" target="_blank" title="CodePen"><i class="fa fa-codepen"></i></a>
                        </li>
                        <li class="list-inline-item github animated" data-animation="fadeInUp" style="animation-delay: 2.1s;">
                            <a href="https://github.com/ben-miles" target="_blank" title="GitHub"><i class="fa fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / intro -->

<!-- port'o'folio (a kid in middle school said it like that once and everybody laughed) -->
<section id="portfolio">

    <!-- section-header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="animated" data-animation="fadeIn">Portfolio</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / section-header -->

    <!-- section-body -->
    <div class="section-body">
        <div class="container">

            <!-- controls -->
            <div class="row" id="row-buttons">
                <div class="col">
                    <div class="btn-toolbar" role="toolbar" aria-label="Gallery Toolbar">
                        <div class="btn-group btn-group-filter animated" role="group" aria-label="Gallery Filter Buttons" data-animation="fadeIn" style="animation-delay: 0.2s;">
                            <span class="input-group-addon">Show:&nbsp;</span>
                            <button type="button" class="btn btn-secondary active" data-filter=".featured">Featured</button>
                            <button type="button" class="btn btn-secondary" data-filter=".design">Design</button>
                            <button type="button" class="btn btn-secondary" data-filter=".development">Development</button>
                            <button type="button" class="btn btn-secondary" data-filter=".diy">DIY</button>
                            <button type="button" class="btn btn-secondary" data-filter="*">All</button>
                        </div>
                        <div class="btn-group btn-group-sort animated" role="group" aria-label="Gallery Sort Buttons" data-animation="fadeIn" style="animation-delay: 0.2s;">
                            <span class="input-group-addon">Sort:&nbsp;</span>
                            <!-- <button type="button" class="btn active btn-secondary" data-sort="original-order">Original</button> -->
                            <button type="button" class="btn btn-secondary active" data-sort="date">Date</button>
                            <button type="button" class="btn btn-secondary" data-sort="title">Title</button>
                            <button type="button" class="btn btn-secondary" id="shuffle">Random</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / controls -->

            <!-- gallery -->
            <div class="row animated" id="gallery" data-animation="fadeIn" style="animation-delay: 0.4s;">
                <?php echo $output; ?>
            </div>
            <!-- / gallery -->

        </div>
    </div>
    <!-- / section-body -->

</section>
<!-- / port'o'folio -->

<!-- about -->
<section id="about">

    <!-- header -->
    <div class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <h2 class="animated" data-animation="fadeInUp">About</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- / header -->

    <!-- content -->
    <div class="section-body">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <div class="animated card about" style="animation-delay: .1s;" data-animation="fadeInUp">
                        <div class="card-block">
                            <!-- first person, third person? this is always wierd. probably first, keep the tone from the intro -->
                            <p class="card-text">I'm an experienced graphic designer and web developer, and avid collector of artsy-type hobbies. Born and raised in the Sunshine State, and currently based out of Florida's Space Coast. Driven by a love for learning, I am always trying new methods and media.</p>
                            <p class="card-text">Presently working for furryLogic in historic Cocoa Village. Outside of work, I spend most of my time screen printing, making custom tables and lamps, and reading (almost done with A Clash of Kings).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-7 col-xl-8">
                    <div class="svg-row">
                        <?php echo displaySVG( 'HTML 5' ); ?>
                        <?php echo displaySVG( 'CSS 3', .1 ); ?>
                        <?php echo displaySVG( 'JavaScript', .2 ); ?>
                        <?php echo displaySVG( 'PHP', .3 ); ?>
                        <?php echo displaySVG( 'mySQL', .4 ); ?>
                    </div>
                    <div class="svg-row">
                        <?php echo displaySVG( 'Bootstrap', .5 ); ?>
                        <?php echo displaySVG( 'jQuery', .6 ); ?>
                        <?php echo displaySVG( 'Joomla!', .7 ); ?>
                        <?php echo displaySVG( 'WordPress', .8 ); ?>
                    </div>
                    <div class="svg-row">
                        <?php echo displaySVG( 'phpStorm', .9 ); ?>
                        <?php echo displaySVG( 'Photoshop', 1 ); ?>
                        <?php echo displaySVG( 'Illustrator', 1.1 ); ?>
                        <?php echo displaySVG( 'inDesign', 1.2 ); ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <ul class="timeline">

                        <li class="timeline-inverted">
                            <div class="timeline-badge success">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://furrylogic.net/" target="_blank">furryLogic</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Nov. 2015 - Present</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Cocoa Village, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Web Developer, Frontend, Design</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge success">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://pipbrevard.com/" target="_blank">PIP Printing & Marketing</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Feb. 2012 - Nov. 2015</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Graphic Design, Pre-Press, Large-Format Production & Installation</p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge warning">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://spacecoast.coupons/" target="_blank">Space Coast Coupons</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Nov. 2011 - Feb. 2012</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Graphic Designer, Web Support</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge success">
                                <i class="fa fa-building" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://bcgm3.com/" target="_blank">BCGM3 Studios</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;Apr. 2010 - Feb. 2012</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Merritt Island, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Owner, Graphic Designer, Web Designer</p>
                                </div>
                            </div>
                        </li>

                        <li class="timeline-inverted">
                            <div class="timeline-badge danger">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://svad.cah.ucf.edu/" target="_blank">University of Central Florida</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2006 - 2009</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Orlando, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Bachelors of Fine Arts in Graphic Design</p>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="timeline-badge danger">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <div class="timeline-panel animated" data-animation="fadeInUp">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title"><a href="http://easternflorida.edu/" target="_blank">Eastern Florida State College</a></h4>
                                    <p>
                                        <small class="text-muted"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;2004 - 2006</small>
                                        <small class="text-muted"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Cocoa, FL</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Associates of Arts with a Concentration in Design</p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- / content -->
</section>
<!-- / about -->

<!-- modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="image col-md-8"></div>
                    <div class="info col-md-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="header">
                                    <h2></h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="meta">
                                    <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;</span>
                                </div>
                                <!--div class="thumbs col-12">
                                <div class="thumb" style="background-image: url(data:image/jpeg;base64,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);"></div>
                                <div class="thumb" style="background-image: url(data:image/jpeg;base64,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);"></div>
                                <div class="thumb" style="background-image: url(data:image/jpeg;base64,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);"></div>
                            </div-->
                                <div class="body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / modal -->

<!-- / portfolio -->

<!-- Foot -->
<?php
require 'core/foot.php';
?>
