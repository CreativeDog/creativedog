<?php
/*
Plugin Name: Últimos Proyectos
Description: Muestra los últimos proyectos del sitio
Author: CreativeDog
Version: Beta
Author URI: http://www.creativedog.com.ar
*/
add_action("widgets_init", array('Ultimos_Proyectos', 'register'));
class Ultimos_Proyectos {
  function control(){
    //echo 'I am a control panel';
  }
  function widget($args){
  echo $args['before_widget'];
  echo $args['before_title'] . 'Últimos proyectos' . $args['after_title'];
  ?>
  <div class="widget_ultimos_proyectos">
    <?php 
      $args_proyectos = array(
        'post_type' => 'proyecto',
        'meta_query' => array(
          array(
            'key' => 'destacado',
            'value' => true
          )
        ),
        'posts_per_page'   => 4
      );

      // the query
      $the_query = new WP_Query( $args_proyectos ); ?>
      <?php if ( $the_query->have_posts() ) : ?>
        <ul>
          <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <?php  
              $terms = get_the_terms( get_the_ID(), 'tipos' );
              $i = 0;
              $terms_text = '';
              $terms_filter = '';
              foreach ($terms as $term) {
                if($i!= 0){
                  $terms_text .= ' / ';
                } 
                $terms_text .= $term->name;
                $terms_filter .= ' '.$term->slug; 
                $i++;  
              }
            ?>
            
              <li>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <h6 class="grey"><?php echo $terms_text; ?></h6>
              </li>
            
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
  </div>
  <?php wp_reset_postdata(); ?>

  <?php  
    $page_proyecto = get_page_by_path('proyectos');
    $proyectos_id = $page_proyecto->ID;
  ?>
  <a href="<?php echo get_permalink($proyectos_id); ?>" class="btn_small btn_black btn_full_width">ver todos</a>
  
  <?php
    echo $args['after_widget'];
      }
       function register(){
        register_sidebar_widget('Últimos Proyectos', array('Ultimos_Proyectos', 'widget'));
        register_widget_control('Últimos Proyectos', array('Ultimos_Proyectos', 'control'));
      }
    }
  ?>