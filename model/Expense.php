<?php

class Expense {
    private $empID, $expDate, $expDescription, $categoryID, $paymentMethod,
            $reimbursable, $amount;
    
    public function __construct($empID_input, $expDate_input, $expDescription_input, 
            $categoryID_input, $paymentMethod_input, $reimbursable_input, 
            $amount_input) {
        $this->empID = $empID_input;
        $this->expDate = $expDate_input;
        $this->expDescription = $expDescription_input;
        $this->categoryID = $categoryID_input;
        $this->paymentMethod = $paymentMethod_input;
        $this->reimbursable = $reimbursable_input;
        $this->amount = $amount_input;
    }
    
    public function getEmpID() { return $this->empID; }
    public function getDate() { return $this->expDate; }
    public function getDescription() { return $this->expDescription; }
    public function getCategoryID() { return $this->categoryID; }
    public function getPaymentMethod() { return $this->paymentMethod; }
    public function getReimbursable() { return $this->reimbursable; }
    public function getAmount() { return $this->amount; }
}
