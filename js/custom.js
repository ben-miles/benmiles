/* ON READY... ****************************************************************/
$( document ).ready( function(){

    // Apply animations
    applyAnimations();

} );

/* ON SCROLL... ***************************************************************/
$( window ).scroll( function( e ){

    // Apply animations
    applyAnimations();

    // fade in nav's background-color while scrolling past intro
    var scrollTop = $( this ).scrollTop(), // px between top of viewport and top of page ( 0 = scrolled all the way up)
        maxScroll = document.getElementById( 'hey' ).clientHeight, // height of the Intro section on load
        initOpacity = 0.25, // initial background-color-opacity for nav
        maxOpacity = 1; // final background-color-opacity for nav
    if( scrollTop > maxScroll ){
        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + maxOpacity + ' )' );
        $( '.nav-link, .navbar-toggler' ).css( 'color', 'rgba( 0, 0, 0, 1 )' );
        $( '#backToTop' ).css( 'opacity', 1 );
    } else {
        var scrollTopDecimal = ( scrollTop / maxScroll ).toFixed( 1 ), // decimal representing percentage of scroll position in Intro section
            calcOpacity = ( ( ( maxOpacity - initOpacity ) * scrollTopDecimal ) + initOpacity ),
            calcValue = Math.round( 255 - ( 255 * scrollTopDecimal ) );
        $( 'nav' ).css( 'background-color', 'rgba( 255, 255, 255, ' + calcOpacity + ' )' );
        $( '.nav-link, .navbar-toggler' ).css( 'color', 'rgba( ' + calcValue + ', ' + calcValue + ', ' + calcValue + ', 1 )' );
        $( '#backToTop' ).css( 'opacity', scrollTopDecimal );
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

$galleryitem.click(this, function(){
    var $this = $(this),
        $thisImage = $this.data( 'imagefeatured' ),
        $thisTitle = $this.data( 'title' ),
        $thisBody = $this.data( 'description' )
        $thisMeta = $this.find( '.meta' ).html();

    $modal.find( '.header h2' ).html( $thisTitle );
    $modal.find( '.meta' ).html( $thisMeta );
    $modal.find( '.body' ).html( $thisBody );
    $modal.find( '.image' ).html( '<img src="/img/portfolio/' + $thisImage + '" />' );

    $modal.modal();
} )

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
