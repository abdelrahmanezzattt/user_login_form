<?php

if (isset($_POST['firstname'])){
    $firstname = $_POST['firstname'];
}else{
    $firstname = '';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
<div class="container">

    <?php

    if (isset($_POST['register'])){
        $errors = array();
        if (empty($_POST['firstname'])){
            $errors['firstname'] = "<div class='error'>Please enter your first name</div>";
        }

        if (empty($_POST['lastname'])){
            $errors['lastname'] = "<div class='error'>Please enter your last name</div>";
        }

        if (empty($_POST['email'])){
            $errors['email'] = "<div class='error'>Please enter your email name</div>";
        }elseif (!empty($_POST['email'])){
            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
            if (!preg_match($pattern, $_POST['email'])){
                $errors['email'] = "<div class='error'>Please enter valid email name</div>";
            }
        }

        if (empty($_POST['password'])){
            $errors['password'] = "<div class='error'>Please enter your password</div>";
        }

        if (empty($_POST['confirm'])){
            $errors['confirm'] = "<div class='error'>Please enter your confirmation password</div>";
        }elseif (!empty($_POST['confirm']) && $_POST['password'] != $_POST['confirm']){
            $errors['password'] = "<div class='error'>No match between passwords</div>";
        }

        /*if (!empty($errors)){
            foreach ($errors as $error){
                echo $error;
            }
        }else{

        }*/


    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <!--<input type="text" name="firstname" placeholder="First Name .." value="<?php /*if (isset($_POST['firstname'])) echo $_POST['firstname'];  */?>">-->
        <input type="text" name="firstname" placeholder="First Name .." value="<?php echo $firstname;  ?>">
        <?php
        if (!empty($errors['firstname'])){
            echo $errors['firstname'];
        }
        ?>

        <input type="text" name="lastname" placeholder="Last Name ..">
        <?php
        if (!empty($errors['lastname'])){
            echo $errors['lastname'];
        }
        ?>
        <input type="email" name="email" placeholder="Email Address ..">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm" placeholder="Confirm">

        <button type="submit" name="register">Register now</button>
    </form>
</div>
</body>
</html>