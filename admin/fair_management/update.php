<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];


           
$diesel_price=mysqli_real_escape_string($connect,$_REQUEST['diesel_price']); 
$labor_cost_charge=mysqli_real_escape_string($connect,$_REQUEST['labor_cost_charge']); 
$batteries_charge=mysqli_real_escape_string($connect,$_REQUEST['batteries_charge']); 
$depreciation_charge=mysqli_real_escape_string($connect,$_REQUEST['depreciation_charge']); 
$interest_expense_charge=mysqli_real_escape_string($connect,$_REQUEST['interest_expense_charge']); 
$repairs_and_maintenance_charge=mysqli_real_escape_string($connect,$_REQUEST['repairs_and_maintenance_charge']); 
$registration_and_insurance_charge=mysqli_real_escape_string($connect,$_REQUEST['registration_and_insurance_charge']); 
$comminication_equipments_charge=mysqli_real_escape_string($connect,$_REQUEST['comminication_equipments_charge']); 
$other_investments_charge=mysqli_real_escape_string($connect,$_REQUEST['other_investments_charge']); 
$markup_charge=mysqli_real_escape_string($connect,$_REQUEST['markup_charge']); 
$vat=mysqli_real_escape_string($connect,$_REQUEST['vat']); 


echo $updt="update tbl_fair_management set diesel_price='$diesel_price',labor_cost_charge='$labor_cost_charge',batteries_charge='$batteries_charge',depreciation_charge='$depreciation_charge',interest_expense_charge='$interest_expense_charge',repairs_and_maintenance_charge='$repairs_and_maintenance_charge',registration_and_insurance_charge='$registration_and_insurance_charge',comminication_equipments_charge='$comminication_equipments_charge',other_investments_charge='$other_investments_charge',markup_charge='$markup_charge',vat='$vat' where id = $pid "; 
mysqli_query($connect,$updt);
 

header('Location:view.php?add=2'); 
Exit();	


	
?>