// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=1305ecaf399a47aa9941e7cfb970e8ae&redirect_uri=http://steventking.com/apps/instagram&response_type=token

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id


$(function() {

	var tag= "wearenotthis";

	var IGapiurl = "https://api.instagram.com/v1/tags/"+tag+"/media/recent?access_token=248660894.aee21ef.0cb44e17e81547ef994d0de5ff989bbc&callback=?"
	var access_token = location.hash.split('=')[1];
	var igHtml = ""

		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: IGapiurl,
			success: IGparseData
		});


		function IGparseData(json){
			console.log(json);

			$.each(json.data,function(i,data){
				style="url('"+data.images.low_resolution.url+"')";
				igHtml += '<a target="_blank" href="'+data.link+'"><div class="wrapper" style="background-image:' + style + '"></div></a>'
			});

			console.log(igHtml);
			$("#results").append(igHtml);

		}

	})
