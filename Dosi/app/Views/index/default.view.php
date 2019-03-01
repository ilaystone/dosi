<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<style media="screen">
    fieldset {
        text-align: center;
        margin: auto;
        border-radius: 25px;
    }

    table {
        text-align: center;
        margin: auto;
    }

    div {
        text-align: center;
        margin: auto;
    }
</style>
<body>
<?php
if (isset($_SESSION['success']) && $_SESSION['message'] != '')
{
?>
<body onload="<?php echo 'alert(\'' . $_SESSION['message'] . '\')'; ?>">
<?php
$_SESSION['message'] = '';
}
?>
<form class="" method="post">
    <fieldset>
        <legend>list des marcheé</legend>
        <?php
        if ($_SESSION['tag'] == 0) {
            echo '<a href="/index/add/">Ajouter un marche</a>';
        }
        ?>
        <table border="1">
            <tr>
                <th>N° marche</th>
                <th>Responsable</th>
                <th>Division</th>
                <th>Service</th>
                <th>Operation</th>
            </tr>
            <?php
            foreach ($markets as $market) {
                ?>
                <tr>
                    <td><?= $market->numMarche ?></td>
                    <td><?= $market->responsable ?></td>
                    <td><?= $market->division ?></td>
                    <td><?= $market->service ?></td>
                    <td>
                        <a href="/info/default/<?= $market->numMarche ?>">GoTO</a>
                        <a href="/index/edit/<?= $market->numMarche ?>/">edit</a>
                        <a href="/index/delete/<?= $market->numMarche ?>/">delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </fieldset>
    <?php
    if ($_SESSION['tag'] == 0) {
        echo '<fieldset>';
        echo '<legend>list des utilisateurs</legend>';
        echo '<a href="/login/add/">Ajouter un utilisateur</a><br>';
        ?>
        <table border="1">
            <?php
            echo '<tr>';
            echo '<th>username</th>';
            echo '<th>pasdswor</th>';
            echo '<th>tag</th>';
            echo '<th>operation</th>';
            echo '</tr>';
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>' . $user->username . '</td>';
                echo '<td>' . $user->password . '</td>';
                echo '<td>' . $user->tag . '</td>';
                echo '<td><a href="/login/edit/' . $user->username . '">edit</a>
                          <a href="/login/delete/' . $user->username . '">delete</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <?php
        echo '</fieldset>';
    }
    ?>

    <br>
    <div class="">
        <input type="submit" name="submit" value="deconnecter">
    </div>
</form>
</body>
</html>
