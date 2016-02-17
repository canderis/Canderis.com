<?php
/*
 *  canderis.com | Scott C Huffman | 2016
 */
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once('posts.php') ?>

		<title>Canderis | Music, Modding, Code</title>

		<meta charset="UTF-8">
		<meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<link href='https://fonts.googleapis.com/css?family=Exo+2:100|Titillium+Web:200' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	</head>

	<body><div class = "wrap">
		<div class = "nav-wrap">
			<img src="img/site-banner.png" alt="Site Banner" style="width: 200px; max-width: 90%;">
			<hr id = "top-hr" style="width: 120px; max-width: 90%;">
			<div class = "button-wrap">
				<!--<button id="nav-button-0" class="nav-button">
					<span class="button-grow"><span class="bracket">[</span><i class="fa fa-briefcase"></i> Portfolio </span><span class="bracket">]</span>
				</button>-->

				<button id="nav-button-2" class="nav-button">
					<span class="button-grow"><span class="button-bracket">[</span><i class="fa fa-question"></i> About </span><span class="button-bracket">]</span>
				</button>

				<button id="nav-button-1" class="nav-button">
					<span class="button-grow"><span class="button-bracket">[</span><i class="fa fa-cogs"></i> Mods </span><span class="button-bracket">]</span>
				</button>

				<a href="https://github.com/canderis/" target="_blank" id="nav-button-3" class="nav-button">
					<span class="button-grow"><span class="button-bracket">[</span> <i class="fa fa-github"></i> GitHub </span><span class="button-bracket">]</span>
				</a>

				<button id="nav-button-4" class="nav-button">
					<span class="button-grow"><span class="button-bracket">[</span> <i class="fa fa-envelope"></i> Contact </span><span class="button-bracket">]</span>
				</button>
			</div>
			<hr id = "bottom-hr" style="width: 120px;">
		</div>
		
		<div id = "content-area" class = "content-area">
			<div class="mod-list"><?php processPosts('mods.php'); ?></div>

			<div class="about-page">
				<h3><span class="bracket">[</span>About Me<span class="bracket">]</span></h3>
				<p>My name is Scott Huffman, but I go by the psudonym Canderis online. I'm a computer science major, and professional web-developer/designer with significant experience with PHP, SQL (MSSQL, SQLSRV & MySQL), JavaScript-Sencha and JQuery, and HTML/CSS as well as some experience with C++, Java, Visual Basic, among others.
				<p>Outside of coding I am minoring in graphic design. I have worked in Photoshop, 3dsMax, as well as Engineering programs such as Inventor and Solidworks. I am an avid music fan and play multiple instruments. 
				<p> Feel free to contact me with any questions.
			</div>

			<div class="contact-page">
				<h3><span class="bracket">[</span>Contact<span class="bracket">]</span></h3>
			</div>

		</div>

		<script>
			var wrapHeight;
			$(function(){
				var wrap = $(".nav-wrap");
				wrapHeight = wrap.height();
			});

			$('.nav-button').click(function() {
				var id = $(this).attr('id');
				if(id === 'nav-button-3'){
					return;
				}
				var ids = [];
				$('.nav-button, .button-off').each(function () {
					var button = $("#" + $(this).attr('id'));
					button.prop("disabled", false);
					button.attr("class", "nav-button");
				});

				var currentButton = $("#"+ id);
				currentButton.prop("disabled", true);
				currentButton.attr("class","button-off");

				var wrap = $(".nav-wrap");
				wrap.animate({top:( ($(document).height() * .07) | 0 ) + "px"}, "slow");
				$(".button-wrap").animate({width: '800px'}, 1000);
				$("#top-hr").animate({width:'400px'});

				var modList = $(".mod-list");
				var about = $(".about-page");
				var contact = $(".contact-page");

				modList.fadeOut(500);
				about.fadeOut(500);
				contact.fadeOut(500);
				$("#bottom-hr").animate({width:'400px'}, function(){
					var content = $("#content-area");
					content.css("display", "block");
					content.css('margin-top', ((($(document).height() * .07) | 0 )) + 20 + "px");

					var height = ( $(document).height() - (($(document).height() * .07) | 0 ) - wrapHeight );
					var fadeElem;
					switch(id){
						case 'nav-button-1':
							fadeElem = modList;
							break;
						case 'nav-button-2':
							fadeElem = about;
							break;
						case 'nav-button-4':
							fadeElem = contact;
							break;
						default:
							console.log('error');
							return;
					}
					if( height > fadeElem.height() ) height = fadeElem.height() ;

					content.animate({'height': height + "px"}, function(){ fadeElem.fadeIn(500); });
				});
			});
		</script>

	</div></body>
</html>