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
          foreach ($bordeau

          as $bp)
          ?>
          <tr>
              <td>num de mission</td>
              <td><input type="text" name="numMission" value="<?= $bp->numMission; ?>" readonly></td>
          </tr>
          <tr>
              <td>designation</td>
              <td><input type="text" name="designation" value="<?= $bp->designation; ?>"></td>
          </tr>
          <tr>
              <td>unite</td>
              <td><input type="text" name="unite" value="<?= $bp->unite; ?>"></td>
          </tr>
          <tr>
              <td>prix unitaire</td>
              <td><input type="text" name="prixUnitaire" value="<?= $bp->prixUnitaire; ?>"></td>
          </tr>
          <tr>
              <td>prix total</td>
              <td><input type="text" name="prixTotal" value="<?= $bp->prixTotal; ?>"></td>
          </tr>
          <tr>
              <td>delais</td>
              <td><input type="text" name="delais" value="<?= $bp->delais; ?>"></td>
          </tr>
      </table>
      <br>
      <input type="submit" name="submit" value="enregistrer">
  </form>
</fieldset>
<div class="">
  <a href="/info/default/<?= $this->_params[0]; ?>">Retour</a>
</div>
</body>
</html>
