<?php

class Autocomplete{
    public function AutoComp(){
        ?>
        <script>
        var getShipNames =<?php foreach($_SESSION['policyScreen']['police_ist'] as $key => $value)
        if($value['ist_adi'] == 'Gemi Adi/Imo'){
            foreach($value['ist_deger_tab'] as $shipNames)
                $fileContent [  ] = $shipNames['deger_adi'];
                echo json_encode($fileContent) ?> 
        </script>
        <?php
        }
    }
}