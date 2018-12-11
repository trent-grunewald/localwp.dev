<?php 
// To display Footer Call Out section on front page
?>
<?php
$buildo_contact_section_hideshow = get_theme_mod('buildo_contact_section_hideshow','hide');
if ($buildo_contact_section_hideshow =='show') { ?>
<?php $ctah_btn_text = get_theme_mod('ctah_btn_text'); ?> 
    <!-- cloud Section -->
    <div class="info-section info-section_mod">
        <div class="container clearfix">
            <div class="custom-text float-left"><?php echo esc_html(get_theme_mod('ctah_heading')); ?></div>
            <?php if (!empty($ctah_btn_text)) { ?>
	        	<a class="button-type-4 float-right" href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>"><?php echo esc_html($ctah_btn_text); ?>
	                <i class="fa fa-cloud-download"></i>
	            </a>
	        <?php } ?>
        </div>
    </div>
    
<?php } ?>  
<!-- End Cloud section -->
 