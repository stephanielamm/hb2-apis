// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=1305ecaf399a47aa9941e7cfb970e8ae&redirect_uri=http://steventking.com/apps/instagram&response_type=token

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id


$(function() {

	var tag= "wearenotthis";

	var apiurl = "https://api.instagram.com/v1/tags/"+tag+"/media/recent?access_token=248660894.aee21ef.0cb44e17e81547ef994d0de5ff989bbc&callback=?"
	var access_token = location.hash.split('=')[1];
	var insta = ""

	$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: IGparseData
		});



		function IGparseData(json){
			console.log(json);

			var i = 0;

			$.each(json.data,function(i,data){

				insta += '<div class="instagram-loop">'

			 //profile row
			 insta +='<div class="container-fluid">'
			 insta += '<div class="row">'
							insta += '<div class="col-sm-12 ig-prof-mobile">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">'
							insta += '<img width="30px" class="instagram-profilepictures" src="' + data.user.profile_picture + '">'
							insta += '<p class="instagram-username">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</a></p>'
							style="url('"+data.images.low_resolution.url+"')";
							insta += '</div>' //ends profile col
							insta += '</div>' //ends profile row


					//photo row
							insta += '<div class="row">'
							insta += '<div class="col-sm-12>'
							insta += '<a target="_blank" href="'+data.link+'"><div class="wrapper" style="background-image:' + style + '"></div></a>' //ends photo col
							insta += '</a></div>' //end photo row

							//profile row
							insta += '<div class="row">'
							insta += '<div class="col-sm-12 ig-prof-desktop">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">'
							insta += '<img width="60px" class="instagram-profilepictures" src="' + data.user.profile_picture + '">'
							insta += '<p class="instagram-username">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</a></p>'
							style="url('"+data.images.low_resolution.url+"')";
							insta += '</div>' //end profile col
							insta += '</div>'//end profile row
									//caption row
							insta += '<div class="row">'
							insta += '<div class="col-sm-12">'
							insta += '<div class="instagram-caption-div" style="padding-top:25px">'
							insta += '<div class="instagram-likes"><span class="likes-number">' + data.likes.count + '</span><span class="likes"> likes</span></div>'
							insta += '<span class="instagram-username-caption">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</span></a>' + '<span class="hashtags">' + data.caption.text + '</span>'
							insta += '</br><a target="_blank" href="'+data.link+'"><img class="insta-caption-link" src="instalink.png" alt="instalink" style="padding-bottom:30px"> </a>'
							insta += '</div>' //end caption col
						insta += '</div>'//end caption row

						insta += '</div>'//end container fluid

						insta += '</div>'//end loop
						insta += '</div>'//end loop


			});




			console.log(insta);
			$("#results").append(insta);

		}

	})
