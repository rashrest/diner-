<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

//Start session start
session_start();


//require autoload file
require_once('vendor/autoload.php');

//Instantiate fat-free
$f3=Base::instance();

//define route before your run fat-free
//define default route
$f3->route('GET /',function (){
   //Display the home page
    $view = new Template();
    echo $view-> render('views/info.html');
});

$f3->route('GET|POST /Order1',function (){
    //if the form has submitted , add the  data to session and send the user to the next order form
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $_SESSION['food']=$_POST['food'];
        $_SESSION['meal']=$_POST['meal'];
        header('location: order2');
    }
    //Display the home page
    $view = new Template();
    echo $view-> render('views/orderForm1.html');
});

$f3->route('GET|POST /Order2',function (){

    //if the form has submitted , add the  data to session and send the user to the next order form
    if($_SERVER['REQUEST_METHOD']=='POST'){
        //Data val wiil go here

        $_SESSION['conds']=$_POST['conds'];
        header('location: summary');
    }
    //Display the home page
    $view = new Template();
    echo $view-> render('views/orderForm2.html');
});

$f3-> route('GET /summary',function (){
   $view = new Template();
   echo $view-> render('views/summary.html');
});



//Run Fat-Free
$f3->run();