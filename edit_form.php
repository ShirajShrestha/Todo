<?php
include 'functions.php';
if (login_check() == false) {
    redirect('index.php');
}

if (isset($_GET['edit_id'])) {
    $id = (int)$_GET['edit_id'];

    // echo $id;

    $sql = "select * from todo where id = $id";
    $sqlExec = mysqli_query($dbconnect, $sql);
    $data = mysqli_fetch_assoc($sqlExec);

    // var_dump($data);
} else {
    redirect('dashboard.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Edit</title>
</head>

<body>

    <div class="header">
        <div class="intro">
            <h1>Manage your work</h1>

        </div>
        <div class="logout">
            <p><a href="Logout.php">Log Out</a></p>
        </div>
    </div>

    <div class="divide">
        <div class="content">
            <h1>Welcome <span><?= $_SESSION['name'] ?></span> </h1>
            <h2>Edit your list</h2>

            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <form action="todo.php" method="POST">
                <p><input type="text" name="title" value="<?= $data['title']; ?>" placeholder="Todo  Title"></p>
                <p><textarea placeholder="Todo Description" name="description" id="" cols="30" rows="10"><?= $data['description'] ?></textarea></p>

                <input type="hidden" name="id" value="<?= $data['id']; ?> ">
                <input class="btn" type="submit" value="edit">
                <input type="hidden" name="todo_action" value="edit">
            </form>

        </div>

        <div class="todo_list">
            <h2 class="sticky">Your list of Todos</h2>
            <?php
            $sql = "select * from todo where user_id = " . $_SESSION['login_id'] . " order by id desc";
            $sqlExec = mysqli_query($dbconnect, $sql);
            $no_of_todos = mysqli_num_rows($sqlExec);

            while ($data = mysqli_fetch_assoc($sqlExec)) :
            ?>
                <div class="one_block">
                    <details>
                        <summary>
                            <h2><?= $data['title'] ?></h2>
                        </summary>
                        <p>
                            <?= $data['description'] ?>
                        </p>
                    </details>
                    <div class="edit">
                        <a href="edit_form.php?edit_id=<?= $data['id']; ?>">Edit</a>
                        <a href="todo.php?did=<?= $data['id'] ?> " onclick="return confirm('Are you sure?')">Delete</a>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </div>


</body>

</html>