<nav class="navbar navbar-toggleable-md fixed-top">
    <div class="container">

        <!-- Mobile Menu Toggle -->
        <button class="btn btn-default navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>

        <!-- Branding -->
        <a class="brand navbar-brand scroll" data-section="hey" href="#hey" target="_self">
            <span>Ben Miles</span>
            <!-- <?php echo $siteLogo; ?> -->
        </a>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <?php
                    echo menu_item( "Portfolio", "portfolio" );
                    echo menu_item( "About", "about" );
                    echo menu_item( "Contact", "footer" );
                ?>
            </ul>
        </div>

    </div>
</nav>
