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

$vraag1 = $_SESSION["question1"];
$vraag2 = $_SESSION["question2"];
$vraag3 = $_SESSION["question3"];
$vraag4 = $_SESSION["question4"];
$vraag5 = $_SESSION["question5"];
$vraag6 = $_SESSION["question6"];
@$vraag7 = $_SESSION["question7"];
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
            <form action="vraag_7.php" method="POST" class="">
                <h1 class="flex justify-center mt-2 text-sm text-center">Create a pincode for
                    your safe (documentation) maximum 5 numbers</h1>
                <input type="text" name="vraag" class="text-blue-400 rounded-lg flex align-center border-black border-2 font-bold max-w-[125px] mt-1.5 pl-2 ml-[4.5rem]" placeholder="Answer" required>
                <?php if (isset($_POST['pijl_r_x'])) {
                    if (is_numeric($_POST["vraag"]) && strlen($_POST["vraag"]) == 5) {
                        $vraag7 = $_POST["vraag"];
                        $sql = "INSERT INTO `user_information`(`gender`, `nationality`, `date_of_birth`, `email`, `adress`, `phone_number`, `pincode`, `user_account_id`) VALUES (:vraag1,:vraag2,:vraag3,:vraag6,:vraag4,:vraag5,:vraag7,:user_id)";
                        $stmt = $conectie->prepare($sql);
                        $stmt->bindParam(':vraag1', $vraag1);
                        $stmt->bindParam(':vraag2', $vraag2);
                        $stmt->bindParam(':vraag3', $vraag3);
                        $stmt->bindParam(':vraag6', $vraag6);
                        $stmt->bindParam(':vraag4', $vraag4);
                        $stmt->bindParam(':vraag5', $vraag5);
                        $stmt->bindParam(':vraag7', $vraag7);
                        $stmt->bindParam(':user_id', $_SESSION['UserLoggedIn']);
                        $stmt->execute();
                        header("Location: index.php");
                    } else {
                        echo "<p class='text-sm flex justify-center mt-1'>You need to use only numbers!</p>";
                    }
                } ?>
                <input type="image" src="img/pijl_rechts.png" name="pijl_r" class="mt-[21px] absolute bottom-3 ml-[14rem] flex justify-center">
                <p class="font-bold text-lg absolute bottom-3 right-22 mt-[20px] ml-[7.5rem]">7/7</p>
            </form>
        </div>
    </div>
</body>

</html>