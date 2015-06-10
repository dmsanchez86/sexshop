<?php get_header(); ?>

<div class="navigator">
    <div class="container">
        <ul>
            <li><a href="#" class="waves-effect waves-color_r">Inicio</a></li>
            <li><a href="#" class="waves-effect waves-color_r">Consejos de Amor</a></li>
            <li><a href="#" class="waves-effect waves-color_r">Contacto</a></li>
        </ul>
    </div>
</div>
<div class="slider_products">
    <div class="container">
        <div id="owl-example" class="owl-carousel">
          <div class="eslider__item">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/img/slider.png" class="responsive-img">
          </div>
          <div class="eslider__item">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/img/slider.png" class="responsive-img">
          </div>
          <div class="eslider__item">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/img/slider.png" class="responsive-img">
          </div>
          <div class="eslider__item">
              <img src="<?php bloginfo('stylesheet_directory'); ?>/img/slider.png" class="responsive-img">
          </div>
        </div>
    </div>
</div>
<div class="slider_products">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8">
                <div class="banner">
                    <img src="<?php bloginfo('stylesheet_directory'); ?>/img/img.png" data-caption="Consejos de Amor" class="responsive-img materialboxed"></img>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="categories">
                    <ul>
                        <li><a href="#" class="waves-effect waves-color_w">Lubricantes</a></li>
                        <li><a href="#" class="waves-effect waves-color_w">Vibradores</a></li>
                        <li><a href="#" class="waves-effect waves-color_w">Condones</a></li>
                        <li><a href="#" class="waves-effect waves-color_w">Lencería</a></li>
                        <li><a href="#" class="waves-effect waves-color_w">Peliculas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container">
        
        <?php
            $args = array( 
                'post_type' => array('product')
            );
            
            // The Query
            $the_query = new WP_Query( $args );
        ?>
        <div class="row">
            <?php
                // The Loop
                if ( $the_query->have_posts() ) {?>
                	<?php while ( $the_query->have_posts() ) {  
            	        $the_query->the_post(); // Si hay post
            	        $product = new WC_Product( get_the_ID() ); // Objeto de la clase wooCommerce
            	        
            	        $id = $product->post->ID;
            	        $price = $product->price;
            	        $title = $product->post->post_title;
            	        $description = $product->post->post_excerpt;
            	        $url = $product->post->guid;
            	        ?>
                	    <div class="col s6 m3 l3">
                            <div class="articulo">
                                <div class="articulo_imagen">
                                    <img src="<?= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID())); ?>" class="responsive-img materialboxed" data-caption="<?= $description ?>" alt="<?= get_the_title() ?>">
                                </div>
                                <div class="title_product">
                                    <h3 data-id="<?= $id ?>"><?= $title ?></h3>
                                    <h4 class="price">$ <?= $price; ?></h4>
                                    <p class="description"><?= $description ?></p>
                                    <a href="<?= $url ?>" class="waves-effect waves-light btn-flat btn_buy">Comprar <i class="mdi-action-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                	<?php
                	}
                } else { 
                	 echo' No hay Productos' ;
                }
            ?>
        </div>
    </div>
    
</section>

<?php get_footer(); ?>