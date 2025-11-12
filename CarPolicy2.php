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

    
    public function getDiscount()
    {
        $years = $this->getTotalYearsNoClaims();

        if ($years >= 3 && $years <= 5) {
            return 10; 
        } elseif ($years > 5) {
            return 15; 
        } else {
            return 0;  
        }
    }

    
    public function getDiscountedPremium()
    {
        $discountPercent = $this->getDiscount();
        $discountAmount = ($this->yearlyPremium * $discountPercent) / 100;
        return $this->yearlyPremium - $discountAmount;
    }

    
    public function __toString()
    {
        return "PN: " . $this->policyNumber;
    }
}

?>
