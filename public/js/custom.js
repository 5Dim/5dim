// Hover move listing
$(document).ready(function() {

	// cufon
	Cufon.replace('.custom, .link-button, #nav>li>a, #social-bar, h1, h2, h3, h4, h5, h6, .bullet-title .big, .bullet-title .small, .title, .subtitle, .portfolio-sidebar ul li a, .post-title, #sidebar ul li a, .staff .information .header .name, .headline, .creditos-tit .big, .creditos-tit .small, .creditos-tit .big2, .creditos-tit .big3 ', { 
				fontFamily: 'bebas-neue',
				hover: true	
	});
	
	Cufon.replace('.registro', { 
				fontFamily: 'bebas-neue',
				fontSize: '14px',
				hover: true	
	});
	
	Cufon.replace('.interact a.twitter_reply_icon, .interact a.twitter_retweet_icon, .interact a.twitter_fav_icon', { 
				fontFamily: 'bebas-neue',
				fontSize: '14px',
				hover: true	
	});
	
	
	// rollovers
	$("#sidebar li ul li.cat-item a, .portfolio-sidebar ul li a").hover(function() { 
		// on rollover	
		$(this).stop().animate({ 
			marginLeft: "7" 
		}, "fast");
	} , function() { 
		// on out
		$(this).stop().animate({
			marginLeft: "0" 
		}, "fast");
	});
	
	
	//superfish
	
	$("ul.sf-menu").superfish({
		  autoArrows:  true, // disable generation of arrow mark-up
		  animation: {height:'show'},
		  speed: 'fast'
	}); 
	
	

	
	
		
	// slideshow
  	$('#slides')
  	.before('<div id="slideshow-nav-holder"><div id="slideshow-nav">')
  	.cycle({ 
		fx:     'scrollHorz', 
		speed:  100, 
		timeout: 4000, 
		pause: 1,
		pager:  '#slideshow-nav',
		next:   '#next', 
		prev:   '#prev'
	});


	

	// tooltip
	$.tools.tooltip.addEffect("fade",
		// opening animation
		function(done) {
			this.getTip().fadeIn();
			done.call();
		},
		// closing animation
		function(done) {
			this.getTip().fadeOut();
			done.call();
		}
	);

	$(".social-tooltip").tooltip({
		effect: 'fade',
		offset: [0, 0],
		tipClass: 'tooltip-social'
	});
	
	

		
//close			
});
	


// search clearance	
function defaultInput(target){
	if((target).value == 'Search...'){(target).value=''}
}

function clearInput(target){
	if((target).value == ''){(target).value='Search...'}
}

// login clearance	
function login_defaultInput(target){
	if((target).value == 'User' || (target).value == 'Pass'){(target).value=''}
}

function user_clearInput(target){
	if((target).value == ''){(target).value='User'}
}
function pass_clearInput(target){
	if((target).value == ''){(target).value='Pass'}
}


