<head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
    $min_multiplicand = $_GET['min-multiplicand'];
    $max_multiplicand = $_GET['max-multiplicand'];
    $min_multiplier = $_GET['min-multiplier'];
    $max_multiplier = $_GET['max-multiplier'];
    $runTable = true;

    //Verify GET input

    if(is_null($_GET['max-multiplier']))
    {
        echo "Missing parameter max-multiplier.<br/>";
        $runTable = false;
    }

    if(is_null($_GET['min-multiplier']))
    {
        echo "Missing parameter min-multiplier.<br/>";
        $runTable = false;
    }

    if(is_null($_GET['max-multiplicand']))
    {
        echo "Missing parameter max-multiplicand.<br/>";
        $runTable = false;
    }

    if(is_null($_GET['min-multiplicand']))
    {
        echo "Missing parameter min-multiplicand.<br/>";
        $runTable = false;
    }
    
    foreach($_GET as $key => $value)
    {
        if(is_null($value) || !is_numeric($value))
        {
            echo "$key must be an integer.<br/>"; 
            $runTable = false;
        }
    }
    
    if($min_multiplicand > $max_multiplicand)
    {
        echo "Minimum multiplicand larger than maximum multiplicand.<br/>";
        $runTable = false;
    }
    if($min_multiplier > $max_multiplier)
    {
        echo "Minimum multiplier larger than maximum multiplier.<br/>";
        $runTable = false;
    }

    $tableHeight = ($max_multiplicand - $min_multiplicand) + 2;
    $tableWidth = ($max_multiplier - $min_multiplier) + 2;
    
    if($runTable):
?>
<body>
    <table>
        <tr>
            <td></td>
            <?php 
                for($i = $min_multiplier; $i <= $max_multiplier; $i++)
                {
                    echo "<td>$i</td>";
                }

                for($i = $min_multiplicand; $i <= $max_multiplicand; $i++)
                {
                    echo "<tr><td>$i</td>";
                    for($j = $min_multiplier; $j <= $max_multiplier; $j++)
                    {
                        echo "<td>" . $i*$j . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tr>
    </table>
</body>
<?php endif ?>