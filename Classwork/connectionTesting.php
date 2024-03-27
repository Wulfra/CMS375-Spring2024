<!DOCTYPE html>
<html>

<head>
    <title>
        Testing HTML
    </title>
</head>

<body style = "text-align: center;">

    <h1 style = "color: green;">
        Test Code
    </h1>

    <?php

    if (array_key_exists('button', $_POST)) {
        button();
    }

    if (isset($_POST['submit'])) {
        echo 'You entered: ', htmlspecialchars($_POST['something']);
    }

    function button() {
        $randVal = rand(1, 5);

        if ($randVal == 1) {
            echo 'One!';
        } else if ($randVal == 2) {
            echo 'Two!';
        } else if ($randVal == 3) {
            echo 'Three!';
        } else if ($randVal == 4) {
            echo 'Four!';
        } else if ($randVal == 5) {
            echo 'Five!';
        }
    }

    ?>

    <form method="post">
        <input type = "submit" name = "button"
                class = "button" value = "Button of Doom" />

    </form>

    <form method="post" action="">
        <input type="text" name="something" value="<?= isset($_POST['something']) ? htmlspecialchars($_POST['something']) : '' ?>" />
        <input type="submit" name="submit" />
    </form>

    <form action = "navigate.php">
        <input type = "submit" name = "buttonNav"
                class = "button" value = "Go to Connection Page" />
    </form>

</body>

</html>