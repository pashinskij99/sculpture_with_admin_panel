<?php

    require_once 'admin/includes/connect.php';

    $variables = mysqli_query($connect, "SELECT * FROM `variables`");

    $vars = [];

    while($var = mysqli_fetch_assoc($variables)) {
        $vars[$var["Make a sculpture(true)"]] = $var['Value'];
    }

    var_dump($vars);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>BARTOLOME.DE - infinite sculpture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animation.css">

    <script src="js/build/three.min.js"></script>
    <script src="js/build/TrackballControls.js"></script>
    <script src="js/build/NURBSCurve.js"></script>
    <script src="js/build/NURBSUtils.js"></script>
    <script src="js/build/Projector.js"></script>
    <script src="js/build/CanvasRenderer.js"></script>
    <script src="js/build/stats.min.js"></script>
    <script src="js/build/dat.gui.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/build/STLExporter.js"></script>

</head>
<body>
<div class="container-loader">

    <a href="" id="downloadAnchorElem"> </a>
    <div class="triangles">
        <div class="tri invert"></div>
        <div class="tri invert"></div>
        <div class="tri"></div>
        <div class="tri invert"></div>
        <div class="tri invert"></div>
        <div class="tri"></div>
        <div class="tri invert"></div>
        <div class="tri"></div>
        <div class="tri invert"></div>
    </div>
</div>
<canvas id="debug" style="position:absolute; left:100px"></canvas>
<div id="main">
</div>
<div id="back">
</div>
<!--<script src="js/temp/material.js"></script>-->
<script src="js/temp/app.js"></script>
</body>
</html>