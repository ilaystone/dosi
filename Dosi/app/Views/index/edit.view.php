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
          foreach ($info as $inf) {
              ?>
              <tr>
                  <td>N° marche</td>
                  <td><input type="text" name="marche" value="<?= $inf->numMarche; ?>"></td>
              </tr>
              <tr>
                  <td>Responsable</td>
                  <td><input type="text" name="responsable" value="<?= $inf->responsable; ?>"></td>
              </tr>
              <tr>
                  <td>devision</td>
                  <td><input type="text" name="devision" value="<?= $inf->division; ?>"></td>
              </tr>
              <tr>
                  <td>service</td>
                  <td><input type="text" name="service" value="<?= $inf->service; ?>"></td>
              </tr>
              <?php
          }
          ?>
      </table>
      <br>
      <input type="submit" name="submit" value="Enregistrer"><br>
  </form>
</fieldset>
<div class="">
  <a href="/index/default">Retour</a>
</div>
</body>
</html>
