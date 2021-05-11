<?php
//validate data for the diner app
function validFood($food){
    return strlen(trim($food))>=2;
}

//return true is meal is valid

function valMEal($meal){
    return in_array("meal", getMeals());
}