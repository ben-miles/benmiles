<?php

/*******************************************************************************
* menu_item
* Generates a nav menu item, consisting of li > a
* Allows for dynamic indication of 'current' or 'active' page.
*** $active: Derived from logic in /core/head.php.
*** $label: The visible text in the link.
*** $link: The url of the link, if different than sanitize( $label ).
*** $target: The target of the link, if other than "_self".
*******************************************************************************/
function menu_item( $label, $link, $target='' ) {
    $page   = str_replace( '/', '', $_SERVER['REQUEST_URI'] );
    $active = ( strtolower( $label ) == $page ) ? ' active' : '';
    $target = ( $target == '' ) ? '_self' : $target;
    $output = <<<OUTPUT
        <li class="nav-item$active">
            <a class="nav-link scroll" data-section="$link" href="#$link" target="$target">$label</a>
        </li>
OUTPUT;

    return $output;
}

/*******************************************************************************
* excerpt
* Generates a short excerpt from a longer string
* Based on https://www.brightcherry.co.uk/scribbles/php-how-to-show-an-excerptteaser-from-a-string/
*** $string: The input string of long text.
*** $count: The limit on the number of words.
*******************************************************************************/
function excerpt( $string, $count ){
    $words = explode( ' ', $string );
    if( count( $words ) > $count ){
        $words = array_slice( $words, 0, $count );
        $string = implode( ' ', $words );
        $string .= '...';
    }
    return $string;
}

/*******************************************************************************
* buildPortfolio
* Generates a responsive gallery item from an array of item information
*** $arrayPortfolioPiece: The input array.
*******************************************************************************/
function buildPortfolio( $arrayPortfolio ){
    $output = '';
    foreach( $arrayPortfolio as $k => $arrayPortfolioPiece ){

        extract( $arrayPortfolioPiece );

        $title = ( !empty( $client ) ) ? $client . ': ' . $title : $title;
        $dateDisp = ( !empty( $date ) ) ? date( 'M. d, Y', strtotime( $date ) ) : '';
        $excerpt = excerpt( $description, 20 );

        // cats
        if( is_array( $cats ) && sizeof( $cats ) > 1 ){
            sort( $cats, SORT_NATURAL | SORT_FLAG_CASE );
        }
        $catsDisp = implode( ', ', $cats );
        $catsMeta = strtolower( $catsDisp );
        $catsMeta = str_replace( ',', '', $catsMeta );

        // tags
        if( is_array( $tags && sizeof( $tags ) > 1 ) ){
            sort( $tags, SORT_NATURAL | SORT_FLAG_CASE );
        }
        $tagsDisp = implode( ', ', $tags );
        $tagsMeta = strtolower( $tagsDisp );
        $tagsMeta = str_replace( ' ', '-', $tagsMeta ); // replace spaces with hyphens
        $tagsMeta = str_replace( ',-', ' ', $tagsMeta ); // replace commahyphens with spaces, aren't I so clever I HATE REGEX

        $colSizes = ( isset( $arrayPortfolioPiece['img']['thumb']['size'] ) && $arrayPortfolioPiece['img']['thumb']['size'] === 'wide' ) ? 'col-sm-12 col-md-8 col-lg-6' : 'col-sm-6 col-md-4 col-lg-3';

        $output .= <<<OUTPUT
        <div class="gallery-item $catsMeta $tagsMeta $colSizes" data-id="$k">
            <a href="javascript:void(0)">
                <div class="text">
                    <div class="title">
                        <h3>$title</h3>
                    </div>
                    <div class="meta">
                        <small class="date">$dateDisp</small>
                        <small class="cats">$catsDisp</small>
                        <small class="tags">$tagsDisp</small>
                    </div>
                </div>
                <img src="/img/portfolio/{$img['thumb']['path']}" />
            </a>
        </div>
OUTPUT;

    }

    echo $output;

}

/*******************************************************************************
* displaySVG
* Generates a responsive SVG item from a filename
* Based on https://stackoverflow.com/a/30000684/6853842
*** $arrayPortfolioPiece: The input array.
*******************************************************************************/
function displaySVG( $SVG = '', $delay = 0 ){
    $file = strtolower( str_replace( array( ' ', '!' ), '', $SVG ) );
    $svg_file = file_get_contents( 'img/svg/' . $file . '.svg' );
    $find_string = '<svg';
    $position = strpos( $svg_file, $find_string );
    $svg_file_new = substr( $svg_file, $position );
    return '<div class="svg animated ' . $file . '" title="' . $SVG . '" alt="' . $SVG . '" style="animation-delay: ' . $delay . 's;" data-animation="fadeInUp">' . $svg_file_new . '</div>';
}

?>
