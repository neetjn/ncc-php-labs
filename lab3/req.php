<?php
	
	extract( $_POST );
	
	$expense_total = $rent + $salary + $supplies;
	$operating_income = $sales - $expense_total;
	$net_income =  $operating_income * .60;
	
?>

<h1>Book Store Operating Costs</h1>
<pre>
	Sales: <?php echo($sales); ?>
	Expenses:
		Rent: <?php echo($rent); ?>
		Salary: <?php echo($salary); ?>
		Supplies: <?php echo($supplies); ?>
	Total:
		Operating Income: <?php echo($operating_income); ?>
		Income after taxes (net): <?php echo($net_income); ?>
</pre>