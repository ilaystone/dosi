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
              <td>num</td>
              <td><input type="text" name="num" value=""></td>
          </tr>
          <tr>
              <td>date OS</td>
              <td><input type="date" name="dateOS" value="" required></td>
          </tr>
          <tr>
              <td>type OS</td>
              <td><input type="text" name="typeOS" value=""></td>
          </tr>
          <tr>
              <td>Etape</td>
              <td><input type="text" name="etape" value=""></td>
          </tr>
          <tr>
              <td>remarque</td>
              <td><input type="text" name="remarque" value=""></td>
          </tr>
          <br>
      </table>
      <br>
      <input type="submit" name="submit" value="engregistrer">
  </form>
</fieldset>
<div class="">
  <a href="/info/default/<?= $this->_params[0]; ?>">Retour</a>
</div>
</body>
</html>
