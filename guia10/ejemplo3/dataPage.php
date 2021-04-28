<?php
    $dataOptions = array();
    $dataOptions["Estados Unidos"] = array(
        "Alabama (AL)","New York (NY)","California (CA)","Arkanzas (AR)",
        "Florida (FL)","Arizona (AZ)","Colorado (CO)"
    );
    $dataOptions["Canadá"] = array(
        "Alberta (AB)","British Columbia (BC)","Ontario (ON)","Quebec (QC)","Toronto (TO)"
    );
    $dataOptions["México"] = array(
        "Guadalajara (GU)","Monterrey (MO)","Veracruz (VE)","Queretaro (QU)","Morelia (MO)","Toluca (TO)"
    );
    if(isset($_POST["dataRequest"]) && isset($dataOptions[$_POST["dataRequest"]])){
        if(in_array($_POST["dataRequest"], array("Estados Unidos", "Canadá", "México"))){
            foreach($dataOptions[$_POST["dataRequest"]] as $secondaryOptions){
                printf("%s,", $secondaryOptions);
            }
        }else {
            $secondaryOptions = "(Elige un país primero)";
            printf("%s", $secondaryOptions);
        }
    }
?>