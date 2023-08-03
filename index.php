<?php

class Person {
    private $isVIP;
    public $first_name;
    public $last_name;
    public $age;
    
    function __construct($first_name, $last_name, $age, $isVIP)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->age = $age;
        $this->isVIP =$isVIP;
    }
    
    function get_fullName(){
        return $this->first_name . " " . $this->last_name;
    }
    
    
    function get_isVIP() {
        return $this->isVIP;
    }
    
    
    // function __destruct()
    // {
    //     echo "<br>";
    //     echo "-----start of destructing";
    //     echo "<br>";
    //     echo "$this->first_name has been removed from memory";
    // }
}
//convert script.js to php version


$john = new Person("John","Doe",23,true);


class House extends Person {
    private $vips = [];
    private $visitors = [];
    
    private $address;
    private $price;
    
    function __construct($first_name, $last_name, $age, $isVIP,$address,$price)
    {
        
        parent::__construct($first_name, $last_name, $age, $isVIP);
        $this->vips = [];
        $this->visitors =[];
        $this->address = $address;
        $this->price = $price;
        
    }
    
    function enterVisitor($person) {
     
        
        if($person->get_isVIP()) {
            array_push($this->vips,$person);
        } else {
            array_push($this->visitors, $person);
        }
    }
    
    function get_address(){
        return $this->address;
    }
    
    function set_address($newAddress){
      return  $this->address = $newAddress;
    }
    
    function get_visitors(){
        $newVisitors = [];
        for ($i=0; $i<count($this->visitors); $i++){
            array_push($newVisitors, $this->visitors[$i]);
            
        }
    
        return $newVisitors;
    }
    
    function get_vips(){
        $newVips = [];
        for ($i=0; $i<count($this->vips); $i++){
            array_push($newVips, $this->vips[$i]);
        }
        return $newVips;
    }
}

// ($first_name, $last_name, $age, $isVIP,$vips,$visitors,$address,$pric)
$john = new Person("john","Doe",21,false);
$jane = new Person("jane","Doe",21,false);
$davy = new Person("Davy","Doe",21,true);
$house = new House("Mark","Doe",21,false,"MANILA",200000);
echo "<br>";
$john->get_isVIP();
$house->enterVisitor($john);
$jane->get_isVIP();
$house->enterVisitor($jane);
$davy->get_isVIP();
$house->enterVisitor($davy);
echo "<br>";
echo "-----VIP LIST-----";
echo "<br>";
print_r($house->get_vips());
echo "<br>";
echo "-----VISITOR LIST-----";
echo "<br>";
print_r($house->get_visitors());






// $arr = ['abc'];
// $newArr = [1,2,3,4];
// for($i=0; $i<count($newArr); $i++) {
//     array_push($arr, $newArr[$i]);
    
// }

// print_r($arr);


