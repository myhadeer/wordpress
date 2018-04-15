<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package SKT Lawzo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	$hideslide = get_theme_mod('hide_slides', '1');
	$hidechoose = get_theme_mod('hide_choose', '1');
	$hidecolumn = get_theme_mod('hide_column', '1');
	$hidesocial = get_theme_mod('hide_social', '1');
	$hideheadfooinfo = get_theme_mod('hide_headfooinfo', '1');
?>
<div id="pagefixed">
  <div class="headertop">
    <div class="container">
        <div class="topleft"><?php wp_nav_menu(array('theme_location' => 'topmenu', 'depth' => 1)); ?></div>
        <div class="topright">
        	<?php if($hidesocial == ''){?>
           <div class="social-icons">
           <?php if ( '' !== get_theme_mod( 'fb_link' ) ) { ?>
          <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a>
          <?php } ?>
          <?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
          <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
          <?php } ?>
          <?php if ( '' !== get_theme_mod('gplus_link') ) { ?>
          <a title="google-plus" class="gp" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
          <?php }?>
          <?php if ( '' !== get_theme_mod('linked_link') ) { ?>
          <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
          <?php } ?>
               </div>  
          <?php } ?>
               
        </div>
        <div class="clear"></div>
     </div> 
  </div><!-- end .headertop -->
  <div class="header <?php if ( !is_front_page() && ! is_home() ) { ?>innerheader<?php } ?>">
        <div class="container">
            <div class="logo">
			            <?php skt_lawzo_the_custom_logo(); ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><h1><?php bloginfo('name'); ?></h1></a>
                        <p><?php bloginfo('description'); ?></p>
            </div><!-- logo -->
            <div class="header_right"> 
            
             <?php if ( ! dynamic_sidebar( 'header-info' ) ) : ?>
                 <div class="headerinfo">
                   <?php if($hideheadfooinfo == ''){?>	
                   <div class="headcol-1">
				   <?php if( '' !== get_theme_mod('opning_hours_title')){ ?>
                    <span><?php echo esc_attr(get_theme_mod('opning_hours_title', __('Opening Hours', 'skt-lawzo'))); ?></span>
                   <?php } ?>                   
                   <?php if( '' !== get_theme_mod('opning_hours')) { ?>
                    <?php echo wp_kses_post(get_theme_mod('opning_hours', __('Mon to Fri - 10.00 AM to 7.00 PM<br /> Sat - 10.00 AM to 4.00 PM', 'skt-lawzo'))); ?>
                   <?php } ?> 
                   </div>
                   
                   <div class="headcol-2">
                   <?php if( '' !== get_theme_mod('callus_title') ) { ?>
                    <span><?php echo esc_attr(get_theme_mod('callus_title', __('Call Us', 'skt-lawzo'))); ?></span>
                   <?php } ?>                    
                    <?php if( '' !== get_theme_mod('header_phone') ) { ?>
                    <?php echo esc_attr(get_theme_mod('header_phone', __('+10 2234567890 +10 1123456789', 'skt-lawzo'))); ?>
                   <?php } ?>
                   </div>
                   
                   <div class="headcol-3">
                    <?php if( '' !== get_theme_mod('emailus_title') ) { ?>
                    <span><?php echo esc_attr(get_theme_mod('emailus_title', __('Email Us', 'skt-lawzo'))); ?></span>
                    <?php } ?>
                   <?php if( '' !== get_theme_mod('email_address') ) { ?>
                    <?php echo esc_attr(get_theme_mod('email_address', 'support@sitename.com info@sitename.com', 'skt-lawzo')); ?>
                   <?php } ?>
                   </div>
                   <div class="clear"></div>                  
                   <?php } ?>    
                 </div>                 
            <?php endif; // end sidebar widget area ?>          
            <div class="clear"></div>
          </div><!-- header_right -->
          <div class="clear"></div>
        </div><!-- container -->
  </div><!--.header -->
  <div class="menubar">
     <div class="toggle">
         <a class="toggleMenu" href="<?php echo esc_url('#');?>"><?php _e('Menu','skt-lawzo'); ?></a>
     </div><!-- toggle --> 
      <div class="sitenav">
          <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
   
	 <?php if ( '' !== get_theme_mod( 'getquote_link' ) ) { ?>
       <div class="getaquote">
         <ul>
          <li><a href="<?php echo esc_url(get_theme_mod('getquote_link','#')); ?>"><?php echo esc_attr(get_theme_mod('getquote_title', __('Get A Quote', 'skt-lawzo'))); ?></a></li>
        </ul>
      </div>
     <?php } ?>          
   </div><!-- site-nav -->  
</div><!--end .menubar -->
  
<?php if (!is_home() && is_front_page()) { ?>
<!-- Slider Section -->
<?php if($hideslide == ''){?>
<?php for($sld=7; $sld<10; $sld++) { ?>
<?php if( get_theme_mod('page-setting'.$sld)) { ?>
<?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$img_arr[] = $image;
$id_arr[] = $post->ID;
endwhile;
}
}
?>
<?php if(!empty($id_arr)){ ?>
<section id="home_slider">
<div class="slider-wrapper theme-default">
<div id="slider" class="nivoSlider">
	<?php 
	$i=1;
	foreach($img_arr as $url){ ?>
    <img src="<?php echo esc_url($url); ?>" title="#slidecaption<?php echo $i; ?>" />
    <?php $i++; }  ?>
</div>   
<?php 
$i=1;
foreach($id_arr as $id){ 
$title = get_the_title( $id ); 
$post = get_post($id); 
$content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 150)); 
?>                 
<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
<div class="slide_info">
<h2><?php echo $title; ?></h2>
<?php echo $content; ?>
<div class="clear"></div>
<div class="slide_more"><a href="<?php the_permalink(); ?>"><?php esc_attr_e('Read More', 'skt-lawzo');?></a></div>
</div>
</div>      
<?php $i++; } ?>       
 </div>
<div class="clear"></div>        
</section>
<?php } else { ?>
<section id="home_slider">
<img src="<?php echo esc_url(get_template_directory_uri());?>/images/set-slider.jpg" />
<div class="clear"></div>
</section>
<?php } ?>
<?php } ?>

<!-- Slider Section -->
<?php if($hidechoose == ''){?>
  <section id="wrapfirst">
            	<div class="container">
                    <div class="welcomewrap">
					<?php if( get_theme_mod('page-setting1')) { ?>
                    <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
                    <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?> 		
                     <?php the_post_thumbnail( array(570,380, true));?>
                     <h1><?php the_title(); ?></h1>         
                     <?php the_content(); ?>
                     <div class="clear"></div>
                    <?php endwhile; } else { 
					?>
                    <img src="<?php echo esc_url(get_template_directory_uri() );?>/images/set-choose.jpg"/>
                    <?php
					} ?>
                      
               </div><!-- welcomewrap-->
              <div class="clear"></div>
            </div><!-- container -->
</section>
<?php } ?>
<?php if($hidecolumn == ''){?>       
<div id="pagearea">
	<div class="container">
    <?php
$pages = array();
for ( $count = 1; $count <= 5; $count++ ) {
	$mod = get_theme_mod( 'page-column' . $count );
	if ( 'page-none-selected' != $mod ) {
		$pages[] = $mod;
	}
}
$filterArray = array_filter($pages);
if(count($filterArray) == 0){ ?>
<?php if ( current_user_can( 'edit_theme_options' ) ) { ?>
<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/set-services.jpg" />
<?php } ?>
<?php 	
}else{

$filled_array=array_filter($pages);
	
$args = array(
	'posts_per_page' => 4,
	'post_type' => 'page',
	'post__in' => $pages,
	'orderby' => 'post__in'
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	$count = 1;
	while ( $query->have_posts() ) : $query->the_post();
	?>
	 <div class="threebox <?php if($count % 3 == 0) { echo "last_column"; } ?>">
				 <a href="<?php the_permalink(); ?>">				 
                  <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( array(65,65,true));?>                        
                   <?php } else { ?>
                       <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/img_404.png" width="65" alt=""/>
                   <?php } ?>
                  <h3><?php the_title(); ?></h3>
                 </a>
                 <p><?php echo wp_trim_words(get_the_content(), '25'); ?></p>
                 
        	   </div>
        <?php if($count == 0) { ?>
        <div class="clear"></div>
        <?php } ?>
	<?php
	$count++;
	endwhile;
 endif;
}
 
?>
 
        <div class="clear"></div>
    </div><!-- .container -->
 </div><?php }?><!-- #pagearea -->  

<?php
}
?>  