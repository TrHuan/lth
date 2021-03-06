<?php
function check_main( $theme ) {
	global $themechecks, $data, $themename;
	$themename = $theme;
	$theme = get_theme_root( $theme ) . "/$theme";
	$files = listdir( $theme );
	$data = tc_get_theme_data( $theme . '/style.css' );
	if ( $data[ 'Template' ] ) {
		// This is a child theme, so we need to pull files from the parent, which HAS to be installed.
		$parent = get_theme_root( $data[ 'Template' ] ) . '/' . $data['Template'];
		if ( ! tc_get_theme_data( $parent . '/style.css' ) ) { // This should never happen but we will check while were here!
			echo '<h2>' . sprintf(__('Parent theme %1$s not found! You have to have parent AND child-theme installed!', 'theme-check'), '<strong>' . $data[ 'Template' ] . '</strong>' ) . '</h2>';
			return;
		}
		$parent_data = tc_get_theme_data( $parent . '/style.css' );
		$themename = basename( $parent );
		$files = array_merge( listdir( $parent ), $files );
	}

	if ( $files ) {
		foreach( $files as $key => $filename ) {

			if ( strpos( $filename, 'tgm-plugin-activation' ) === false && strpos( $filename, 'merlin' ) === false ) :
				if ( substr( $filename, -4 ) == '.php' && ! is_dir( $filename ) ) {
					$php[$filename] = file_get_contents( $filename );
					$php[$filename] = tc_strip_comments( $php[$filename] );
				}
				else if ( substr( $filename, -4 ) == '.css' && ! is_dir( $filename ) ) {
					$css[$filename] = file_get_contents( $filename );
				}
				else {
					$other[$filename] = ( ! is_dir($filename) ) ? file_get_contents( $filename ) : '';
				}
			endif;
		}

		// run the checks.
		$success = run_themechecks( $php, $css, $other );

		global $checkcount;

		// second loop, to display the errors.
		echo '<h2>' . esc_html__( 'Theme Info', 'theme-check' ) . ': </h2>';
		echo '<div class="theme-info">';
		if ( file_exists( trailingslashit( WP_CONTENT_DIR . '/themes' ) . trailingslashit( basename( $theme ) ) . 'screenshot.png' ) ) {
			$image = getimagesize( $theme . '/screenshot.png' );
			echo '<div style="float:right" class="theme-info"><img style="max-height:180px;" src="' . trailingslashit( WP_CONTENT_URL . '/themes' ) . trailingslashit( basename( $theme ) ) . 'screenshot.png" />';
			echo '<br /><div style="text-align:center">' . $image[0] . 'x' . $image[1] . ' ' . round( filesize( $theme . '/screenshot.png' ) / 1024 ) . 'k</div></div>';
		}

		echo ( ! empty( $data['Title'] ) ) ? '<p><label>' . esc_html__( 'Title', 'theme-check' ) . '</label><span class="info">' . esc_html( $data['Title'] ) . '</span></p>' : '';
		echo ( ! empty( $data['Version'] ) ) ? '<p><label>' . esc_html__( 'Version', 'theme-check' ) . '</label><span class="info">' . esc_html( $data['Version'] ) . '</span></p>' : '';
		echo ( ! empty( $data['AuthorName'] ) ) ? '<p><label>' . esc_html__( 'Author', 'theme-check' ) . '</label><span class="info">' . esc_html( $data['AuthorName'] ) . '</span></p>' : '';
		echo ( ! empty( $data['AuthorURI'] ) ) ? '<p><label>' . esc_html__( 'Author URI', 'theme-check' ) . '</label><span class="info"><a href="' . esc_attr( $data['AuthorURI'] ) . '">' . $data['AuthorURI'] . '</a></span></p>' : '';
		echo ( ! empty( $data['URI'] ) ) ? '<p><label>' . esc_html__( 'Theme URI', 'theme-check' ) . '</label><span class="info"><a href="' . esc_attr( $data['URI'] ) . '">' . $data['URI'] . '</a></span></p>' : '';
		echo ( ! empty( $data['License'] ) ) ? '<p><label>' . esc_html__( 'License', 'theme-check' ) . '</label><span class="info">' . esc_html( $data['License'] ) . '</span></p>' : '';
		echo ( ! empty( $data['License URI'] ) ) ? '<p><label>' . esc_html__( 'License URI', 'theme-check' ) . '</label><span class="info">' . $data['License URI'] . '</span></p>' : '';
		echo ( ! empty( $data['Tags'] ) ) ? '<p><label>' . esc_html__( 'Tags', 'theme-check' ) . '</label><span class="info">' . implode( ', ', $data['Tags'] ) . '</span></p>' : '';
		echo ( ! empty( $data['Description'] ) ) ? '<p><label>' . esc_html__( 'Description', 'theme-check' ) . '</label><span class="info">' . $data['Description'] . '</span></p>' : '';

		if ( $data[ 'Template' ] ) {
		if ( $data['Template Version'] > $parent_data['Version'] ) {
			echo '<p>' . sprintf(
				__('This child theme requires at least version %1$s of theme %2$s to be installed. You only have %3$s please update the parent theme.', 'theme-check'),
				'<strong>' . $data['Template Version'] . '</strong>',
				'<strong>' . $parent_data['Title'] . '</strong>',
				'<strong>' . $parent_data['Version'] . '</strong>'
			) . '</p>';
		}
			echo '<p>' . sprintf(
				__( 'This is a child theme. The parent theme is: %s. These files have been included automatically!', 'theme-check'),
				'<strong>' . $data[ 'Template' ] . '</strong>'
			) . '</p>';
			if ( empty( $data['Template Version'] ) ) {
				echo '<p>' . __('Child theme does not have the <strong>Template Version</strong> tag in style.css.', 'theme-check') . '</p>';
			} else {
				echo ( $data['Template Version'] < $parent_data['Version'] ) ? '<p>' . sprintf(__('Child theme is only tested up to version %1$s of %2$s breakage may occur! %3$s installed version is %4$s', 'theme-check'), $data['Template Version'], $parent_data['Title'], $parent_data['Title'], $parent_data['Version'] ) . '</p>' : '';
			}
		 }
		echo '</div><!-- .theme-info-->';

		$plugins = get_plugins( '/Envato-Theme-Check' );
		//$version = explode( '.', $plugins['theme-check.php']['Version'] );
		echo '<p>' . sprintf(
			__(' Running %1$s tests against %2$s', 'theme-check'),
			'<strong>' . $checkcount . '</strong>',
			'<strong>' . $data[ 'Title' ] . '</strong>'
			/*'<strong>' . $version[0] . '</strong>'
			'<strong>' . $version[1] . '</strong>'*/
		) . '</p>';
		$results = display_themechecks();
		if ( !$success ) {
			echo '<h2>' . sprintf(__('One or more errors were found for %1$s.', 'theme-check'), $data[ 'Title' ] ) . '</h2>';
		} else {
			echo '<h2>' . sprintf(__('%1$s passed the tests', 'theme-check'), $data[ 'Title' ] ) . '</h2>';
			tc_success();
		}
		if ( !defined( 'WP_DEBUG' ) || WP_DEBUG == false ) echo '<div class="updated"><span class="tc-fail">' . __('WARNING','theme-check') . '</span> ' . __( '<strong>WP_DEBUG is not enabled!</strong> Please test your theme with <a href="https://codex.wordpress.org/Editing_wp-config.php">debug enabled</a> before you upload!', 'theme-check' ) . '</div>';
		echo '<div class="tc-box">';
		echo '<ul class="tc-result">';
		echo $results;
		echo '</ul></div>';
	}
}

// strip comments from a PHP file in a way that will not change the underlying structure of the file
function tc_strip_comments( $code ) {
	$strip = array( T_COMMENT => true, T_DOC_COMMENT => true);
	$newlines = array( "\n" => true, "\r" => true );
	$tokens = token_get_all($code);
	reset($tokens);
	$return = '';
	$token = current($tokens);
	while( $token ) {
		if( !is_array($token) ) {
			$return.= $token;
		} elseif( !isset( $strip[ $token[0] ] ) ) {
			$return.= $token[1];
		} else {
			for( $i = 0, $token_length = strlen($token[1]); $i < $token_length; ++$i )
			if( isset($newlines[ $token[1][$i] ]) )
			$return.= $token[1][$i];
		}
		$token = next($tokens);
	}
	return $return;
}


function tc_intro() {
?>
	<h2><?php _e( 'About', 'theme-check' ); ?></h2>
	<p><?php _e( "The Envato Theme Check plugin is an easy way to test your theme and make sure it's up to date with the latest Themeforest review standards. With it, you can run all the same automated testing tools on your theme that Themeforest Reviewers use for theme submissions.", 'theme-check' ); ?></p>
	<?php
}

function tc_success() {
	?>
	<div class="tc-success">
		<p><?php _e( 'Congratulations! Your theme has passed the basic tests.', 'theme-check' ); ?></p>

		<p><?php _e( 'Next, import the <a href="//codex.wordpress.org/Theme_Unit_Test">WordPress Theme Unit Test Data</a> and ensure all default content is properly formatted.', 'theme-check' ); ?></p>

		<p><?php _e( 'Finally, review the <a href="//help.market.envato.com/hc/en-us/articles/202822450-WordPress-Theme-Submission-Requirements">WordPress Theme Submission Requirements</a> before uploading your WordPress Theme.', 'theme-check' ); ?></p>
	</div>
	<?php
}

function tc_form() {
	$themes = tc_get_themes();
	echo '<form action="themes.php?page=envato_theme_check" method="post">';
	echo '<select name="themename">';
	foreach( $themes as $name => $location ) {
		echo '<option ';
		if ( isset( $_POST['themename'] ) ) {
			echo ( $location['Stylesheet'] === $_POST['themename'] ) ? 'selected="selected" ' : '';
		} else {
			echo ( basename( STYLESHEETPATH ) === $location['Stylesheet'] ) ? 'selected="selected" ' : '';
		}
		echo ( basename( STYLESHEETPATH ) === $location['Stylesheet'] ) ? 'value="' . $location['Stylesheet'] . '" style="font-weight:bold;">' . $name . '</option>' : 'value="' . $location['Stylesheet'] . '">' . $name . '</option>';
	}
	echo '</select>';
	echo '<input class="button" type="submit" value="' . __( 'Check it!', 'theme-check' ) . '" />';
	if ( defined( 'TC_PRE' ) || defined( 'TC_POST' ) ) echo ' <input name="trac" type="checkbox" /> ' . __( 'Output in Trac format.', 'theme-check' );
	echo '<input name="s_info" type="checkbox" /> ' . __( 'Suppress INFO.', 'theme-check' );
	echo '</form>';
}
