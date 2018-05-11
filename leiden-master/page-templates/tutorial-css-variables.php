<?php 

/**
 * Template Name: Css Variables Tutorial
 */ 

add_action( 'wp_enqueue_scripts', 'enqueue_tutorial_styles' );
function enqueue_tutorial_styles(){
  wp_enqueue_style( 'tutorial-css-variables', get_stylesheet_directory_uri() . '/css/tutorial-css-variables.css' );
  wp_enqueue_script( 'tutorial-css-variables', get_stylesheet_directory_uri() . '/js/tutorial-css-variables.js' );
}

// function enqueue_tutorial_scripts() {
//     wp_enqueue_script( 'tutorial-css-variables', get_stylesheet_directory_uri() . '/js/tutorial-css-variables.js' );
// }

  function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unkown';
    $platform = 'Unkown';
    $version = "";

    // First get the platform
    if ( preg_match( '/linux/i', $uagent ) ) {
      $platform = 'linux';
    }
    elseif ( preg_match( '/macintosh|mac os x/i', $u_agent ) ) {
      $platform = 'mac';
    }
    elseif ( preg_match( '/windows|win32/i', $u_agent ) ) {
      $platform = 'windows';
    }

    // Next get the name of the user agent separately
    if( preg_match( '/MSIE/i', $u_agent ) && !preg_match( '/Opera/i', $uagent ) ) {
      $bname = 'Internet Explorer';
      $ub = "MSIE";
    }

    elseif ( preg_match('/Firefox/i', $u_agent) ) {
      $bname = 'Mozilla Firefox';
      $ub = "Firefox";
    }

    elseif ( preg_match('/Chrome/i', $u_agent) ) {
      $bname = 'Google Chrome';
      $ub = "Chrome";
    }

    elseif ( preg_match('/Safari/i', $u_agent) ) {
      $bname = 'Apple Safari';
      $ub = "Safari";
    }

    elseif ( preg_match('/Opera/i', $u_agent) ) {
      $bname = 'Opera';
      $ub = "Opera";
    }

    elseif ( preg_match('/Netscape/i', $u_agent) ) {
      $bname = 'Netscape';
      $ub = "Netscape";
    }

    // Finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+)?<version>[0-9.|a-zA-Z.]*)#'

    if ( !preg_match_all( $pattern, $u_agent, $matches ) ) {
      // we have no matching number - just continue
    }

    // see how many we have
    $i = count( $matches['browser'] );

    if( $i != 1 ) {
      // we will have two, since we are not using 'other' argument yet

      // see if version is before of after the name
      if ( strpos( $u_agent, "Version" ) < strripos($u_agent, $ub) ) {
        $version = $matches['version'][0];
      }
      else {
        $version = $matches['version'][1];
      }
    }
    else $version = $matches['version'][0];
  }

  // check if we have a number
  if ( $version == null || $version == "" ) {
    $version = "?";
  }
  return array( 
    'userAgent' => $u_agent,
    'name' => $bname,
    'version' => $version,
    'platform' => $platform,
    'pattern' => $pattern
  );
}

// now try it
$ua = getBrowser();
$your_browser = "Your broswer: " . $ua['name'] . " " . $ua['version'] . 
  "on" . $ua['platform'] , " reports: <br />" . $ua['userAgent'];

print_r($your_browser);


add_action( 'genesis_entry_content', 'create_buttons' );
function create_buttons() { ?>

  <div class="ex-1">
    <h2>Example 1</h2>
    <button class="btn">Hello</button>
    <button class="btn red">Hello Red</button>
  </div>

  <div class="theme">
    <h2>Example 2</h2>
  </div>

  <article>
<main class="booth">
 <aside class="slider">
  <label>Move this 👇 </label>
  <input class="booth-slider" type="range" min="-50" max="50" value="-50" step="5"/>
 </aside>
 
 <section class="color-boxes">
  <div class="color-box" id="1"><input value="red"/></div>
  <div class="color-box" id="2"><input/></div>
  <div class="color-box" id="3"><input/></div>
  <div class="color-box" id="4"><input/></div>
  <div class="color-box" id="5"><input/></div>
  <div class="color-box" id="6"><input/></div>
 </section>

 <footer class="instructions">
  👉🏻 Move the slider<br/>
  👉🏻 Write any color in the red boxes 
 </footer>
</main>

  </article>

<?php }


genesis();

