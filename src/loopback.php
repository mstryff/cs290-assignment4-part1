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
    
    /*
        I found $_SERVER['REQUEST_METHOD'] at http://stackoverflow.com/questions/22265509/why-should-we-use-if-serverrequest-method-post
        This accesses the SERVER superglobal and returns the request method(GET or POST)
    */
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
        /*
            $_SERVER['CONTENT_LENGTH'] from http://stackoverflow.com/questions/1361451/get-size-of-post-request-in-php
            This returns the length of a POST or GET request, which I used to assert that the request was not empty.
        */
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