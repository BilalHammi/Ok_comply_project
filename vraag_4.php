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

if (isset($_POST['pijl_r_x'])) {
    $vraag4 = $_POST["vraag"];
    $_SESSION["question4"] = $vraag4;
    header("Location: vraag_5.php");
} else {
    $error = "<p class='font-bold flex justify-center mt-1'>Needs to be a valid adress!</p>";
}
var_dump($_SESSION["question1"]);
var_dump($_SESSION["question2"]);
var_dump($_SESSION["question3"]);
?>
<!DOCTYPE html>
<html lang=" en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<!-- min-[460px]:hidden max-[450px]:visible -->

<body class=" bg-gray-300">
    <div class="flex flex-col items-center relative top-14">
        <img src="img/ACC_Logo.png" alt="" class="h-[7rem] w-[7rem] mt-4">
        <p class="font-bold flex justify-center max-w-xs mt-3">Hey User, before you can continue. We
            want you to fill
            in this form. So
            that we may
            understand your
            situation a bit better.</p>
        <div class="bg-white rounded-lg h-[9rem] w-[17rem] mt-10">

            <form action="vraag_4.php" method="POST" class="">
                <h1 class=" flex justify-center mt-2 text-sm">Whats your adress?</h1>
                <input type="text" name="vraag" class="text-blue-400 rounded-lg flex align-center border-black border-2 font-bold max-w-[125px] mt-3 pl-2 ml-[4.5rem]" placeholder="Answer" required>
                <?php echo @$error ?>
                <input type="image" src="img/pijl_rechts.png" name="pijl_r" class="mt-[21px] absolute bottom-3 ml-[14rem] flex justify-center">
                <p class="font-bold text-lg absolute bottom-3 right-22 mt-[20px] ml-[7.5rem]">4/7</p>
            </form>
        </div>
    </div>
</body>

</html>