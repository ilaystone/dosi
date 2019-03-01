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
          <tr>
              <td>num decompte</td>
              <td><input type="text" name="numDecompte" value=""></td>
          </tr>
          <tr>
              <td>montant acpomte</td>
              <td><input type="text" name="mntAcompte" value=""></td>
          </tr>
          <tr>
              <td>montant retenue garantie</td>
              <td><input type="text" name="mntRetenue" value=""></td>
          </tr>
          <tr>
              <td>date enoyée par DOSI</td>
              <td><input type="text" name="dateEnvoye" value=""></td>
          </tr>
          <tr>
              <td>cumule de paiment</td>
              <td><input type="text" name="cumulePaiment" value=""></td>
          </tr>
          <tr>
              <td>observation</td>
              <td><input type="text" name="observation" value=""></td>
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
