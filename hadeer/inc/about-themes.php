<?php
/**
 * SKT Lawzo About Theme
 *
 * @package SKT Lawzo
 */
 
//about theme info
add_action( 'admin_menu', 'skt_lawzo_abouttheme' );
function skt_lawzo_abouttheme() {    	
	add_theme_page( __('About Theme', 'skt-lawzo'), __('About Theme', 'skt-lawzo'), 'edit_theme_options', 'skt_lawzo_guide', 'skt_lawzo_mostrar_guide');   
} 

//guidline for about theme
function skt_lawzo_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'skt-lawzo'); ?>
		   </div>
          <p><?php esc_attr_e('SKT Lawzo is a lawyer multipurpose responsive flexible and scalable WordPress theme which can be used for law, office, law firms, legal consulting, attorney, small and medium business, consulting, service industry websites. Can be used for construction, corporate, personal, professional bloggers and portfolio sites as well. Compatible with contact form 7 and other plugins like WooCommerce. Translation ready and multilingual compatible.','skt-lawzo'); ?></p>
		  <a href="<?php echo SKT_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKT_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-lawzo'); ?></a> | 
				<a href="<?php echo SKT_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'skt-lawzo'); ?></a> | 
				<a href="<?php echo SKT_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-lawzo'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKT_THEME_URL; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>