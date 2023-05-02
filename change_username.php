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

if (isset($_POST['Submit'])) {
    @$username1 = $_POST["username1"];
    @$username2 = $_POST['usernameConfirm'];
    if ($username1 === $username2) {
        $sql = "UPDATE `user` SET `Username`=:username1 WHERE ID = '" . $_SESSION['UserLoggedIn'] . "'";
        $stmt = $conectie->prepare($sql);
        $stmt->bindParam(':username1', $username1);
        $stmt->execute();
        $result = $stmt->fetch();
        header("Location: profile_user.php");
    } else {
        $p = "<p class='font-bold flex justify-center mt-2.5'>You need to fill something in! </p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-[460px]:hidden max-[450px]:visible">
    <div class="bg-gray-300 h-screen w-screen">
        <div class="flex flex-row absolute top-10">
            <a href="profile_user.php"><img src="img/linkse_pijl.png" alt="" class="h-[4rem] w-[4rem] mt-6 ml-14"></a>
            <img src="img/ACC_Logo.png" alt="" class="h-[7rem] w-[7rem] mt-3 ml-[3rem]">
        </div>
        <div class="flex justify-center">
            <p class="font-bold text-2xl text-center text-black flex absolute top-56
            ">
                Hey <?php echo $account_detail["Username"]; ?>, fill inside this form your new data!
            </p>
        </div>
        <div class="flex justify-center items-center relative top-80">
            <div class="min-[460px]:hidden max-[450px]:visible bg-blue-400 mt-10 h-screen max-h-[22rem] w-[20rem] rounded-lg">
                <form action="change_username.php" method="post">
                    <div class="">
                        <p class="font-bold text-lg pt-9 ml-10 text-gray-300">Username</p>
                        <input type="text" name="username1" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold" value=<?php echo $account_detail["Username"]; ?>>
                    </div>
                    <div class="">
                        <p class="font-bold text-lg pt-9 ml-10 text-gray-300">Confirm username</p>
                        <input type="text" name="usernameConfirm" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold">
                    </div>
                    <?php echo @$p ?>
                    <div class="flex justify-center">
                        <input type="submit" class="text-gray-600 py-4 px-10 bg-slate-300 rounded-full hover:bg-sky-800 absolute bottom-14 mr-2" placeholder="Submit" name="Submit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>