<?php
$con = mysqli_connect("localhost","root","","pw2024_tubes_233040002");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

function login($data){
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if($username == 'admin' && $password =='12345'){
    header("Location: index.php");
    exit;
  }
  else{
    return [
      'error' => true,
      'pesan' => 'USername / Passowrd Salah!'
    ];
  }
}
?>