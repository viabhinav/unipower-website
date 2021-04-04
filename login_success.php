

<?php
// Initialize variables
$app_id = '<facebook_app_id>';
$secret = '<account_kit_app_secret>';
$version = '<account_kit_api_version>'; // 'v1.1' for example

// Method to send Get request to url
function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}

// Exchange authorization code for access token
$token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
  'grant_type=authorization_code'.
  '&code='.$_POST['code'].
  "&access_token=AA|$app_id|$secret";
$data = doCurl($token_exchange_url);
$user_id = $data['id'];
$user_access_token = $data['access_token'];
$refresh_interval = $data['token_refresh_interval_sec'];

// Get Account Kit information
$me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
  'access_token='.$user_access_token;
$data = doCurl($me_endpoint_url);
$phone = isset($data['phone']) ? $data['phone']['number'] : '';
$email = isset($data['email']) ? $data['email']['address'] : '';
<head>
  <title>Account Kit PHP App</title>
</head>
<body>
  <div>User ID: <?php echo $user_id; ?></div>
  <div>Phone Number: <?php echo $phone; ?></div>
  <div>Email: <?php echo $email; ?></div>
  <div>Access Token: <?php echo $user_access_token; ?></div>
  <div>Refresh Interval: <?php echo $refresh_interval; ?></div>
</body>


<form id="login_success" method="post" action="/login_success.php">
  <input id="csrf" type="hidden" name="csrf" />
  <input id="code" type="hidden" name="code" />
</form>

<script>
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      document.getElementById("code").value = response.code;
      document.getElementById("csrf").value = response.state;
      document.getElementById("login_success").submit();
    }
  }
</script>
<!doctype html>
<head>
  <meta charset="utf-8">
  <title>AccountKitJS App</title>
</head>

<body>
  <div>Logged In to Account Kit:</div>
  <div>User Token {{user_access_token}}</div>
  <div>User Token Expires at {{expires_at}}</div>
  <div>User Id {{user_id}}</div>
  <div>User phone: {{phone_num}}</div>
  <div>User email: {{email_addr}}</div>
</body>

    

?>

