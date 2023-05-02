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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Main page</title>
</head>

<body class="min-[460px]:hidden max-[450px]:visible">
    <div class="bg-gray-300 h-screen w-screen">
        <nav class="flex flex-row">
            <img src="img/ACC_Logo.png" alt="" class="absolute left-9 mt-5 h-24 w-24">
            <img src="img/Profile_user.png" alt="" class="absolute right-9 mt-7 h-20 w-20">
        </nav>
        <div class="flex justify-center">
            <h1 class="font-bold text-black text-3xl absolute top-40">Welcome <?php echo $account_detail['Username']; ?></h1>
        </div>
        <div class="flex flex-col items-center mt-[7rem] p-32 h-5/6 justify-evenly">
            <div class="">
                <button class="bg-blue-600 rounded-lg h-20 w-56 border-black border-2 hover:bg-blue-900">
                    <a href="#">
                        <h1 class="font-bold text-black text-3xl">Notifications</h1>
                    </a>
                </button>
            </div>
            <div class="">
                <button class="bg-blue-600 rounded-lg h-20 w-56 border-black border-2 hover:bg-blue-900">
                    <a href="#">
                        <h1 class="font-bold text-black text-3xl">Alerts</h1>
                    </a>
                </button>
            </div>
            <div class="">
                <button class="bg-blue-600 rounded-lg h-20 w-56 border-black border-2 hover:bg-blue-900">
                    <a href="#">
                        <h1 class="font-bold text-black text-3xl">Appointments</h1>
                    </a>
                </button>
            </div>
        </div>

    </div>
    <div class="bg-blue-500 w-screen h-24 absolute bottom-0 border-2 border-t-black border-x-blue-500 border-b-blue-500 m-0 p-0 flex justify-evenly items-center">
        <div class="flex flex-col">
            <img src="img/home_icon_orange.png" alt="">
            <a href="#">
                <p class="flex justify-center font-semibold mt-1.5">Home</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/profile_user_icon.png" alt="">
            <a href="profile_user.php">
                <p class="flex justify-center font-semibold mt-1.5">Profile</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lock_icon.png" alt="">
            <a href="pincode_page.php">
                <p class="flex justify-center font-semibold mt-1.5">Safe</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lawyer_icon.png" alt="">
            <a href="work_page.html">
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
</body>

</html>