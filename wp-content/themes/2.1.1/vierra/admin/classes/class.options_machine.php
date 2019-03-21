<?php 
/**
 * SMOF Options Machine Class
 *
 * @package     WordPress
 * @subpackage  SMOF
 * @since       1.0.0
 * @author      Syamil MJ
 */
class Options_Machine {

	/**
	 * PHP5 contructor
	 *
	 * @since 1.0.0
	 */
	function __construct($options) {
		
		$return = $this->optionsframework_machine($options);
		
		$this->Inputs = $return[0];
		$this->Menu = $return[1];
		$this->Defaults = $return[2];
		
	}

	/** 
	 * Sanitize option
	 *
	 * Sanitize & returns default values if don't exist
	 * 
	 * Notes:
	 	- For further uses, you can check for the $value['type'] and performs
	 	  more speficic sanitization on the option
	 	- The ultimate objective of this function is to prevent the "undefined index"
	 	  errors some authors are having due to malformed options array
	 */
	static function sanitize_option( $value ) {
		$defaults = array(
			"name" 		=> "",
			"desc" 		=> "",
			"id" 		=> "",
			"std" 		=> "",
			"mod"		=> "",
			"type" 		=> ""
		);

		$value = wp_parse_args( $value, $defaults );

		return $value;

	}


	/**
	 * Process options data and build option fields
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public static function optionsframework_machine($options) {
		global $smof_output, $smof_details, $smof_data;
		if (empty($options))
			return;
		if (empty($smof_data))
			$smof_data = of_get_options();
		$data = $smof_data;

		$defaults = array();   
	    $counter = 0;
		$menu = '';
		$output = '';
		$update_data = false;

		do_action('optionsframework_machine_before', array(
				'options'	=> $options,
				'smof_data'	=> $smof_data,
			));
		if ($smof_output != "") {
			$output .= $smof_output;
			$smof_output = "";
		}
		
		

		foreach ($options as $value) {
			
			// sanitize option
			if ($value['type'] != "heading")
				$value = self::sanitize_option($value);

			$counter++;
			$val = '';
			
			//create array of defaults		
			if ($value['type'] == 'multicheck'){
				if (is_array($value['std'])){
					foreach($value['std'] as $i=>$key){
						$defaults[$value['id']][$key] = true;
					}
				} else {
						$defaults[$value['id']][$value['std']] = true;
				}
			} else {
				if (isset($value['id'])) $defaults[$value['id']] = $value['std'];
			}
			
			/* condition start */
			if(!empty($smof_data) || !empty($data)){
			
				if (array_key_exists('id', $value) && !isset($smof_data[$value['id']])) {
					$smof_data[$value['id']] = $value['std'];
					if ($value['type'] == "checkbox" && $value['std'] == 0) {
						$smof_data[$value['id']] = 0;
					} else {
						$update_data = true;
					}
				}
				if (array_key_exists('id', $value) && !isset($smof_details[$value['id']])) {
					$smof_details[$value['id']] = $smof_data[$value['id']];
				}

			//Start Heading
			 if ( $value['type'] != "heading" )
			 {
			 	$class = ''; if(isset( $value['class'] )) { $class = $value['class']; }
				
				//hide items in checkbox group
				$fold='';
				if (array_key_exists("fold",$value)) {
					if (isset($smof_data[$value['fold']]) && $smof_data[$value['fold']]) {
						$fold="f_".$value['fold']." ";
					} else {
						$fold="f_".$value['fold']." temphide ";
					}
				}
	
				$output .= '<div id="section-'.$value['id'].'" class="'.$fold.'section section-'.$value['type'].' '. $class .'">'."\n";
				
				//only show header if 'name' value exists
				if($value['name']) $output .= '<h3 class="heading">'. $value['name'] .'</h3>'."\n";
				
				$output .= '<div class="option">'."\n" . '<div class="controls">'."\n";
	
			 } 
			 //End Heading

			//if (!isset($smof_data[$value['id']]) && $value['type'] != "heading")
			//	continue;
			
			//switch statement to handle various options type                              
			switch ( $value['type'] ) {
			
				//text input
				case 'text':
					$t_value = '';
					$t_value = stripslashes($smof_data[$value['id']]);
					
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					
					$output .= '<input class="of-input '.$mini.'" name="'.$value['id'].'" id="'. $value['id'] .'" type="'. $value['type'] .'" value="'. $t_value .'" />';
				break;
				
				//select option
				case 'select':
					$mini ='';
					if(!isset($value['mod'])) $value['mod'] = '';
					if($value['mod'] == 'mini') { $mini = 'mini';}
					$output .= '<div class="select_wrapper ' . $mini . '">';
					$output .= '<select class="select of-input" name="'.$value['id'].'" id="'. $value['id'] .'">';

					foreach ($value['options'] as $select_ID => $option) {
						$theValue = $option;
						if (!is_numeric($select_ID))
							$theValue = $select_ID;
						$output .= '<option id="' . $select_ID . '" value="'.$theValue.'" ' . selected($smof_data[$value['id']], $theValue, false) . ' />'.$option.'</option>';	 
					 } 
					$output .= '</select></div>';
				break;
				
				//textarea option
				case 'textarea':	
					$cols = '8';
					$ta_value = '';
					
					if(isset($value['options'])){
							$ta_options = $value['options'];
							if(isset($ta_options['cols'])){
							$cols = $ta_options['cols'];
							} 
						}
						
						$ta_value = stripslashes($smof_data[$value['id']]);			
						$output .= '<textarea class="of-input" name="'.$value['id'].'" id="'. $value['id'] .'" cols="'. $cols .'" rows="8">'.$ta_value.'</textarea>';		
				break;
				
				//radiobox option
				case "radio":
					$checked = (isset($smof_data[$value['id']])) ? checked($smof_data[$value['id']], $option, false) : '';
					 foreach($value['options'] as $option=>$name) {
						$output .= '<input class="of-input of-radio" name="'.$value['id'].'" type="radio" value="'.$option.'" ' . checked($smof_data[$value['id']], $option, false) . ' /><label class="radio">'.$name.'</label><br/>';				
					}
				break;
				
				//checkbox option
				case 'checkbox':
					if (!isset($smof_data[$value['id']])) {
						$smof_data[$value['id']] = 0;
					}
					
					$fold = '';
					if (array_key_exists("folds",$value)) $fold="fld ";
		
					$output .= '<input type="hidden" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="0"/>';
					$output .= '<input type="checkbox" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="1" '. checked($smof_data[$value['id']], 1, false) .' />';
				break;
				
				//multiple checkbox option
				case 'multicheck': 			
					(isset($smof_data[$value['id']]))? $multi_stored = $smof_data[$value['id']] : $multi_stored="";
								
					foreach ($value['options'] as $key => $option) {
						if (!isset($multi_stored[$key])) {$multi_stored[$key] = '';}
						$of_key_string = $value['id'] . '_' . $key;
						$output .= '<input type="checkbox" class="checkbox of-input" name="'.$value['id'].'['.$key.']'.'" id="'. $of_key_string .'" value="1" '. checked($multi_stored[$key], 1, false) .' /><label class="multicheck" for="'. $of_key_string .'">'. $option .'</label><br />';								
					}			 
				break;
				
				// Color picker
				case "color":
					$default_color = '';
					if ( isset($value['std']) ) {
						$default_color = ' data-default-color="' .$value['std'] . '" ';
					}
					$output .= '<input name="' . $value['id'] . '" id="' . $value['id'] . '" class="of-color"  type="text" value="' . $smof_data[$value['id']] . '"' . $default_color .' />';
		 	
				break;

				//typography option	
				case 'typography':
				
					$typography_stored = isset($smof_data[$value['id']]) ? $smof_data[$value['id']] : $value['std'];
					
					/* Font Size */
					
					if(isset($typography_stored['size'])) {
						$output .= '<div class="select_wrapper typography-size" original-title="Font size">';
						$output .= '<select class="of-typography of-typography-size select" name="'.$value['id'].'[size]" id="'. $value['id'].'_size">';
							for ($i = 8; $i < 96; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['size'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
					
					/* Line Height */
					if(isset($typography_stored['height'])) {
					
						$output .= '<div class="select_wrapper typography-height" original-title="Line height">';
						$output .= '<select class="of-typography of-typography-height select" name="'.$value['id'].'[height]" id="'. $value['id'].'_height">';
							for ($i = 20; $i < 38; $i++){ 
								$test = $i.'px';
								$output .= '<option value="'. $i .'px" ' . selected($typography_stored['height'], $test, false) . '>'. $i .'px</option>'; 
								}
				
						$output .= '</select></div>';
					
					}
						
					/* Font Face */
					if(isset($typography_stored['face'])) {
					
						$output .= '<div class="select_wrapper typography-face" original-title="Font family">';
						$output .= '<select class="of-typography of-typography-face select" name="'.$value['id'].'[face]" id="'. $value['id'].'_face">';
						
						$faces = array("default",
"Arial",
"Georgia",
"Courier New",
"Helvetica",
"Tahoma",
"Times New Roman",
"Trebuchet MS",
"Verdana",

"Abel","Abril Fatface","Aclonica","Acme","Actor","Adamina","Advent Pro","Aguafina Script","Aladin","Aldrich","Alegreya","Alegreya SC","Alex Brush","Alfa Slab One","Alice","Alike","Alike Angular","Allan","Allerta","Allerta Stencil","Allura","Almendra","Almendra SC","Amarante","Amaranth","Amatic SC","Amethysta","Andada","Andika","Angkor","Annie Use Your Telescope","Anonymous Pro","Antic","Antic Didone","Antic Slab","Anton","Arapey","Arbutus","Architects Daughter","Arimo","Arizonia","Armata","Artifika","Arvo","Asap","Asset","Astloch","Asul","Atomic Age","Aubrey","Audiowide","Average","Averia Gruesa Libre","Averia Libre","Averia Sans Libre","Averia Serif Libre","Bad Script","Balthazar","Bangers","Basic","Battambang","Baumans","Bayon","Belgrano","Belleza","Bentham","Berkshire Swash","Bevan","Bigshot One","Bilbo","Bilbo Swash Caps","Bitter","Black Ops One","Bokor","Bonbon","Boogaloo","Bowlby One","Bowlby One SC","Brawler","Bree Serif","Bubblegum Sans","Buda","Buenard","Butcherman","Butterfly Kids","Cabin","Cabin Condensed","Cabin Sketch","Caesar Dressing","Cagliostro","Calligraffitti","Cambo","Candal","Cantarell","Cantata One","Cantora One","Capriola","Cardo","Carme","Carter One","Caudex","Cedarville Cursive","Ceviche One","Changa One","Chango","Chau Philomene One","Chelsea Market","Chenla","Cherry Cream Soda","Chewy","Chicle","Chivo","Coda","Coda Caption","Codystar","Comfortaa","Coming Soon","Concert One","Condiment","Content","Contrail One","Convergence","Cookie","Copse","Corben","Courgette","Cousine","Coustard","Covered By Your Grace","Crafty Girls","Creepster","Crete Round","Crimson Text","Crushed","Cuprum","Cutive","Damion","Dancing Script","Dangrek","Dawning of a New Day","Days One","Delius","Delius Swash Caps","Delius Unicase","Della Respira","Devonshire","Didact Gothic","Diplomata","Diplomata SC","Doppio One","Dorsa","Dosis","Dr Sugiyama","Droid Sans","Droid Sans Mono","Droid Serif","Duru Sans","Dynalight","Eagle Lake","Eater","EB Garamond","Economica","Electrolize","Emblema One","Emilys Candy","Engagement","Enriqueta","Erica One","Esteban","Euphoria Script","Ewert","Exo","Expletus Sans","Fanwood Text","Fascinate","Fascinate Inline","Fasthand","Federant","Federo","Felipa","Fjord One","Flamenco","Flavors","Fondamento","Fontdiner Swanky","Forum","Francois One","Fredericka the Great","Fredoka One","Freehand","Fresca","Frijole","Fugaz One","Galdeano","Galindo","Gentium Basic","Gentium Book Basic","Geo","Geostar","Geostar Fill","Germania One","GFS Didot","GFS Neohellenic","Give You Glory","Glass Antiqua","Glegoo","Gloria Hallelujah","Goblin One","Gochi Hand","Gorditas","Goudy Bookletter 1911","Graduate","Gravitas One","Great Vibes","Gruppo","Gudea","Habibi","Hammersmith One","Handlee","Hanuman","Happy Monkey","Headland One","Henny Penny","Herr Von Muellerhoff","Holtwood One SC","Homemade Apple","Homenaje","Iceberg","Iceland","IM Fell Double Pica","IM Fell Double Pica SC","IM Fell DW Pica","IM Fell DW Pica SC","IM Fell English","IM Fell English SC","IM Fell French Canon","IM Fell French Canon SC","IM Fell Great Primer","IM Fell Great Primer SC","Imprima","Inconsolata","Inder","Indie Flower","Inika","Irish Grover","Istok Web","Italiana","Italianno","Jim Nightshade","Jockey One","Jolly Lodger","Josefin Sans","Josefin Slab","Judson","Julee","Junge","Jura","Just Another Hand","Just Me Again Down Here","Kameron","Karla","Kaushan Script","Kelly Slab","Kenia","Khmer","Knewave","Kotta One","Koulen","Kranky","Kreon","Kristi","Krona One","La Belle Aurore","Lancelot","Lato","League Script","Leckerli One","Ledger","Lekton","Lemon","Life Savers","Lilita One","Limelight","Linden Hill","Lobster","Lobster Two","Londrina Outline","Londrina Shadow","Londrina Sketch","Londrina Solid","Lora","Love Ya Like A Sister","Loved by the King","Lovers Quarrel","Luckiest Guy","Lusitana","Lustria","Macondo","Macondo Swash Caps","Magra","Maiden Orange","Mako","Marck Script","Marko One","Marmelad","Marvel","Mate","Mate SC","Maven Pro","McLaren","Meddon","MedievalSharp","Medula One","Megrim","Meie Script","Merienda One","Merriweather","Metal","Metal Mania","Metamorphous","Metrophobic","Michroma","Miltonian","Miltonian Tattoo","Miniver","Miss Fajardose","Modern Antiqua","Molengo","Monofett","Monoton","Monsieur La Doulaise","Montaga","Montez","Montserrat","Moul","Moulpali","Mountains of Christmas","Mr Bedfort","Mr Dafoe","Mr De Haviland","Mrs Saint Delafield","Mrs Sheppards","Muli","Mystery Quest","Neucha","Neuton","News Cycle","Niconne","Nixie One","Nobile","Nokora","Norican","Nosifer","Nothing You Could Do","Noticia Text","Nova Cut","Nova Flat","Nova Mono","Nova Oval","Nova Round","Nova Script","Nova Slim","Nova Square","Numans","Nunito","Odor Mean Chey","Old Standard TT","Oldenburg","Oleo Script","Open Sans","Open Sans Condensed","Oranienbaum","Orbitron","Oregano","Original Surfer","Oswald","Over the Rainbow","Overlock","Overlock SC","Ovo","Oxygen","Pacifico","Parisienne","Passero One","Passion One","Patrick Hand","Patua One","Paytone One","Peralta","Permanent Marker","Petrona","Philosopher","Piedra","Pinyon Script","Plaster","Play","Playball","Playfair Display","Podkova","Poiret One","Poller One","Poly","Pompiere","Pontano Sans","Port Lligat Sans","Port Lligat Slab","Prata","Preahvihear","Press Start 2P","Princess Sofia","Prociono","Prosto One","PT Mono","PT Sans","PT Sans Caption","PT Sans Narrow","PT Serif","PT Serif Caption","Puritan","Quando","Quantico","Quattrocento","Quattrocento Sans","Questrial","Quicksand","Qwigley","Racing Sans One","Radley","Raleway","Rammetto One","Rancho","Rationale","Redressed","Reenie Beanie","Revalia","Ribeye","Ribeye Marrow","Righteous","Rochester","Rock Salt","Rokkitt","Romanesco","Ropa Sans","Rosario","Rosarivo","Rouge Script","Ruda","Ruge Boogie","Ruluko","Ruslan Display","Russo One","Ruthie","Rye","Sail","Salsa","Sancreek","Sansita One","Sarina","Satisfy","Schoolbell","Seaweed Script","Sevillana","Shadows Into Light","Shadows Into Light Two","Shanti","Share","Shojumaru","Short Stack","Siemreap","Sigmar One","Signika","Signika Negative","Simonetta","Sirin Stencil","Six Caps","Skranji","Slackey","Smokum","Smythe","Sniglet","Snippet","Sofia","Sonsie One","Sorts Mill Goudy","Source Sans Pro","Special Elite","Spicy Rice","Spinnaker","Spirax","Squada One","Stardos Stencil","Stint Ultra Condensed","Stint Ultra Expanded","Stoke","Sue Ellen Francisco","Sunshiney","Supermercado One","Suwannaphum","Swanky and Moo Moo","Syncopate","Tangerine","Taprom","Telex","Tenor Sans","The Girl Next Door","Tienne","Tinos","Titan One","Trade Winds","Trocchi","Trochut","Trykker","Tulpen One","Ubuntu","Ubuntu Condensed","Ubuntu Mono","Ultra","Uncial Antiqua","UnifrakturCook","UnifrakturMaguntia","Unkempt","Unlock","Unna","Varela","Varela Round","Vast Shadow","Vibur","Vidaloka","Viga","Voces","Volkhov","Vollkorn","Voltaire","VT323","Waiting for the Sunrise","Wallpoet","Walter Turncoat","Wellfleet","Wire One","Yanone Kaffeesatz","Yellowtail","Yeseva One","Yesteryear","Zeyada",);			
						foreach ($faces as $face) {
							$output .= '<option value="'. $face .'" ' . selected($typography_stored['face'], $face, false) . '>'. $face .'</option>';
						}			
										
						$output .= '</select></div>';
					
					}
					
					/* Font Weight */
					if(isset($typography_stored['style'])) {
					
						$output .= '<div class="select_wrapper typography-style" original-title="Font style">';
						$output .= '<select class="of-typography of-typography-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
						$styles = array('normal'=>'Normal',
										'italic'=>'Italic',
										'bold'=>'Bold',
										'bold italic'=>'Bold Italic');
										
						foreach ($styles as $i=>$style){
						
							$output .= '<option value="'. $i .'" ' . selected($typography_stored['style'], $i, false) . '>'. $style .'</option>';		
						}
						$output .= '</select></div>';
					
					}
					
					/* Font Color */
					if(isset($typography_stored['color'])) {
					
						$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector typography-color"><div style="background-color: '.$typography_stored['color'].'"></div></div>';
						$output .= '<input class="of-color of-typography of-typography-color" original-title="Font color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $typography_stored['color'] .'" />';
					
					}
					
				break;
				
				//border option
				case 'border':
						
					/* Border Width */
					$border_stored = $smof_data[$value['id']];
					
					$output .= '<div class="select_wrapper border-width">';
					$output .= '<select class="of-border of-border-width select" name="'.$value['id'].'[width]" id="'. $value['id'].'_width">';
						for ($i = 0; $i < 21; $i++){ 
						$output .= '<option value="'. $i .'" ' . selected($border_stored['width'], $i, false) . '>'. $i .'</option>';				 }
					$output .= '</select></div>';
					
					/* Border Style */
					$output .= '<div class="select_wrapper border-style">';
					$output .= '<select class="of-border of-border-style select" name="'.$value['id'].'[style]" id="'. $value['id'].'_style">';
					
					$styles = array('none'=>'None',
									'solid'=>'Solid',
									'dashed'=>'Dashed',
									'dotted'=>'Dotted');
									
					foreach ($styles as $i=>$style){
						$output .= '<option value="'. $i .'" ' . selected($border_stored['style'], $i, false) . '>'. $style .'</option>';		
					}
					
					$output .= '</select></div>';
					
					/* Border Color */		
					$output .= '<div id="' . $value['id'] . '_color_picker" class="colorSelector"><div style="background-color: '.$border_stored['color'].'"></div></div>';
					$output .= '<input class="of-color of-border of-border-color" name="'.$value['id'].'[color]" id="'. $value['id'] .'_color" type="text" value="'. $border_stored['color'] .'" />';
					
				break;
				
				//images checkbox - use image as checkboxes
				case 'images':
				
					$i = 0;
					
					$select_value = (isset($smof_data[$value['id']])) ? $smof_data[$value['id']] : '';
					
					foreach ($value['options'] as $key => $option) 
					{ 
					$i++;
			
						$checked = '';
						$selected = '';
						if(NULL!=checked($select_value, $key, false)) {
							$checked = checked($select_value, $key, false);
							$selected = 'of-radio-img-selected';  
						}
						$output .= '<span>';
						$output .= '<input type="radio" id="of-radio-img-' . $value['id'] . $i . '" class="checkbox of-radio-img-radio" value="'.$key.'" name="'.$value['id'].'" '.$checked.' />';
						$output .= '<div class="of-radio-img-label">'. $key .'</div>';
						$output .= '<img src="'.$option.'" alt="" class="of-radio-img-img '. $selected .'" onClick="document.getElementById(\'of-radio-img-'. $value['id'] . $i.'\').checked = true;" />';
						$output .= '</span>';				
					}
					
				break;
				
				//info (for small intro box etc)
				case "info":
					$info_text = $value['std'];
					$output .= '<div class="of-info">'.$info_text.'</div>';
				break;
				
				//display a single image
				case "image":
					$src = $value['std'];
					$output .= '<img src="'.$src.'">';
				break;
				
				//tab heading
				case 'heading':
					if($counter >= 2){
					   $output .= '</div>'."\n";
					}
					//custom icon
					$icon = '';
					if(isset($value['icon'])){
						$icon = ' style="background-image: url('. $value['icon'] .');"';
					}
					$header_class = str_replace(' ','',strtolower($value['name']));
					$jquery_click_hook = str_replace(' ', '', strtolower($value['name']) );
					$jquery_click_hook = "of-option-" . trim(preg_replace('/ +/', '', preg_replace('/[^A-Za-z0-9 ]/', '', urldecode(html_entity_decode(strip_tags($jquery_click_hook))))));
					
					$menu .= '<li class="'. $header_class .'"><a title="'.  $value['name'] .'" href="#'.  $jquery_click_hook  .'"'. $icon .'>'.  $value['name'] .'</a></li>';
					$output .= '<div class="group" id="'. $jquery_click_hook  .'"><h2>'.$value['name'].'</h2>'."\n";
				break;
				
				//drag & drop slide manager
				case 'slider':
					$output .= '<div class="slider"><ul id="'.$value['id'].'">';
					$slides = $smof_data[$value['id']];
					$count = count($slides);
					if ($count < 2) {
						$oldorder = 1;
						$order = 1;
						$output .= Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
					} else {
						$i = 0;
						foreach ($slides as $slide) {
							$oldorder = $slide['order'];
							$i++;
							$order = $i;
							$output .= Options_Machine::optionsframework_slider_function($value['id'],$value['std'],$oldorder,$order);
						}
					}			
					$output .= '</ul>';
					$output .= '<a href="#" class="button slide_add_button">Add New Slide</a></div>';
					
				break;
				
				//drag & drop block manager
				case 'sorter':

				    // Make sure to get list of all the default blocks first
				    $all_blocks = $value['std'];

				    $temp = array(); // holds default blocks
				    $temp2 = array(); // holds saved blocks

					foreach($all_blocks as $blocks) {
					    $temp = array_merge($temp, $blocks);
					}

				    $sortlists = isset($data[$value['id']]) && !empty($data[$value['id']]) ? $data[$value['id']] : $value['std'];

				    foreach( $sortlists as $sortlist ) {
					$temp2 = array_merge($temp2, $sortlist);
				    }

				    // now let's compare if we have anything missing
				    foreach($temp as $k => $v) {
					if(!array_key_exists($k, $temp2)) {
					    $sortlists['disabled'][$k] = $v;
					}
				    }

				    // now check if saved blocks has blocks not registered under default blocks
				    foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
					    if(!array_key_exists($k, $temp)) {
						unset($sortlist[$k]);
					    }
					}
					$sortlists[$key] = $sortlist;
				    }

				    // assuming all sync'ed, now get the correct naming for each block
				    foreach( $sortlists as $key => $sortlist ) {
					foreach($sortlist as $k => $v) {
					    $sortlist[$k] = $temp[$k];
					}
					$sortlists[$key] = $sortlist;
				    }

				    $output .= '<div id="'.$value['id'].'" class="sorter">';


				    if ($sortlists) {

					foreach ($sortlists as $group=>$sortlist) {

					    $output .= '<ul id="'.$value['id'].'_'.$group.'" class="sortlist_'.$value['id'].'">';
					    $output .= '<h3>'.$group.'</h3>';

					    foreach ($sortlist as $key => $list) {

						$output .= '<input class="sorter-placebo" type="hidden" name="'.$value['id'].'['.$group.'][placebo]" value="placebo">';

						if ($key != "placebo") {

						    $output .= '<li id="'.$key.'" class="sortee">';
						    $output .= '<input class="position" type="hidden" name="'.$value['id'].'['.$group.']['.$key.']" value="'.$list.'">';
						    $output .= $list;
						    $output .= '</li>';

						}

					    }

					    $output .= '</ul>';
					}
				    }

				    $output .= '</div>';
				break;
				
				//background images option
				case 'tiles':
					
					$i = 0;
					$select_value = isset($smof_data[$value['id']]) && !empty($smof_data[$value['id']]) ? $smof_data[$value['id']] : '';
					if (is_array($value['options'])) {
						foreach ($value['options'] as $key => $option) { 
						$i++;
				
							$checked = '';
							$selected = '';
							if(NULL!=checked($select_value, $option, false)) {
								$checked = checked($select_value, $option, false);
								$selected = 'of-radio-tile-selected';  
							}
							$output .= '<span>';
							$output .= '<input type="radio" id="of-radio-tile-' . $value['id'] . $i . '" class="checkbox of-radio-tile-radio" value="'.$option.'" name="'.$value['id'].'" '.$checked.' />';
							$output .= '<div class="of-radio-tile-img '. $selected .'" style="background: url('.$option.')" onClick="document.getElementById(\'of-radio-tile-'. $value['id'] . $i.'\').checked = true;"></div>';
							$output .= '</span>';				
						}
					}
					
				break;
				
				//backup and restore options data
				case 'backup':
				
					$instructions = $value['desc'];
					$backup = of_get_options(BACKUPS);
					$init = of_get_options('smof_init');


					if(!isset($backup['backup_log'])) {
						$log = 'No backups yet';
					} else {
						$log = $backup['backup_log'];
					}
					
					$output .= '<div class="backup-box">';
					$output .= '<div class="instructions">'.$instructions."\n";
					$output .= '<p><strong>'. __('Last Backup : ').'<span class="backup-log">'.$log.'</span></strong></p></div>'."\n";
					$output .= '<a href="#" id="of_backup_button" class="button" title="Backup Options">Backup Options</a>';
					$output .= '<a href="#" id="of_restore_button" class="button" title="Restore Options">Restore Options</a>';
					$output .= '</div>';
				
				break;
				
				//export or import data between different installs
				case 'transfer':
				
					$instructions = $value['desc'];
					$output .= '<textarea id="export_data" rows="8">'.base64_encode(serialize($smof_data)) /* 100% safe - ignore theme check nag */ .'</textarea>'."\n";
					$output .= '<a href="#" id="of_import_button" class="button" title="Restore Options">Import Options</a>';
				
				break;
				
				// google font field
				case 'select_google_font':
					$output .= '<div class="select_wrapper">';
					$output .= '<select class="select of-input google_font_select" name="'.$value['id'].'" id="'. $value['id'] .'">';
					foreach ($value['options'] as $select_key => $option) {
						$output .= '<option value="'.$select_key.'" ' . selected((isset($smof_data[$value['id']]))? $smof_data[$value['id']] : "", $option, false) . ' />'.$option.'</option>';
					} 
					$output .= '</select></div>';
					
					if(isset($value['preview']['text'])){
						$g_text = $value['preview']['text'];
					} else {
						$g_text = '0123456789 ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz';
					}
					if(isset($value['preview']['size'])) {
						$g_size = 'style="font-size: '. $value['preview']['size'] .';"';
					} else { 
						$g_size = '';
					}
					$hide = " hide";
					if ($smof_data[$value['id']] != "none" && $smof_data[$value['id']] != "")
						$hide = "";
					
					$output .= '<p class="'.$value['id'].'_ggf_previewer google_font_preview'.$hide.'" '. $g_size .'>'. $g_text .'</p>';
				break;
				
				//JQuery UI Slider
				case 'sliderui':
					$s_val = $s_min = $s_max = $s_step = $s_edit = '';//no errors, please
					
					$s_val  = stripslashes($smof_data[$value['id']]);
					
					if(!isset($value['min'])){ $s_min  = '0'; }else{ $s_min = $value['min']; }
					if(!isset($value['max'])){ $s_max  = $s_min + 1; }else{ $s_max = $value['max']; }
					if(!isset($value['step'])){ $s_step  = '1'; }else{ $s_step = $value['step']; }
					
					if(!isset($value['edit'])){ 
						$s_edit  = ' readonly="readonly"'; 
					}
					else
					{
						$s_edit  = '';
					}
					
					if ($s_val == '') $s_val = $s_min;
					
					//values
					$s_data = 'data-id="'.$value['id'].'" data-val="'.$s_val.'" data-min="'.$s_min.'" data-max="'.$s_max.'" data-step="'.$s_step.'"';
					
					//html output
					$output .= '<input type="text" name="'.$value['id'].'" id="'.$value['id'].'" value="'. $s_val .'" class="mini" '. $s_edit .' />';
					$output .= '<div id="'.$value['id'].'-slider" class="smof_sliderui" style="margin-left: 7px;" '. $s_data .'></div>';
					
				break;
				
				
				//Switch option
				case 'switch':
					if (!isset($smof_data[$value['id']])) {
						$smof_data[$value['id']] = 0;
					}
					
					$fold = '';
					if (array_key_exists("folds",$value)) $fold="s_fld ";
					
					$cb_enabled = $cb_disabled = '';//no errors, please
					
					//Get selected
					if ($smof_data[$value['id']] == 1){
						$cb_enabled = ' selected';
						$cb_disabled = '';
					}else{
						$cb_enabled = '';
						$cb_disabled = ' selected';
					}
					
					//Label ON
					if(!isset($value['on'])){
						$on = "On";
					}else{
						$on = $value['on'];
					}
					
					//Label OFF
					if(!isset($value['off'])){
						$off = "Off";
					}else{
						$off = $value['off'];
					}
					
					$output .= '<p class="switch-options">';
						$output .= '<label class="'.$fold.'cb-enable'. $cb_enabled .'" data-id="'.$value['id'].'"><span>'. $on .'</span></label>';
						$output .= '<label class="'.$fold.'cb-disable'. $cb_disabled .'" data-id="'.$value['id'].'"><span>'. $off .'</span></label>';
						
						$output .= '<input type="hidden" class="'.$fold.'checkbox of-input" name="'.$value['id'].'" id="'. $value['id'] .'" value="0"/>';
						$output .= '<input type="checkbox" id="'.$value['id'].'" class="'.$fold.'checkbox of-input main_checkbox" name="'.$value['id'].'"  value="1" '. checked($smof_data[$value['id']], 1, false) .' />';
						
					$output .= '</p>';
					
				break;

				// Uploader 3.5
				case "upload":
				case "media":

					if(!isset($value['mod'])) $value['mod'] = '';
					
					$u_val = '';
					if($smof_data[$value['id']]){
						$u_val = stripslashes($smof_data[$value['id']]);
					}

					$output .= Options_Machine::optionsframework_media_uploader_function($value['id'],$u_val, $value['mod']);
					
				break;
				
			}

			do_action('optionsframework_machine_loop', array(
					'options'	=> $options,
					'smof_data'	=> $smof_data,
					'defaults'	=> $defaults,
					'counter'	=> $counter,
					'menu'		=> $menu,
					'output'	=> $output,
					'value'		=> $value
				));
			if ($smof_output != "") {
				$output .= $smof_output;
				$smof_output = "";
			}
			
			//description of each option
			if ( $value['type'] != 'heading') { 
				if(!isset($value['desc'])){ $explain_value = ''; } else{ 
					$explain_value = '<div class="explain">'. $value['desc'] .'</div>'."\n"; 
				} 
				$output .= '</div>'.$explain_value."\n";
				$output .= '<div class="clear"> </div></div></div>'."\n";
				}
			
			} /* condition empty end */
		   
		}

		if ($update_data == true) {
			of_save_options($smof_data);
		}
		
	    $output .= '</div>';

	    do_action('optionsframework_machine_after', array(
					'options'		=> $options,
					'smof_data'		=> $smof_data,
					'defaults'		=> $defaults,
					'counter'		=> $counter,
					'menu'			=> $menu,
					'output'		=> $output,
					'value'			=> $value
				));
		if ($smof_output != "") {
			$output .= $smof_output;
			$smof_output = "";
		}
	    
	    return array($output,$menu,$defaults);
	    
	}


	/**
	 * Native media library uploader
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_media_uploader_function($id,$std,$mod){

	    $data = of_get_options();
	    $smof_data = of_get_options();
		
		$uploader = '';
		$upload = "";
		if (isset($smof_data[$id]))
	    	$upload = $smof_data[$id];
		$hide = '';
		
		if ($mod == "min") {$hide ='hide';}
		
	    if ( $upload != "") { $val = $upload; } else {$val = $std;}
	    
		$uploader .= '<input class="'.$hide.' upload of-input" name="'. $id .'" id="'. $id .'_upload" value="'. $val .'" />';	
		
		//Upload controls DIV
		$uploader .= '<div class="upload_button_div">';
		//If the user has WP3.5+ show upload/remove button
		if ( function_exists( 'wp_enqueue_media' ) ) {
			$uploader .= '<span class="button media_upload_button" id="'.$id.'">Upload</span>';
			
			if(!empty($upload)) {$hide = '';} else { $hide = 'hide';}
			$uploader .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'" title="' . $id . '">Remove</span>';
		}
		else 
		{
			$output .= '<p class="upload-notice"><i>Upgrade your version of WordPress for full media support.</i></p>';
		}

		$uploader .='</div>' . "\n";

		//Preview
		$uploader .= '<div class="screenshot">';
		if(!empty($upload)){	
	    	$uploader .= '<a class="of-uploaded-image" href="'. $upload . '">';
	    	$uploader .= '<img class="of-option-image" id="image_'.$id.'" src="'.$upload.'" alt="" />';
	    	$uploader .= '</a>';			
			}
		$uploader .= '</div>';
		$uploader .= '<div class="clear"></div>' . "\n"; 
	
		return $uploader;
		
	}

	/**
	 * Drag and drop slides manager
	 *
	 * @uses get_theme_mod()
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function optionsframework_slider_function($id,$std,$oldorder,$order){
		
	    $data = of_get_options();
	    $smof_data = of_get_options();
		
		$slider = '';
		$slide = array();
		if (isset($smof_data[$id]))
	    	$slide = $smof_data[$id];
		
	    if (isset($slide[$oldorder])) { $val = $slide[$oldorder]; } else {$val = $std;}
		
		//initialize all vars
		$slidevars = array('title','url','link','description');
		
		foreach ($slidevars as $slidevar) {
			if (!isset($val[$slidevar])) {
				$val[$slidevar] = '';
			}
		}
		
		//begin slider interface	
		if (!empty($val['title'])) {
			$slider .= '<li><div class="slide_header"><strong>'.stripslashes($val['title']).'</strong>';
		} else {
			$slider .= '<li><div class="slide_header"><strong>Slide '.$order.'</strong>';
		}
		
		$slider .= '<input type="hidden" class="slide of-input order" name="'. $id .'['.$order.'][order]" id="'. $id.'_'.$order .'_slide_order" value="'.$order.'" />';
	
		$slider .= '<a class="slide_edit_button" href="#">Edit</a></div>';
		
		$slider .= '<div class="slide_body">';
		
		$slider .= '<label>Title</label>';
		$slider .= '<input class="slide of-input of-slider-title" name="'. $id .'['.$order.'][title]" id="'. $id .'_'.$order .'_slide_title" value="'. stripslashes($val['title']) .'" />';
		
		$slider .= '<label>Image URL</label>';
		$slider .= '<input class="upload slide of-input" name="'. $id .'['.$order.'][url]" id="'. $id .'_'.$order .'_slide_url" value="'. $val['url'] .'" />';
		
		$slider .= '<div class="upload_button_div"><span class="button media_upload_button" id="'.$id.'_'.$order .'">Upload</span>';
		
		if(!empty($val['url'])) {$hide = '';} else { $hide = 'hide';}
		$slider .= '<span class="button remove-image '. $hide.'" id="reset_'. $id .'_'.$order .'" title="' . $id . '_'.$order .'">Remove</span>';
		$slider .='</div>' . "\n";
		$slider .= '<div class="screenshot">';
		if(!empty($val['url'])){
			
	    	$slider .= '<a class="of-uploaded-image" href="'. $val['url'] . '">';
	    	$slider .= '<img class="of-option-image" id="image_'.$id.'_'.$order .'" src="'.$val['url'].'" alt="" />';
	    	$slider .= '</a>';
			
			}
		$slider .= '</div>';	
		$slider .= '<label>Link URL (optional)</label>';
		$slider .= '<input class="slide of-input" name="'. $id .'['.$order.'][link]" id="'. $id .'_'.$order .'_slide_link" value="'. $val['link'] .'" />';
		
		$slider .= '<label>Description (optional)</label>';
		$slider .= '<textarea class="slide of-input" name="'. $id .'['.$order.'][description]" id="'. $id .'_'.$order .'_slide_description" cols="8" rows="8">'.stripslashes($val['description']).'</textarea>';
	
		$slider .= '<a class="slide_delete_button" href="#">Delete</a>';
	    $slider .= '<div class="clear"></div>' . "\n";
	
		$slider .= '</div>';
		$slider .= '</li>';
	
		return $slider;
		
	}

	
}//end Options Machine class

?>
