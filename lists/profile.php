<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="../css/profile.css">
    <title>Profile</title>
</head>

<body>





    <header>
        <nav>
            <ul>
                <li class="profile" id="profile"><a href="profile.php" style="text-decoration: none; color: #091057;">PROFILE</a></li>
                <li class="tools" id="tools"><a href="../dashboard.php" style="text-decoration: none; color: #091057;">TOOLS</a></li>
                <li class="legends" id="legends"><a href="legends.php" style="text-decoration: none; color: #091057;">LEGENDS</a></li>
                <li class="logout" id="logout"><a href="../logout.php" style="text-decoration: none; color: #091057;">LOGOUT</a></li>
            </ul>
        </nav>
    </header>



    <div class="space"></div>


    <div class="contentcontainer">
        <div class="bigcont" id="contbig">

        </div>

        <i  id="icon" class="fa-solid fa-user-pen"></i>



<hr>


        <div class="projectconatiner" id="projectconatiner">

        </div>
        
    </div>

    <div id="all" class="all">
        <form action="edit.php" method="post">
            <h1 class="som">PROFILE EDIT</h1>

            <input type="text" name="descreptionn" id="descreptionn" class="descreptionn" placeholder="descreptionn" required>

            <input type="text" name="linkden" id="linkden" class="linkden" placeholder="linkden" required>

            <input type="text" name="githublink" id="githublink" class="githublink" placeholder="Github link">
            <div class="buttons">
                <button class="post" id="post" name="post" type="submit">POST</button>
                <button class="cancel" id="cancel">CANCEL</button>
            </div>
        </form>
    </div>
</body>

    <script type="module" src="../js/profile.js"></script> 
    <script>
        const edit = document.getElementById("icon")
        const all = document.getElementById("all")
        const cancel = document.getElementById("cancel")


        edit.addEventListener("click", function () {
        all.style.display = "flex"

        })

        cancel.addEventListener("click", function () {
        all.style.display = "none"
        })
    </script>
</html>
