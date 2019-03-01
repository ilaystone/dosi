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
        <table>
            <?php
            foreach ($info as $inf) {
                ?>
                <tr>
                    <td>OBJET</td>
                    <td><textarea name="OBJET" rows="8" cols="21"> <?= $inf->object; ?> </textarea></td>
                </tr>
                <tr>
                    <td>Responsable</td>
                    <td><input type="text" name="Responsable" value="<?= $inf->responsable; ?>" readonly></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td>AO n°</td>
                    <td><input type="text" name="AO" value="<?= $inf->aon; ?>"></td>
                </tr>
                <tr>
                    <td>Marché n°</td>
                    <td><input type="text" name="Marche" value="<?= $inf->numMarche; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Attributaire</td>
                    <td><input type="text" name="Attributaire" value="<?= $inf->attributaire; ?>"></td>
                </tr>
                <tr>
                    <td>Date d'ouverture des plis</td>
                    <td><input type="date" name="Dateou" value="<?= $inf->dateOuverture; ?>"></td>
                </tr>
                <tr>
                    <td>Date d'pprobation</td>
                    <td><input type="date" name="Dateap" value="<?= $inf->dateAprobation; ?>" required></td>
                </tr>
                <tr>
                    <td>Approuvé par</td>
                    <td><input type="text" name="Approuve" value="<?= $inf->approuvePar; ?>" required></td>
                </tr>
                <tr>
                    <td>Situation</td>
                    <td><input type="text" name="Situation" value="<?= $inf->situation; ?>"></td>
                </tr>
                <tr>
                    <td>Montant HT</td>
                    <td><input type="text" name="Montantht" value="<?= $inf->montantHT; ?>"></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <input type="submit" name="submit" value="Enregistrer">
    </form>
  </fieldset>
    <div class="">
      <a href="/info/default/<?= $this->_params[0]; ?>">Retourw</a>
    </div>

</body>
</html>
