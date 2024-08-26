<?php
function httpRequest($api, $data_string)
{
  $ch = curl_init($api);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data_string)
    )
  );
  $result = curl_exec($ch);
  curl_close($ch);
  return json_decode($result, true);
}


$User_No = $_POST['User_No'];
$User_Password = $_POST['User_Password'];

$data = [
  "UserID" => "vastar",
  "Password" => "vastar@2673",
  "User_No" => $User_No,
  "User_Password" => $User_Password
];


$data = httpRequest('https://webapi.vastar.com.tw/erpapi/api/User/Login', json_encode($data));



if ($data["Result"] == 0) {
  ///  $alert = $data['Message'];
  // echo "<script type='text/javascript'>alert('$alert');</script>";

  setcookie("cuser_name", $data['Name'], "/");
  setcookie("User_No", $User_No, "/");
  header("refresh:1;url=Sidebar.php");
} else {
  //   $alert = $data['Message'];
  //  echo "<script type='text/javascript'>alert('$alert');</script>";
  header("refresh:1;url=login.html");
}
