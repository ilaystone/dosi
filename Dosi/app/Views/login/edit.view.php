<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  fieldset {
  width: 15%;
  text-align: center;
  margin: auto;
  border-radius: 25px;
  }
  div {
    text-align: center;
  }
  </style>
  <body>
<fieldset>
  <form class="" method="post">
    <table border="1">
        <?php
        foreach ($users as $user)
        {
        ?>
        <tr>
            <th>username</th>
            <th>password</th>
            <th>tag</th>
        </tr>
        <tr>
            <td><input type="text" name="name" value="<?= $user->username; ?>"></td>
            <td><input type="text" name="pass" value="<?= $user->password; ?>"></td>
            <td><select class="" name="tag">
                    <option value="0" <?php if($user->tag == 0) echo 'SELECTED';?>>directeur</option>
                    <option value="1" <?php if($user->tag == 1) echo 'SELECTED';?>>division</option>
                    <option value="2" <?php if($user->tag == 2) echo 'SELECTED';?>>service</option>
                    <option value="3" <?php if($user->tag == 3) echo 'SELECTED';?>>marche</option>
                </select></td>

        </tr>
    </table>
      <?php
      }
      ?>
    <input type="submit" name="submit" value="Valider">
  </form>
</fieldset>
  <div class="">
      <a href="/index/default">Retour</a>
  </div>
  </body>
</html>
