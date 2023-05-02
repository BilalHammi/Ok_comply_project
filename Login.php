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

if (isset($_POST["Submit"])) {
    @$name = $_POST["name"];
    @$password1 = $_POST["password1"];
    $sql = "SELECT * FROM user WHERE Username = :name AND password = :password1";
    $stmt = $conectie->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':password1', $password1);
    $stmt->execute();
    $result = $stmt->fetch();
    if ($result) {
        $_SESSION['UserLoggedIn'] = $result['ID'];
        header("Location: index.php");
    } else {
        echo "Niks, fout!";
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
    <title>Login</title>
</head>

<body class="max-[425px]:bg-gray-300">
    <div class="">
        <div class="flex justify-center">
            <div class="min-[460px]:hidden max-[450px]:visible h-40 w-40  mt-3">
                <img src="img/ACC_Logo.png" alt="" class="">
            </div>
        </div>
        <div class="flex justify-center">
            <div class="min-[460px]:hidden max-[450px]:visible bg-blue-400 mt-10 h-[20rem] w-[20rem] rounded-lg">
                <form action="Login.php" method="post">
                    <div class="">
                        <p class="font-bold text-lg pt-9 ml-10 text-gray-300 text-sm">Username</p>
                        <input type="text" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold" name="name">
                    </div>
                    <div class="">
                        <p class="font-bold text-lg pt-9 ml-10 text-gray-300 text-sm">Password</p>
                        <input type="password" class="ml-10 pt-1 bg-inherit border-b-2 border-black outline-none font-bold" name="password1">
                    </div>
                    <div class="flex flex-row mt-2">
                        <p class="ml-[6rem] pr-2">See password?</p>
                        <input type="checkbox" id="vehicle1" class="">
                    </div>
                    <p class="ml-[6rem] mt-1 underline underline-offset-2">Forgot Password?</p>
                    <input type="submit" class="text-gray-600 py-4 px-10 bg-slate-300 ml-[5rem] mt-4 rounded-full hover:bg-sky-800" placeholder="Submit" name="Submit">
                </form>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="min-[460px]:hidden max-[450px]:visible flex flex-row absolute bottom-0 mb-2">
                <p>Dont have an account?</p> <a href="register.php" class="text-blue-700 ml-2">Click here!</a>
            </div>
        </div>
    </div>
</body>

</html>