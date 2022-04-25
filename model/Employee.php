<?php

class Employee {
    private $empID, $fname, $lname;
    
    public function __construct($empID_input, $fname_input, $lname_input) {
        $this->empID = $empID_input;
        $this->fname = $fname_input;
        $this->lname = $lname_input;
    }
    
    public function getID() { return $this->empID; }
    public function getFname() { return $this->fname; }
    public function getLname() { return $this->lname; }
}
