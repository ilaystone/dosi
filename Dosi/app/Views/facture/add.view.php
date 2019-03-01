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
            <th>marche n°</th>
            <td><input type="text" name="numMarche" value="<?= $this->_params[0]; ?>" readonly></td>
          </tr>
          <tr>
            <th>facture n°</th>
            <td><input type="text" name="numFacture" value=""></td>
          </tr>
          <tr>
            <th>n° de prix</th>
            <td><input type="text" name="numPrix" value=""></td>
          </tr>
          <tr>
            <th>designation</th>
            <td><input type="text" name="designation" value=""></td>
          </tr>
          <tr>
            <th>Unite</th>
            <td><input type="text" name="unite" value=""></td>
          </tr>
          <tr>
            <th>QTE</th>
            <td><input type="text" name="qte" value=""></td>
          </tr>
          <tr>
            <th>%</th>
            <td><input type="text" name="percent" value=""></td>
          </tr>
          <tr>
            <th>P.U.H.T</th>
            <td><input type="text" name="puht" value=""></td>
          </tr>
          <tr>
            <th>Montant</th>
            <td><input type="text" name="mnt" value=""></td>
          </tr>
        </table><br>
        <input type="submit" name="submit" value="enregistrer ">
      </form>
    </fieldset>
    <div class="">
      <a href="/info/default/<?= $this->_params[0]; ?>">Retour</a>
    </div>
  </body>
</html>
