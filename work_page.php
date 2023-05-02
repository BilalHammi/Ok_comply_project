<?php
session_start();
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
try {
    $conectie = new PDO("mysql:host=$servername;dbname=okcomply", $username, $password);

    $conectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
};
$account_detail = $conectie->query("SELECT * FROM `user` WHERE ID = '" . $_SESSION['UserLoggedIn'] . "'")->fetch();
$account_information = $conectie->query("SELECT * FROM `user_information` WHERE user_account_id = '" . $_SESSION['UserLoggedIn'] . "'")->fetch();
var_dump( $_SESSION[$session_key]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Work</title>
</head>

<body class="min-[460px]:hidden max-[450px]:visible">
    <div class="bg-gray-300 h-screen w-screen">
        <div class="flex flex-row relative top-6">
            <img src="img/plus_icon.png" alt="" class="h-[4rem] w-[4rem] mt-2 ml-5">
            <img src="img/Profile_user.png" alt="" class="h-[5rem] w-[5rem] absolute right-10">
        </div>
        <p class="font-bold text-xl max-w-screen-sm absolute top-28 ml-8">Welcome to your work status User</p>
        <div class="flex  justify-center">
            <form action="work_page.html" method="POST">
                <img src="img/search_icon.png" alt="" class="absolute top-44 z-50 ml-3">
                <input type="search" class="rounded-full py-2 pl-10 mr-12.5 relative top-24 font-bold pr-[20px] z-10">
            </form>
        </div>
    </div>
    <div class="bg-blue-500 w-screen h-24 absolute bottom-0 border-2 border-t-black border-x-blue-500 border-b-blue-500 m-0 p-0 flex justify-evenly items-center">
        <div class="flex flex-col">
            <img src="img/home_icon.png" alt="">
            <a href="#">
                <p class="flex justify-center font-semibold">Home</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/profile_user_icon.png" alt="">
            <a href="profile_user.html">
                <p class="flex justify-center font-semibold mt-1.5">Profile</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lock_icon.png" alt="">
            <a href="">
                <p class="flex justify-center font-semibold mt-1.5">Safe</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lawyer_orange_icon.png" alt="">
            <a href="">
                <p class="flex justify-center font-semibold">Work</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/Emergency_icon_gray.png" alt="" class="mt-3 h-16 w-16 ml-2">
            <a href="emergency.html">
                <p class="flex justify-center font-semibold mb-5">Emergency</p>
            </a>
        </div>
    </div>
    </div>
</body>

</html>