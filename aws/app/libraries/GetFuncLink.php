<?php 

class GetFuncLink{
    public function getfnclink($func_id)
    {
        if (isset($_SESSION['env'])) {
            echo($_SESSION['env']['links'][$_SESSION['env']['db_type']][$func_id]);
        } else {
            echo($func_id . " is not found");
        }
    } 
}