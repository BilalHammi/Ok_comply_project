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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register page</title>
</head>

<body class="max-[425px]:bg-gray-300">
    <div class="">
        <div class="flex justify-center">
            <div class="min-[460px]:hidden max-[450px]:visible h-40 w-40  mt-3">
                <img src="img/ACC_Logo.png" alt="" class="">
            </div>
        </div>
        <div class="flex justify-center">
            <div class="flex items-center">
                <div class="min-[460px]:hidden max-[450px]:visible bg-blue-400 mt-10 h-screen max-h-[27rem] w-[20rem] rounded-lg">
                    <form action="register.php" method="post">
                        <div class="">
                            <p class="font-bold text-lg pt-9 ml-10 text-gray-300 text-sm">Username</p>
                            <input type="text" name="name" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold" required>
                        </div>
                        <div class="">
                            <p class="font-bold text-lg pt-9 ml-10 text-gray-300 text-sm">Password</p>
                            <input type="password" id="password1" name="password1" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold">
                        </div>
                        <div class="">
                            <p class="font-bold text-lg pt-9 ml-10 text-gray-300 text-sm">Confirm password</p>
                            <input type="password" name="password2" id="password2" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold">
                        </div>
                        <?php
                        if (isset($_POST["Submit"])) {
                            @$name = $_POST["name"];
                            $password1 = $_POST["password1"];
                            $password2 = $_POST["password2"];
                            if (empty($password1) && empty($password2)) {
                                echo "<div class='flex justify-center'>";
                                echo "<p class='font-bold mt-3 text-sm absolute'>You have filled nothing in!</p>";
                                echo "</div>";
                            } elseif ($password1 === $password2) {
                                echo "<div class='flex justify-center'>";
                                echo "<p class='text-green-300 mt-3 absolute font-bold text-sm'>They are matching!</p>";
                                echo "</div>";
                                $sql = "INSERT INTO  `user`  (`Username`, `password`, `password_again`) VALUES (:name, :password1, :password2)";
                                $stmt = $conectie->prepare($sql);
                                $stmt->bindParam(':name', $name);
                                $stmt->bindParam(':password1', $password1);
                                $stmt->bindParam(':password2', $password2);
                                $result = $stmt->execute();
                                $thelastID = $conectie->lastInsertId();
                                $_SESSION['UserLoggedIn'] = $thelastID;
                                header("Location: vraag_1.php");
                            } elseif ($password1 !== $password2) {
                                echo "<div class='flex justify-center'>";
                                echo "<p class='text-red-600 font-bold mt-3 text-sm absolute'>You're password does not match!</p>";
                                echo "</div>";
                            }
                        } ?>
                        <div class="flex flex-row justify-center mt-10">
                            <p class=" pr-2">See password?</p>
                            <input type="checkbox" id="vehicle1" class="">
                        </div>
                        <div class="flex justify-center">
                            <input type="submit" class="text-gray-600 py-4 px-10 bg-slate-300 rounded-full hover:bg-sky-800 relative absolute bottom-0 mt-5" placeholder="Submit" name="Submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="min-[460px]:hidden max-[450px]:visible flex flex-row absolute bottom-0 mb-2">
                <p>Have an account?</p> <a href="Login.php" class="text-blue-700 ml-2">Click here!</a>
            </div>
        </div>
    </div>
</body>

</html>