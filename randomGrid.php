<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Random Color Grid</title>


    <style type="text/css">

        .white-text {

            display:block;
            color: #ffffff;
        }

        .black-text {

            display:block;
            color: #000000;
        }

        .black {

            width:50px;
            height:50px;
            background-color: #173534;

        }

        .green {

            width:50px;
            height:50px;
            background-color: #247422;

        }

        .pea-green {

            width:50px;
            height:50px;
            background-color: #A3BC34;

        }

        .gray {

            width:50px;
            height:50px;
            background-color: #AABBCC;

        }
        .dark-blue  {

            width:50px;
            height:50px;
            background-color: #1351AC;

        }
        .lt-green {

            width:50px;
            height:50px;
            background-color: #547142;

        }
        .red {

            width:50px;
            height:50px;
            background-color: #AD2431;

        }
        .teal {

            width:50px;
            height:50px;
            background-color: #113344;

        }
        .purple {

            width:50px;
            height:50px;
            background-color: #431241;

        }

    </style>
</head>
<body>
<table border= 1>
    <?php

    $colors = array(array('black','173534'),
        array('green','247422'),array('pea-green','A3BC34'),array('gray','AABBCC'),
        array('dark-blue','1351AC'),array('lt-green','547142'),array('red','AD2431'),
        array('teal','113344'),array('purple','431241'));

    for($i = 0; $i < 10; $i++)
    {
        echo "<tr>";

        for($j = 0; $j < 10; $j++)
        {
            $mt_rand = mt_rand(0,8); // Randomizes Color Blocks
            echo "<td class='" . $colors[$mt_rand][0] . "'>
    <span class='black-text'>{$colors[$mt_rand][1]}</span>
    <span class='white-text'>{$colors[$mt_rand][1]}</span>
        </td>";
        }// End of Second For Loop

        echo "</tr>";
    }// End of First For Loop
    ?>
</table>
</body>
</html>