$(document).ready(function() { init()})

function init() {
};

$('.home').on('click', function(){
	$('.home-expand').addClass('active');
	$('.twitter-expand').removeClass('active');
	$('.insta-expand').removeClass('active');
});

$('.insta').on('click', function(){
	$('.insta-expand').addClass('active');
	$('.home-expand').removeClass('active');
	$('.twitter-expand').removeClass('active');
});

$('.twitter').on('click', function(){
	$('.twitter-expand').addClass('active');
  $('.home-expand').removeClass('active');
	$('.insta-expand').removeClass('active');
});
