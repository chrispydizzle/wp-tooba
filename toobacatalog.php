<?php

function tooba_display_catalog() {
	add_shortcode( 'tooba-catalog', 'tooba_catalog' );
}

add_action( 'init', 'tooba_display_catalog' );

function tooba_catalog( $atts ) {
	global $wpdb, $catalogues_table_name, $catalogue_items_table_name;

	extract(
		shortcode_atts( array(
			'id'    => '1',
			'title' => 'Our Products',
			'type'  => 'Corporate',
            'anchor' => 'catalog',
		),
			$atts ) );

	$Catalogue      = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $catalogues_table_name WHERE Catalogue_ID=%d", $atts['id'] ) );
	$CatalogueItems = $wpdb->get_results( "SELECT * FROM $catalogue_items_table_name WHERE Catalogue_ID=" . $Catalogue->Catalogue_ID . ' ORDER BY Position' );

	$ContainerTop = '<section class="pad-t80 pad-b50" data-anchor="'.$atts['anchor'].'">
            <div class="container">
                <div class="row">	
                    <div class="col-md-8">
                        <div class="section-title text-center">
                            <h3>' . $atts['title'] . '</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="portfolio-box">';

	$OutstringContainer = $ContainerTop;
	$Governer           = 0;
	foreach ( $CatalogueItems as $CatalogueItem ) {
		$Product      = new UPCP_Product( array( 'ID' => $CatalogueItem->Item_ID ) );
		$DisplayClass = 'showme';
		if ( $Governer >= 6 ) {
			$DisplayClass = 'hideme';
		}

		$OutstringContainer .= '<div class="col-md-4 col-sm-6 product ' . $DisplayClass . '" data-description="' . $Product->Get_Description() . '" data-id="' . $Product->Get_Item_ID() . '" data-date="' . $Product->Get_Created_Date() . '" data-order="' . $Governer . '">
                            <div class="portfolio-post mb30">
                                <img src="' . $Product->GetMassagedLink() . '" alt="">
                                <div class="hover-box">
                                    <div class="inner-hover">
                                    	<div class="popoutcontainer" style="bottom: 100%;">
                                        <a class="popout">&nbsp;</a>
                                        </div>                                    
                                        <h4 style="top: 100%;">' . $Product->Get_Product_Name() . '</h4>
                                        <div style="display: none" id="fcont' . $Product->Get_Item_ID() . '" data-order="' . $Governer . '"></div>
                                    </div>                      
                                </div>
                            </div>
                        </div>';

		++ $Governer;
	}

	if ( $Governer >= 6 ) {
		$OutstringContainer .= '<div class="getmore"><a class="seemorelink" href="#">SEE MORE</a></div>';
	}

	$OutstringContainer .= '</div>
            		<div class="col-md-12">
					&nbsp;
					</div>            
                </div>
            </div>
        </section>';


	return $OutstringContainer;
}

