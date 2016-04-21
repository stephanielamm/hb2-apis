
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0">
  <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HB2</title>
  <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
  <script src="instagram.js" type="text/javascript"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet">
  <style>
    html, body {
      height: 50%;
      margin: 30;
      padding: 30;
    }
    #map {
      height: 50%;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row header">This is the header space

    <div class="row">
      <div class="col-xs-12">
        <iframe width="100%" height="750" src="https://www.youtube.com/embed/4S5eDb3DEME" frameborder="0" allowfullscreen style="display:block; margin: 0 auto;"></iframe>

</div>
</div>
</div>

<div class="row">
  short informational paragraph goes here
</div>

<div class="row">
  infographic from 182 goes here
</div>

    <div class="row">
    <div id="map" class="col-xs-4">
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJTGfgRzYN1jJhpYcOaJnSUkSF234psEA&callback=initMap"
    async defer></script>
    </div>
    </div>

    <div class="row">
      <div class="col-xs-4">news</div>

      <div class="col-xs-4">Twitter
        <?php
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');

        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "1968176760-FT4k4xYAiacrn1LSSIM1qt8ye3j4keuTxOqtiq4",
            'oauth_access_token_secret' => "WBlbTTYQ9ptvSiuDeTW7rQPkG93hD2syFrBYTIohe9uSV",
            'consumer_key' => "6Q98Cp8LsAE2tOxvrWR8apZOU",
            'consumer_secret' => "Yh5Fzv8PDajC68uwUSvjWLa3cwaHof1tvxTKex8uKj4mSurZOB"

        );

        /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
        $url = 'https://api.twitter.com/1.1/blocks/create.json';
        $requestMethod = 'POST';

        /** POST fields required by the URL above. See relevant docs as above **/
        $postfields = array(
            'screen_name' => 'usernameToBlock',
            'skip_status' => '1'
        );

        /** Perform a POST request and echo the response **/
        // $twitter = new TwitterAPIExchange($settings);
        // echo $twitter->buildOauth($url, $requestMethod)
        //              ->setPostfields($postfields)
        //              ->performRequest();

        /** Perform a GET request and echo the response **/
        /** Note: Set the GET field BEFORE calling buildOauth(); **/
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q=%23HB2';
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        // echo $twitter->setGetfield($getfield)
        //              ->buildOauth($url, $requestMethod)
        //              ->performRequest();

        $tweetData = json_decode($twitter->setGetfield($getfield)
                        ->buildOauth($url, $requestMethod)
                        ->performRequest(),$assoc = True);

        foreach($tweetData['statuses'] as $index => $items)
        {


          echo "<div class='twitter-tweet'>Tweet:" . $items['text'] . "'</div></br>'";
          echo "When: " . $items['created_at'] . "</br>";
          echo "Where: " .$items['location']. "</br>";


        }
        ?>
      </div>


      <div class="col-xs-4">
        <div class="head"><span style="">Instagram</span></div>
        <div id="results"></div>
      </div>

    </div>


    <div class="row footer">This is the footer space
    </div>

  </div>



</body>
</html>
