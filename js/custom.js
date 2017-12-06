/* ON READY... ****************************************************************/
$( document ).ready( function(){

    // Negate mobile browser addressbar maybe?
    // seems to be resisting my charms
    // if( $( window ).width() < 900 ){
    // if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    //     $( window ).scrollTop( 50 );
    // }

    // Apply animations
    // applyAnimations();

} );

/* ON SCROLL... ***************************************************************/

var opacityMin = 0.25, // initial background-color-opacity for nav
    opacityMax = 1, // background-color-opacity for nav at bottom of Intro section
    rgbMin = 255, // initial rgb() color for nav items
    rgbMax = 119; // rgb() color for nav items at bottom of Intro section

$( window ).scroll( function( e ){

    // Apply animations
    applyAnimations();

    // Determine scroll
    var pxToTop = $( this ).scrollTop(), // px between top of viewport and top of document ( 0 = scrolled all the way up )
        pxClientHeight = document.getElementById( 'hey' ).clientHeight; // px height of the Intro section (100vh)

    if( pxToTop < pxClientHeight ){

        var scrollProgress = ( pxToTop / pxClientHeight ).toFixed( 1 ), // decimal ( 0.0 - 1.0 ) representing percentage of scroll position in Intro section
            opacity = ( opacityMin + ( scrollProgress * ( opacityMax - opacityMin ) ) ).toFixed( 2 ),
            rgb = Math.round( rgbMin - ( scrollProgress * ( rgbMin - rgbMax ) ) );

        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + opacity + ' )' );
        $( '.navbar-brand, .nav-link, .navbar-toggler-right' ).css( 'color', 'rgb( ' + rgb + ', ' + rgb + ', ' + rgb + ' )' );
        $( 'nav, .navbar-toggler' ).css( 'border-color', 'rgb( ' + rgb + ', ' + rgb + ', ' + rgb + ' )' );
        $( '#backToTop' ).css( 'opacity', scrollProgress );
    }

    else {
        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + opacityMax + ' )' );
        $( '.navbar-brand, .nav-link, .navbar-toggler-right' ).css( 'color', 'rgb( ' + rgbMax + ', ' + rgbMax + ', ' + rgbMax + ' )' );
        $( 'nav, .navbar-toggler' ).css( 'border-color', 'rgb( ' + rgbMax + ', ' + rgbMax + ', ' + rgbMax + ' )' );
        $( '#backToTop' ).css( 'opacity', 1 );
    }

} );

/* ON CLICK... ****************************************************************/
// ...Auto-Scrolling Links/Buttons
$( '.scroll' ).click( function( e ) {
    // Prevent anchor click from following href attribute
    e.preventDefault;
    // Get clicked link/button's destination section from data-section attribute
    var $section = $( this ).data( 'section' );
    // Close the mobile menu
    $( '#navbarCollapse' ).collapse( 'hide' );
    // Scroll to the section from the link's data-section attribute
    $( 'html, body' )
        .animate(
            { scrollTop: $( '#' + $section ).offset().top },
            1000
        );
});

// Gallery /////////////////////////////////////////////////////////////////////
var $galleryitem = $( '.gallery-item' ),
    $modal = $( '#modal' );

$galleryitem.click( this, function(){
    var $this = $( this ),
        $thisImage = $this.data( 'imagefeatured' ),
        $thisTitle = $this.data( 'title' ),
        $thisBody = $this.data( 'description' )
        $thisMeta = $this.find( '.meta' ).html();

    $modal.find( '.header h2' ).html( $thisTitle );
    $modal.find( '.meta' ).html( $thisMeta );
    $modal.find( '.body' ).html( $thisBody );
    $modal.find( '.image > .wrapper' ).html( '<img src="/img/portfolio/' + $thisImage + '" />' );

    $modal.modal();
} )

// TODO: Clear image on close modal


// INIT imageLoaded + Isotope
var $gallery = $( '#gallery' ).imagesLoaded( function() {
  // init Isotope after all images have loaded
  $gallery.isotope( {
    itemSelector: '.gallery-item',
    getSortData: {
        date: '[data-date]',
        title: '[data-title]',
        category: '[data-category]'
    },
    sortAscending: {
        date: false
    },
    masonry: {
        columnWidth: '.gallery-item:not(.col-lg-6)'
    },
    sortBy: 'date',
    // filter: '.featured'
    filter: '*'
  } );
} );

// FILTER
$( '.btn-group-filter button' ).click( function(){
  // clear other btns' active states
  $( '.btn-group-filter button' ).removeClass( 'active' );
  // set this btn active
  $( this ).addClass( 'active' );
  // set filter to btn's data-filter value
  var filter = $( this ).attr( 'data-filter' );
  // filter
  $gallery.isotope( { filter: filter } );
} );

// SORT
$( '.btn-group-sort button' ).click( function() {
  // clear other btns' active states
  $( '.btn-group-sort button' ).removeClass('active');
  // set this btn active
  $( this ).addClass( 'active' );
  // set sort to btn's data-sort value
  var sort = $( this ).attr( 'data-sort' );
  // sort
  $gallery.isotope( { sortBy: sort } );
} );

// SHUFFLE
$( '#shuffle' ).click( function(){
    // shuffle
  $gallery.isotope( 'shuffle' );
} );

// Footer social menu //////////////////////////////////////////////////////////
var $footer = $( "footer" ),
    color = {
        facebook: "#3b5998",
        twitter: "#1da1f2",
        instagram: "radial-gradient(circle farthest-corner at 35% 90%, #fec564, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(circle farthest-corner at 0 140%, #fec564, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 0 -25%, #5258cf, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 20% -50%, #5258cf, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 100% 0, #893dc2, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 60% -20%, #893dc2, rgba(0, 0, 0, 0) 50%),"
                     + "radial-gradient(ellipse farthest-corner at 100% 100%, #d9317a, rgba(0, 0, 0, 0)),"
                     + "linear-gradient(#6559ca, #bc318f 30%, #e33f5f 50%, #f77638 70%, #fec66d 100%)",
        linkedin: "#283e4a",
        codepen: "#191919",
        github: "#959da5"
    };
$( "a" ).hover( function(){
  var thisSocial = $( this ).attr( "class" );
  $footer.css( "background", color[thisSocial] );
} );
$( ".social" ).mouseleave( function(){
  $footer.css( "background", "#111111" );
} );

/* FUNCTIONS... ***************************************************************/

// Checks if an element is visible (within the viewport)
(function($) {
/** Copyright 2012, Digital Fusion
* Licensed under the MIT license.
* http://teamdf.com/jquery-plugins/license/
* @author Sam Sehnert
*/
  $.fn.visible = function(partial) {
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
  };
})(jQuery);

// Applys animation-type class to a visible element with a data-animation attribute
function applyAnimations(){
    $( '.animated' ).each( function( i, el ) {
        var el = $( el );
        var animation = $( el ).data( 'animation');
        if ( el.visible( true ) ) {
            el.addClass( animation );
        }
    } );
}
