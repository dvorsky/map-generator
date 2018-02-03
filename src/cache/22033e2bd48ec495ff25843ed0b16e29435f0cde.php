<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Game Map</title>

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.6.0/p5.js"></script>

    <style>
        * { font-family: 'Inconsolata', monospace; padding: 0; margin: 0; }
        .water { color: aqua }
        .beach { color: khaki }
        .land { color: chartreuse }
        .forest { color: darkgreen }
        .mountain { color: gray }
        .snow { color: azure }

        canvas { background: #eee; display: block; margin: 0 auto; }
    </style>
</head>
<body>
    <script>let map = <?php echo e($map); ?>;</script>
    <script src="../../public/canvas.js"></script>
</body>
</html>
