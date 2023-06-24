<?php

$customers = array(
	array('id' => 20, 'name' => 'Jack Aranda', 'dob' => '21-11-1988'),
	array('id' => 21, 'name' => 'Olive Tree', 'dob' => '28-02-2000'),
	array('id' => 22, 'name' => 'John', 'dob' => '11-09-1998')
);

$customers_discount = get_discount($customers);

function get_discount($data)
{
	$returnArray = [];
	foreach ($data as $value)
	{
		$digitNum = strtotime($value['dob']);
		$digitNum = date('dmY',$digitNum);
		$discount = sumofdigit($digitNum);

		if($discount > 20 && $discount < 35)
		{
			$discount_result = $discount;
		}
		elseif($discount >= 35)
		{
			$discount_result = 35;
		}
		else{
			$discount_result = 0;
		}
		$returnArray[] = array('id' => $value['id'], 'name' => $value['name'], 'dob' => $value['dob'], 'discount' => $discount_result);
	}

	return $returnArray;
}

function sumofdigit($digit)
{  
	$sum = 0;
    for ($i = 0; $i < strlen($digit); $i++){
        $sum += $digit[$i];
    }
    return $sum;
}

?>

<style type="text/css">
	table th, table td{
		border: 1px solid;
		padding:5px;
		text-align: center;
	}
</style>
<table style="padding: 50px">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>DOB</th>
		<th>Discount</th>
	</tr>
	<?php foreach($customers_discount as $cust){ ?>
	<tr>
		<td><?= $cust['id']; ?></td>
		<td><?= $cust['name']; ?></td>
		<td><?= $cust['dob']; ?></td>
		<td>₹<?= $cust['discount']; ?></td>
	</tr>
<?php } ?>
</table>