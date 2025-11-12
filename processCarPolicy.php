<?php

date_default_timezone_set('Europe/Dublin');
include("CarPolicy2.php");


$policyNumber = $_POST['policyNumber'];
$yearlyPremium = $_POST['yearlyPremium'];
$dateOfLastClaim = $_POST['dateOfLastClaim'];

$myCarpolicy = new CarPolicy($policyNumber, $yearlyPremium);

$myCarpolicy->setDateOfLastClaim($dateOfLastClaim);

$initialPremium = $yearlyPremium;
$discountedPremium = $myCarpolicy->getDiscountedPremium();
$yearsNoClaims = $myCarpolicy->getTotalYearsNoClaims();
$discountPercent = $myCarpolicy->getDiscount();

echo "<h2>Car Policy Summary</h2>";
echo "<p><strong>Policy Number:</strong> " . $myCarpolicy . "</p>";
echo "<p><strong>Years No Claims:</strong> " . $yearsNoClaims . "</p>";
echo "<p><strong>Discount:</strong> " . $discountPercent . "%</p>";
echo "<p><strong>Initial Premium:</strong> €" . number_format($initialPremium, 2) . "</p>";
echo "<p><strong>Discounted Premium:</strong> €" . number_format($discountedPremium, 2) . "</p>";
?>
