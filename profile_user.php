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
if (isset($_POST['Delete_Account'])) {
    $account_delete = $conectie->query("DELETE FROM `user` WHERE ID = '" . $_SESSION['UserLoggedIn'] . "'")->fetch();
    $account_information_delete = $conectie->query("DELETE FROM `user_information` WHERE user_account_id = '" . $_SESSION['UserLoggedIn'] . "'")->fetch();
    session_destroy();
    header("Location: login.php");
}
if (isset($_POST['Log_out'])) {
    session_destroy();
    header("Location: Login.php");
}
if (isset($_POST['Change_password'])) {
    header("Location: change_password.php");
}
if (isset($_POST["username_x"])) {
    header("Location: change_username.php");
}

if (isset($_POST["e-mail_x"])) {
    header("Location: change_email.php");
}
if (isset($_POST["phone_x"])) {

    header("Location: change_phone.php");
}
if (isset($_POST["gender_x"])) {

    header("Location: change_gender.php");
}
if (isset($_POST["date_x"])) {

    header("Location: change_date.php");
}
if (isset($_POST["adres_x"])) {

    header("Location: change_adress.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="min-[460px]:hidden max-[450px]:visible">
    <div class="bg-blue-500 h-screen w-screen ">
        <div class="bg-gray-300 w-screen h-[18rem] flex justify-center rounded-b-full">
            <div class="absolute flex flex-row mr-[5rem]">
                <a href="index.php"><img src="img/linkse_pijl.png" alt="" class="h-[4rem] w-[4rem] mt-6 mr-3"></a>
                <img src="img/ACC_Logo.png" alt="" class="h-[7rem] w-[7rem] ml-[8px] mt-3">
            </div>
            <div class="">
                <img src="img/Profile_user.png" alt="" class="h-[8rem] w-[8rem] z-10 absolute top-32 ml-[-65px]">
                <img src="img/orange_dot.png" alt="" class="z-30 mb-[15rem] ml-[30px] absolute top-52">
                <img src="img/camera_icon.png" alt="" class="z-50 ml-[43px] absolute top-[220px]">
            </div>
        </div>
        <div class="flex flex-col items-center justify-evenly bg-scroll bg-blue-500 h-screen">
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">Username</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="names" value=<?php echo $account_detail["Username"]; ?>>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="username">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">E-mail</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="emails" value=<?php echo $account_information["email"]; ?> disabled>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="e-mail">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">Phone number</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="phones" value=<?php echo "0", $account_information["phone_number"]; ?> disabled>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="phone">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">Gender</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="genders" value=<?php echo $account_information["gender"]; ?> disabled>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="gender">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">Date of birth</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="dates" value=<?php echo $account_information["date_of_birth"]; ?> disabled>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="date">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm ml-5">Adres</p>
                <form action="profile_user.php" method="POST">
                    <input type="text" class=" bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="adresses" value=<?php echo $account_information["adress"]; ?> disabled>
                    <input type="image" src="img/rechts_pijl_profile.png" class="" name="adres">
                </form>
            </div>
            <div>
                <p class="font-bold text-gray-300 text-sm">Subscribtion ID</p>
                <input type="text" class="bg-inherit border-b-2 border-black outline-none font-bold ml-5" name="name">
            </div>
            <div class="flex-col mb-[100px]">
                <form action="profile_user.php" method="POST" class="">
                    <div class="pb-2">
                        <input type="submit" value="Delete Account" name="Delete_Account" class="bg-gray-300 rounded-full w-72 mt-2 py-3 border-2 border-black font-bold text-black text-2xl">
                    </div>
                    <div class="pb-2">
                        <input type="submit" value="Cancel Subscribtion" name="Cancel_Subscribtion" class="bg-gray-300 rounded-full w-72 mt-2 py-3 border-2 border-black font-bold text-black text-2xl">
                    </div>
                    <div class="">
                        <input type="submit" value="Change password" name="Change_password" class="bg-gray-300 rounded-full w-72 mt-2 py-3 border-2 border-black font-bold text-black text-2xl">
                    </div>
                    <div class="">
                        <input type="submit" value="Log out" name="Log_out" class="bg-gray-300 rounded-full w-72 mt-3 py-3 border-2 border-black font-bold text-black text-2xl">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-blue-500 w-screen h-24 fixed bottom-0 border-2 border-t-black border-x-blue-500 border-b-blue-500 m-0 p-0 flex justify-evenly items-center">
        <div class="flex flex-col">
            <img src="img/home_icon_orange.png" alt="">
            <a href="#">
                <p class="flex justify-center font-semibold mt-1.5">Home</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/profile_user_icon.png" alt="">
            <a href="">
                <p class="flex justify-center font-semibold mt-1.5">Profile</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lock_icon.png" alt="">
            <a href="pincode_page.html">
                <p class="flex justify-center font-semibold mt-1.5">Safe</p>
            </a>
        </div>
        <div class="flex flex-col">
            <img src="img/lawyer_icon.png" alt="">
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
</body>

</html>