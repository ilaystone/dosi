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
          foreach ($engagement

                   as $eng) {
              ?>
              <tr>
                  <td>Année</td>
                  <td><input type="text" name="annee" value="<?= $eng->annee; ?>"></td>
              </tr>
              <tr>
                  <td>Rubrique</td>
                  <td><input type="text" name="rubrique" value="<?= $eng->rubrique; ?>" readonly></td>
              </tr>
              <tr>
                  <td>Report</td>
                  <td><input type="text" name="report" value="<?= $eng->report; ?>"></td>
              </tr>
              <tr>
                  <td>Consolidation</td>
                  <td><input type="text" name="consolidation" value="<?= $eng->consolidation; ?>"></td>
              </tr>
              <tr>
                  <td>Nouveau CP</td>
                  <td><input type="text" name="ncp" value="<?= $eng->ncp; ?>"></td>
              </tr>
              <tr>
                  <td>total de CP</td>
                  <td><input type="text" name="tcp" value="<?= $eng->tcp; ?>"></td>
              </tr>
              <tr>
                  <td>CE</td>
                  <td><input type="text" name="ce" value="<?= $eng->ce; ?>"></td>
              </tr>
              <?php
          }
          ?>
      </table>
      <br>
      <input type="submit" name="submit" value="submit">
  </form>
</fieldset>
<div class="">
  <a href="/info/default/<?= $this->_params[0]; ?>">Retour</a>
</div>
</body>
</html>
