<?php

class CarPolicy
{
  
    var $policyNumber;
    var $yearlyPremium;
    var $dateOfLastClaim;

   
    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
        $this->dateOfLastClaim = null; 
    }

    
    public function setDateOfLastClaim($date)
    {
        $this->dateOfLastClaim = $date;
    }

    
    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

  
    public function __toString()
    {
        return "PN: " . $this->policyNumber;
    }
}

?>
