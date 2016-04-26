<html>
<head>
  <meta name="viewport" content="initial-scale=1.0">
  <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>TWITTERINSTA</title>
  <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
  <script src="instagram.js" type="text/javascript"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="style.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 10;
      padding: 10;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
  <h1>An exploration of N.C. House Bill 2</h1>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="index.html">Home</a></li>
      <li><a href="news.html">In the news</a></li>
      <li class="active"><a href="twitterinsta.php">See what people are saying</a></li>
      <li><a href="video.html">Who opposes HB2?</a></li>
      <li><a href="map.html">Anti-Trans legislation across the country</a></li>
    </ul>
  </div>
</nav>





<div class="container">
  <div class="row">
    <div class="col-sm-2">
            <button type="button" class="btn btn-secondary btn-lg nav-item insta">Instagram</button>
          </br></br>
            <button type="button" class="btn btn-secondary btn-lg nav-item twitter">Twitter</button>
      </div>

      <div class="col-sm-10">
      <div class="home-expand">
        <div class="container">
          <div class="row">
            <div class="col-sm-10">
          <p></p>
        </div>
      </div>
    </div>
  </div>
  </div>
      <div class="col-sm-10">
        <div class="insta-expand">
          <div class="container">
            <div class="row">
              <div class="col-sm-10" style="background-color:#fafafa;">
                <div id="results"></div></div>
              </div>
            </div>
        </div>
      </div>

      <div class="col-sm-10">
      <div class="twitter-expand">
        <div class="container">
          <div class="container">
            <div class="row">
              <div class="col-sm-10" style="background-color:#f5f8fa;">
                <p><?php
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
                $tweetMedia = array();
                foreach($tweetData['statuses'] as $index => $items)
                {
                  echo "<div class='row twitter-info'>";
                  echo "<div class='col-xs-1'><a href='http://twitter.com/" . $items['user']['screen_name'] . "' target='_blank'><img class='twitter-profilepictures' src='" . $items['user']['profile_image_url'] . "'/></a></div>";
                  echo "<div class='col-xs-9 tweet-info'><span class='twitter-name'>" . $items['user']['name'] . " </span>";
                  echo "<span class='twitter-username'>@" . $items['user']['screen_name'];
                  echo "</span><p class='tweet'>" . $items['text'] . "</p></div></div>";
                  $entitiesArray = $items['entities'];
                                if (isset($entitiesArray['media'])) {
                                    $mediaArray = $entitiesArray['media'];
                                    $tweetMedia = $mediaArray [0];
                                    echo "<a target='_blank' href='" . $tweetMedia['expanded_url'] . "'><img class='twitter-pic' target='_blank' src='" . $tweetMedia['media_url'] . "'></a>";
                                  }
                }
                ?></p>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>













    <div class="row footer">
    </div>



  <script>
  $( "#result" ).load( "index.html #home-expand" );
  </script>




          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
          <script type="text/javascript" src="style.js"></script>
          <script type="text/javascript" src="tabletop.js"></script>

</body>

</html>
