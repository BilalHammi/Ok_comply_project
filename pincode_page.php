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
$pincode = (string)$account_information["pincode"];
$number_str = strlen($pincode);


// Check if a number was submitted
for ($j = 0; $j < 10; $j++) {
    if (isset($_POST["$j"]) &&  !empty($_SESSION['enteredPin1'])) {
        $_SESSION['enteredPin1'] .= $_POST["$j"];
        echo "goed ";
        break;
        $_SESSION['enteredPin2'] .= $_POST["$j"];
        $_SESSION['enteredPin3'] .= $_POST["$j"];
        $_SESSION['enteredPin4'] .= $_POST["$j"];
        $_SESSION['enteredPin5'] .= $_POST["$j"];
    }  if () {
        $_SESSION['enteredPin2'] .= $_POST["$j"];
    }

}

// Check if the entered pin has the same length as the stored pincode
if (strlen($_SESSION['enteredPin']) === $number_str) {
    if ($_SESSION['enteredPin'] === $pincode) {
        echo "Correct";
        // Clear entered pin from session
        unset($_SESSION['enteredPin']);
    } else {
        echo "Incorrect";
        // Clear entered pin from session
        unset($_SESSION['enteredPin']);
    }
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
<!-- min-[460px]:hidden max-[450px]:visible -->

<body class="">
    <div class="bg-gray-300 h-screen w-screen">
        <img src="img/linkse_pijl.png" alt="" class="absolute top-24 ml-[2rem] h-[4rem] w-[4rem]">
        <div class="flex flex-col items-center relative top-52">
            <img src="img/ACC_Logo.png" alt="" class="h-[5rem] w-[5rem] mb-2">
            <img src="img/Profile_user.png" alt="" class="h-[9rem] w-[9rem]">
            <p class="font-bold text-black text-3xl mt-2 mb-7"><?php echo $account_detail['Username']; ?></p>
            <div class="flex flex-row">
                <img src="img/empty_pin.png" alt="">
                <img src="img/empty_pin.png" alt="" class="ml-2">
                <img src="img/empty_pin.png" alt="" class="ml-2">
                <img src="img/empty_pin.png" alt="" class="ml-2">
                <img src="img/empty_pin.png" alt="" class="ml-2">
            </div>
            <div class="rounded-b-lg border-2 border-black border-x-gray-300 border-b-gray-300 px-screen absolute top-96 mt-24 w-screen">
                <form action="pincode_page.php" method="POST" class="">
                    <div class="flex flex-row justify-evenly mt-2">
                        <input type="submit" value="1" name="1" class="font-bold text-4xl">
                        <input type="submit" value="2" name="2" class="font-bold text-4xl">
                        <input type="submit" value="3" name="3" class="font-bold text-4xl">
                    </div>
                    <div class="flex flex-row justify-evenly mt-2">
                        <input type="submit" value="4" name="4" class="font-bold text-4xl">
                        <input type="submit" value="5" name="5" class="font-bold text-4xl">
                        <input type="submit" value="6" name="6" class="font-bold text-4xl">
                    </div>
                    <div class="flex flex-row  justify-evenly mt-2">
                        <input type="submit" value="7" name="7" class="font-bold text-4xl">
                        <input type="submit" value="8" name="8" class="font-bold text-4xl">
                        <input type="submit" value="9" name="9" class="font-bold text-4xl">
                    </div>
                    <div class="flex flex-row justify-evenly mt-1">
                        <input type="submit" value="*" name="*" class="font-bold text-4xl ml-4">
                        <input type="submit" value="0" name="0" class="font-bold text-4xl ml-5">
                        <input type="image" src="img/remove_icon.png">
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>