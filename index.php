<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css.css">
    <title>Letool</title>
</head>

<body >

    <header>
        <p class="logo">Letools</p>
        <nav>
            <ul>
                <li id="loginnave" class="loginnave">LOGIN</li>
                <li id="registernav" class="registernav">REGISTER</li>
            </ul>
        </nav>
    </header>

    <div class="cont">
        <div class="welcompage">
            <h1>Letools</h1>
            <div style="width: 90%;" class="webdescrib">
                <p>
                Letoools is a platform designed for legendary developers to showcase their projects, share their innovative solutions, and connect with like-minded creators. Whether you're building cutting-edge applications, crafting groundbreaking websites, or working on the next big thing in tech, Letoools provides the space to display your work and highlight your skills.
                </p>
            </div>
            <div class="red"></div>
        </div>


        <div id="logandregPage" class="logandregPage">
            <div class="orange"></div>
            <div id="register" class="register">
                <form action="processes/signup_process.php" method="post" enctype="multipart/form-data">
                    <h3 class="registerh3">Register</h3>
                    <input id="firstname" placeholder="firstname" class="ok" type="text" name="firstname" required>
                    <input id="lastname" placeholder="lastname" class="ok" type="text" name="lastname" required>
                    <input id="username" placeholder="username" class="ok" type="text" name="username" required>
                    <input id="email" placeholder="email" class="ok" type="email" name="email" required>
                    <input id="password" placeholder="password" class="ok" type="password" name="password" required>
                    <input id="rpassword" placeholder="password" class="ok" type="password" name="rpassword" required>
                    <div class="imageinput">
                        <label for="imageprofileinp">select an image</label>
                        <input type="file" class="imageprofileinp" id="imageprofileinp" name="imageprofile" name="imageprofile">
                        <img src="" alt="">
                    </div>

                    <div class="buttondiv">
                        <button id="submit" class="submit">submit</button>
                        <button id="reset" class="reset">reset</button>
                    </div>
                </form>
            </div>



            <div id="loginn" class="loginn">

                <form action="processes/login_process.php" method="post">
                    <h3 class="logh1">LOGIN</h3>
                    <input id="Email" placeholder="email" class="ok" type="email" name="Email" required>
                    <input id="passwordd" placeholder="password" class="ok" type="password" name="pass" required>

                    <div class="buttondiv">
                        <button onclick="checkthelog()" id="logiiin" class="logingsubmit">login</button>
                    </div>
                </form>

            </div>

        </div>
    </div>

    <script src="js/js.js"></script>

</body>

</html>
