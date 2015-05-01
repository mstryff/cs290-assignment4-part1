<head>
    <meta charset="UTF-8">
    <title>Loop Back</title>
</head>
<body>
<?php
    $type;
    $parameters = array();
    $encodeArray = array();
    $encode = true;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $type = 'POST';
    }
    elseif($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $type = 'GET';
    }
    else
    {
        echo "Invalid request.<br/>";
        $encode = false;
    }

    if($encode)
    {
        if($type == 'POST' && $_SERVER['CONTENT_LENGTH'] != 0)
        {
            foreach($_POST as $key => $value)
            {
                $parameters[$key] = $value;
            }
        }
        elseif($type == 'GET' && $_SERVER['CONTENT_LENGTH'] != 0)
        {
            foreach($_GET as $key => $value)
            {
                $parameters[$key] = $value;
            }
        }
        else
        {
            $parameters = null;
        }
       
        $encodeArray['Type'] = $type;
        $encodeArray['parameters'] = $parameters;
        echo json_encode($encodeArray, JSON_FORCE_OBJECT), "\n";
    }
?>
</body>