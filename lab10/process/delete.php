
<?php
    include "process.php";
    $deleteSuccess = "";
    $id_delete =(int) $_GET["idDelete"];
    $sql = "DELETE FROM cars WHERE id=$id_delete";
    if ($conn->query($sql)===TRUE){
        $deleteSuccess = "Delete complete";
    }
    else {
        $deleteSuccess = "Failed!!";
    }
    $result = json_encode(array("result"=>$deleteSuccess));
    echo $result;
?>