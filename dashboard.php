<?php
include('config/connecte_db.php');
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $cntnt = $_POST['tool_content'] ?? '';
    $git = $_POST['git'] ?? '';
    $img = $_FILES['tool_image'] ?? null;

    if (empty($title) || empty($cntnt) || empty($git) || !$img) {
        echo "All fields are required.";
        exit();
    }

    $upload_dir = 'assets/tool_img/';
    $file_name = basename($img['name']);
    $target_file = $upload_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (getimagesize($img['tmp_name']) === false) {
        echo "File is not an image.";
        exit();
    }

    if ($img['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        exit();
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        echo "Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit();
    }

    if (!move_uploaded_file($img['tmp_name'], $target_file)) {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO posts (user_id, content, image, github_link, title) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('issss', $_SESSION['user_id'], $cntnt, $file_name, $git, $title);

    if ($stmt->execute()) {

        header('Location: ' . $_SERVER['PHP_SELF']);
        exit(); 
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}


$sql = "SELECT posts.*, users.first_name, users.last_name, users.username, users.image AS user_image 
        FROM posts 
        JOIN users ON posts.user_id = users.id";
$result = mysqli_query($conn, $sql);

$posts = [];
if ($result && $result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        $posts[] = $post;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Dashboard</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif">
    <div class="maincontainer" id="maincontainer">
        <div class="circle"></div>
        <header>
            <nav>
                <ul>
                    <li class="profile" id="profile"><a href="lists/profile.php" style="text-decoration: none; color: #091057;">PROFILE</a></li>
                    <li class="tools" id="tools"><a href="dashboard.php" style="text-decoration: none; color: #091057;">TOOLS</a></li>
                    <li class="legends" id="legends"><a href="lists/legends.php" style="text-decoration: none; color: #091057;">LEGENDS</a></li>
                    <li class="logout" id="logout"><a href="logout.php" style="text-decoration: none; color: #091057;">LOGOUT</a></li>
                </ul>
            </nav>
        </header>

        <div id="all" class="all">
            <form method="POST" enctype="multipart/form-data">
                <h1 class="som">Somthing Legendary?</h1>
                <input type="text" name="title" placeholder="Image Title" class="toolname" required>
                <input type="text" name="tool_content" placeholder="Tool Content" class="description" required>
                <input type="text" placeholder="Github link" name="git" class="githublink" required>
                <div class="imageinput">
                    <label for="imageprofileinp">select project's image</label>
                    <input type="file" name="tool_image" class="imageprofileinp" id="imageprofileinp" required>
                </div>
                <div class="buttons">
                    <button class="post" type="submit" >POST</button>
                    <button class="cancel" id="cancel">CANCEL</button>
                </div>
            </form>
        </div>

        <div class="divforspace"></div>
        
        <?php if (count($posts) > 0): ?>
            <?php foreach ($posts as $post): ?>
                <?php
                $github_link = $post['github_link'];
                if (strpos($github_link, 'https://') !== 0) {
                    $github_link = 'https://' . ltrim($github_link, 'https://');
                }
                ?>
                <div class="postcontainer">
                    <img class="img" src="assets/tool_img/<?php echo htmlspecialchars($post['image']); ?>" alt="Tool Image">
                    <div class="postinfo">
                        <div class="nameANDname">
                            <img src="assets/<?php echo htmlspecialchars($post['user_image']); ?>" alt="User Image">
                            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
                            <h4><?php echo htmlspecialchars($post['first_name']) . ' ' . htmlspecialchars($post['last_name']); ?></h4>
                        </div>
                        <div class="descriptioncontainer">
                            <p><?php echo htmlspecialchars($post['content']); ?></p>
                        </div>
                        <hr>
                        <div class="gitandhashtag">
                            <div class="hashtagcontainer">
                                <p class="hashtags">#networking</p>
                                <p class="hashtags">#development</p>
                                <p class="hashtags">#open-source</p>
                            </div>
                            <a href="<?php echo htmlspecialchars($github_link); ?>" target="_blank"><i class="fa-brands fa-github"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>
    </div>

    <button id="edit" class="edit">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>
</body>
            <script type="module" src="js/main.js"></script>

            <script>
        const edit = document.getElementById("edit")
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