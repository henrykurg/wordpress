<?php
/**
 * Main functions
 *
 * @package Loader
 * @since 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}



/**
 * Preloader style
 *
 * @version	1.2.2
 * @since 1.0.0
 * @package	Loader
 */

function loader_style() {
	?>
<style type="text/css">
<?php if ( get_theme_mod('loader_style_select') == 2 ) {
echo '
.spinner {
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto; '; ?>
	width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	height: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	background-color:<?php echo get_theme_mod('loader_primary_color', '#222'); ?>;
<?php
echo '
	border-radius: 100%;
	-webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
	animation: sk-scaleout 1.0s infinite ease-in-out;
}
@-webkit-keyframes sk-scaleout {
	0% { -webkit-transform: scale(0) }
	100% {
		-webkit-transform: scale(1.0);
		opacity: 0;
	}
}
@keyframes sk-scaleout {
	0% {
		-webkit-transform: scale(0);
		transform: scale(0);
	}
	100% {
		-webkit-transform: scale(1.0);
		transform: scale(1.0);
		opacity: 0;
	}
}';

}?>




<?php if ( get_theme_mod('loader_style_select', 1) == 1 ) {
echo '
.spinner {'; ?>
	width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	height: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	border: 5px solid <?php echo get_theme_mod('loader_secondary_color' , '#f2f2f2'); ?>;
	border-top: 5px solid <?php echo get_theme_mod('loader_primary_color' , '#222'); ?>;
<?php
echo '
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	animation: spin 1s infinite cubic-bezier(0, 0, 0, 0);
	z-index: 100000;
}

@keyframes spin {
	from {
		transform: rotate(0deg);
	}
	to {
		transform: rotate(360deg);
	}
}';

}?>


<?php if ( get_theme_mod('loader_style_select') == 3 ) {
echo '
.loader-loader {
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto; 
	width: 80px;
	height: 80px;
  display: inline-block;
}

.loader-loader div {'; ?>
  border: 4px solid <?php echo get_theme_mod('loader_primary_color' , '#222'); ?>;<?php
echo '
  position: absolute;
  opacity: 1;
  border-radius: 50%;
  animation: loader-loader 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
}

.loader-loader div:nth-child(2) {
  animation-delay: -0.5s;
}

@keyframes loader-loader {
  0% {
    top: 36px;
    left: 36px;
    width: 0;
    height: 0;
    opacity: 1;
  }
  100% {
    top: 0px;
    left: 0px;
    width: 72px;
    height: 72px;
    opacity: 0;
  }
}';

}?>
<?php if ( get_theme_mod('loader_style_select') == 4 ) {
echo '
.loader-loader {
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	display: inline-block;
	width: 80px;
	height: 80px;
}
.loader-loader div {
  position: absolute;
  top: 33px;
  width: 13px;
  height: 13px;
  border-radius: 50%;';?>
  background: <?php echo get_theme_mod('loader_primary_color' , '#222'); ?>;
<?php echo '
  animation-timing-function: cubic-bezier(0, 1, 1, 0);
}
.loader-loader div:nth-child(1) {
  left: 8px;
  animation: loader-loader1 0.6s infinite;
}
.loader-loader div:nth-child(2) {
  left: 8px;
  animation: loader-loader2 0.6s infinite;
}
.loader-loader div:nth-child(3) {
  left: 32px;
  animation: loader-loader2 0.6s infinite;
}
.loader-loader div:nth-child(4) {
  left: 56px;
  animation: loader-loader3 0.6s infinite;
}
@keyframes loader-loader1 {
  0% {
    transform: scale(0);
  }
  100% {
    transform: scale(1);
  }
}
@keyframes loader-loader3 {
  0% {
    transform: scale(1);
  }
  100% {
    transform: scale(0);
  }
}
@keyframes loader-loader2 {
  0% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(24px, 0);
  }
}';
}?>

<?php if ( get_theme_mod('loader_style_select') == 5 ) {
echo '
.spinner {
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
	border-radius:0;';?>
	width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	height: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	background-color: <?php echo get_theme_mod('loader_primary_color' , '#222'); ?>;
<?php echo '
  -webkit-animation: loaderani 1s infinite ease-in-out;
  animation: loaderani 1s infinite ease-in-out;
}

@-webkit-keyframes loaderani {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes loaderani {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } 50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
  } 100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}
';
}?>


<?php if ( get_theme_mod('loader_style_select') == 6) {
echo '.spinner {
	border-radius: 100%;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
'; ?>
	width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
	height: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
<?php echo '}
.bounce-1, .bounce-2 {
  width: 100%;
  height: 100%;
  border-radius: 50%;'; ?>
  background-color: <?php echo get_theme_mod('loader_primary_color' , '#222'); ?>;
<?php echo '
  opacity: 0.6;
  position: absolute;
  top: 0;
  left: 0;
  
  -webkit-animation: loaderani-1 2.0s infinite ease-in-out;
  animation: loaderani-1 2.0s infinite ease-in-out;
}

.bounce-2 {
  -webkit-animation-delay: -1.0s;
  animation-delay: -1.0s;
}

@-webkit-keyframes loaderani-1 {
  0%, 100% { -webkit-transform: scale(0.0) }
  50% { -webkit-transform: scale(1.0) }
}

@keyframes loaderani-1 {
  0%, 100% { 
    transform: scale(0.0);
    -webkit-transform: scale(0.0);
  } 50% { 
    transform: scale(1.0);
    -webkit-transform: scale(1.0);
  }
}'; }?>


.bbpreloading {
	height: 100vh;
	width: 100vw;
	background:<?php echo get_theme_mod('loader_bg_color' , '#fff'); ?>;
	position: fixed;
	left: 0;
	top: 0;
	opacity: 1;
	z-index: 100000;
}

.hidepreloader {
	visibility: hidden !important;
	opacity: 0 !important;
	transition: 1s;
}


.random-quote {
    display: block;
    position: absolute;
    bottom: 10%;
    margin: 0;
    color:<?php echo get_theme_mod('loader_quote_color' , '#222'); ?>;
    text-align: center;
    width: 100%;
    padding-left: 20px;
    padding-right: 20px;
    font-size: <?php echo get_theme_mod('loader_quote_size' , '20'); ?>px;
}

.loader-image {
  display: block;
  margin: auto;
  padding-top: calc(55vh - <?php echo get_theme_mod('loader_size' , '50'); ?>px);
  width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
}

.loader-img-ani{
    animation: loaderani-img 1s infinite;
    width: <?php echo get_theme_mod('loader_size' , '50'); ?>px;
}



<?php if ( get_theme_mod('loader_style_image') == 'scale') {
echo '
@-webkit-keyframes loaderani-img {
    from {
    	transform:scale(.5);
        -webkit-transform:scale(.5);
    }
    to {
    	transform:scale(1);
        -webkit-transform:scale(1);
    }
}';
}?>




<?php if ( get_theme_mod('loader_style_image') == 'rotate') {
echo '
@-webkit-keyframes loaderani-img {
    from {
    	transform:rotate(0deg);
        -webkit-transform:rotate(0deg);
    }
    to {
    	transform:rotate(360deg);
        -webkit-transform:rotate(360deg);
    }
}';
}?>



<?php if ( get_theme_mod('loader_style_image') == 'blink') {
echo '
@-webkit-keyframes loaderani-img {
    from {
    opacity: 0;
    }
    to {
    opacity: 1;
    }
}';
}?>

<?php if ( get_theme_mod('loader_style_image') == 'flip') {
echo '
@-webkit-keyframes loaderani-img {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes loaderani-img {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
  } 50% { 
    transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
  } 100% { 
    transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
  }
}
';
}?>


</style>

<?php
}

// Add css to head
add_action('wp_head', 'loader_style'); 