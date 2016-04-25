$(document).ready(function() { init()})

function init() {
//Tabletop.init( { key: 'link here',
                  //callback: portfolio,
                  //simpleSheet: true } )
};

//function portfolio(data, tabletop) {
	//var clip_data = data;
//	_.each(data, function(e, idx, list){
	//	var compiled = _.template($('script.template-portfolio').html());
	//	$('#portfolio-list').append(compiled({ 'clip': e }));
	//	console.log(e.title);
	//});
//};

// 	$("#result").load("index.html"), function(){
// 		$('.portfolio-expand').removeClass('active');
// 		$('.resume-expand').removeClass('active');
// 		$('.contact-expand').removeClass('active');
// 		$('.about-expand').removeClass('active');
// 		$('.home-expand').addClass('active');
// }


$('.home').on('click', function(){
	$('.home-expand').addClass('active');
	$('.twitter-expand').removeClass('active');
	$('.insta-expand').removeClass('active');
});

$('.insta').on('click', function(){
	$('.home-expand').removeClass('active');
	$('.twitter-expand').removeClass('active');
	$('.insta-expand').addClass('active');
});

$('.twitter').on('click', function(){
  $('.home-expand').removeClass('active');
	$('.twitter-expand').addClass('active');
	$('.insta-expand').removeClass('active');
});
