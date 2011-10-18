<?php 

// Zentrum Option Page


//Bilde opplastning.
add_action('admin_init', 'ud_admin_init');
function ud_admin_init() {
    register_setting( 'ud_options', 'ud_options', 'ud_options_validate' );
    add_settings_section('ud_main', 'Logo', 'ud_section_text', 'ud');
    add_settings_field('ud_filename', '', 'ud_setting_filename', 'ud', 'ud_main');
}



function ud_section_text() {
    $options = get_option('ud_options');
    echo '<p>Nåværende logo:</p>';
    if ($file = $options['file']) {
        // var_dump($file);
        echo "<img src='{$file['url']}' />";
    }
}

function zentrum_logo() {
    $options = get_option('ud_options');
    if ($file = $options['file']) {
        // var_dump($file);
        
        echo "$file[url]";
    }
    else {
    echo bloginfo('template_directory') . "/images/logo.png"; 
    }
}

function ud_setting_filename() {
    echo '';
}

function ud_options_validate($input) {
    $newinput = array();
    if ($_FILES['ud_filename']) {
        $overrides = array('test_form' => false); 
        $file = wp_handle_upload($_FILES['ud_filename'], $overrides);
        $newinput['file'] = $file;
    }
    return $newinput;
}


//Setter inn link i adminpanelet.
function themeoptions_admin_menu() 
{
	// legger til link i adminpanelet
	add_theme_page("Zentrum Options", "Zentrum Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}

function themeoptions_page() 
{
	// here's the main function that will generate our options page
	
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }
	
	//if ( get_option() == 'checked'
	
	?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>Zentrum Options</h2>
		
			
    				<form method="post" enctype="multipart/form-data" action="options.php">
  		  			<?php settings_fields('ud_options'); ?>
    					<?php do_settings_sections('ud'); ?>
    					<input type="file" name="ud_filename" size="40" />
    					
    						<input type="submit" name="Submit" class="button" value="Last opp" />
    					
    				</form>

		
		<form method="POST" action="">
			<input type="hidden" name="update_themeoptions" value="true" />
			
			<h3>Farger</h3>
			<p>Fargene starter fra venstre og går mot høyre. Husk å ha med # i fargekoden.</p>
				<table style="width: 200px; text-align: left;">
					<tr>
						<th><label style="font-weight:normal;">Farge nr.1</label></th>
							<td>
								<input type="text" name="color1" id="color1" size="4" value="<?php echo get_option('zentrum_color1'); ?>"/>
			
							</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Farge nr.2</label></th>
							<td>						
								<input type="text" name="color2" id="color2" size="4" value="<?php echo get_option('zentrum_color2'); ?>"/>
							</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Farge nr.3</label></th>
							<td>	
								<input type="text" name="color3" id="color3" size="4" value="<?php echo get_option('zentrum_color3'); ?>"/>
							</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Farge nr.4</label></th>
							<td>		
								<input type="text" name="color4" id="color4" size="4" value="<?php echo get_option('zentrum_color4'); ?>"/>
							</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Farge nr.5</label></th>
							<td>		
								<input type="text" name="color5" id="color5" size="4" value="<?php echo get_option('zentrum_color5'); ?>"/>
								</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Farge nr.6</label></th>
							<td>	
								<input type="text" name="color6" id="color6" size="4" value="<?php echo get_option('zentrum_color6'); ?>"/>
							</td>
						</th>
					</tr>
			</table>
			
			<h3>Kontaktinformasjon</h3>
				<table style="width: 450px; text-align: left;">
					<tr>
						<th><label style="font-weight:normal;">Epost</label></th>
							<td>
								<input type="text" name="epost" id="epost" size="32" value="<?php echo get_option('zentrum_epost'); ?>"/>
							</td>
						</th>
					</tr>
					<tr>
						<th><label style="font-weight:normal;">Telefon</label></th>
							<td>	
								<input type="text" name="tlf" id="tlf" size="5" value="<?php echo get_option('zentrum_tlf'); ?>"/>
							</td>
						</th>
					</tr>
			</table>
			
			<p><input type="submit" name="search" value="Oppdater" class="button-primary" /></p>
		</form>
	
	</div>
	<?php
}

function themeoptions_update()
{
	// this is where validation would go
	
	update_option('zentrum_color1', 	$_POST['color1']);
	update_option('zentrum_color2', 	$_POST['color2']);
	update_option('zentrum_color3', 	$_POST['color3']);
	update_option('zentrum_color4', 	$_POST['color4']);
	update_option('zentrum_color5', 	$_POST['color5']);
	update_option('zentrum_color6', 	$_POST['color6']);
	update_option('zentrum_epost',	$_POST['epost']);
	update_option('zentrum_tlf',		$_POST['tlf']);
}

add_action('admin_menu', 'themeoptions_admin_menu');
?>