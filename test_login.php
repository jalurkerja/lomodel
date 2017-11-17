<?php
require 'Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '133797603948160',
  'app_secret' => '8f6237e373872fcbff4af0a29b45f959',
  'default_graph_version' => 'v2.11',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/lomodel/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '133797603948160',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.11'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>