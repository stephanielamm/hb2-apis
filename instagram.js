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
				var date = new Date(data.created_time * 1000);
				var day = date.getDay();

				insta += '<div class="instagram-loop">'

						insta += '<div class="row">'
							insta += '<div class="col-md-2">'8
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">'
							insta += '<img width="30px" class="instagram-profilepictures" src="' + data.user.profile_picture + '">'

							insta += '</div>'
							insta += '<div class="col-md-10">'
							style="url('"+data.images.low_resolution.url+"')";
							insta += '<a target="_blank" href="'+data.link+'"><div class="wrapper" style="background-image:' + style + '"></div></a>'
							insta += '<p class="instagram-username">'
							insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</a></p>'
							insta += '<br></a></div>'
							insta += '<div class="instagram-date-div">'

													insta += '</div>'

													insta += '</div>'


						insta += '<div class="instagram-caption-div">'
						insta += '<span class="instagram-username-caption">'
						insta += '<a target="_blank" href="http://www.instagram.com/' + data.user.username + '">' + data.user.username + '</span></a>' + '<span class="hashtags">' + data.caption.text + '</span'
						insta += '<div class="instagram-likes"><img class="heart" src="instalink.png" alt="instalink"><span class="likes-number">' + data.likes.count + '</span><span class="likes"> likes</span></div>'

						insta += '</div>'
						insta += '</div>'
			});




			console.log(insta);
			$("#results").append(insta);

		}

	})
