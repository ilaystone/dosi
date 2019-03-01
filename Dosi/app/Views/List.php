<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Informations</title>
</head>
<style media="screen">
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #6181BD;
}
li a {
  display: block;
  color: white;
  float: left;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}
a.list:hover {
  background-color: blue;
}
fieldset {
  text-align: center;
  margin: auto;
  border-radius: 25px;
}
table {
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
    <ul>
        <li><a href="/index/default/" class="list">home</a></li>
        <li><a href="/info/add/<?= $this->_params[0];?>" class="list">Info</a></li>
        <li><a href="/emission/add/<?= $this->_params[0];?>" class="list">Emission</a></li>
        <li><a href="/facture/add/<?= $this->_params[0];?>" class="list">facture</a></li>
        <li><a href="/engagement/add/<?= $this->_params[0];?>" class="list">Engagement</a></li>
        <li><a href="/ordreService/add/<?= $this->_params[0];?>" class="list">Ordre de service</a></li>
        <li><a href="/bp/add/<?= $this->_params[0];?>" class="list">Bordeaux des prix</a></li>
    </ul>
