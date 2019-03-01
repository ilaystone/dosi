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
              <th>username</th>
              <th>password</th>
              <th>tag</th>
          </tr>
          <tr>
              <td><input type="text" name="name" value=""></td>
              <td><input type="text" name="pass" value=""></td>
              <td><select class="" name="tag">
                      <option value="0">directeur</option>
                      <option value="1">division</option>
                      <option value="2">service</option>
                      <option value="3">marche</option>
                  </select></td>
          </tr>
      </table>
      <input type="submit" name="submit" value="Valider">
  </form>
</fieldset>
<div class="">
  <a href="/index/default">Retour</a>
</div>
</body>
</html>
