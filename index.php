<?php
include("autoload.php");

use App\SdkMirror;


$sdk = new SdkMirror([
        [
            "name" => "Facebook",
            "client_id" => "1481505172028404",
            "client_secret" => "a89cf0991c3e44cf14c3c084ae2b329e"
        ],
        [
            "name" => "Github",
            "client_id" => "Iv1.ee098b69773dde65",
            "client_secret" => "9b9b0a524240eaf594676845501802c8ad7070cb"
        ],
        [
            "name" => "Course",
            "client_id" => "",
            "client_secret" => ""
        ]
    ]
);

if (!isset($_GET["code"])) {
    $links = $sdk->getLinks();
    foreach ($links as $key => $link){
        echo "<a href='".$link."'>".$key."</a><br><br><br>";
    }
} else {
    var_dump($sdk->getUserData());
}
