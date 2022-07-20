<style>
	table{
		border-collapse: collapse;
		border: 2px solid #1c1e1f;
	}

	.bg-light{
		background-color: #ffffff;
	}

	.bg-dark{
		background-color: #1c1e1f;
	}

	table tr td{
		padding: 20px;
	}
</style>

<?php 
echo '<table>';
 for($row=1; $row<=8; $row++)
  {
  	echo "<tr>";
  	for($col=1; $col<=8; $col++)
  	{
  		$total = $row + $col;
      	if($total%2 == 0){
      		echo "<td class='bg-light'></td>";
      	}else{
      		echo "<td class='bg-dark'></td>";
      	}
  	}
  	echo "</tr>";
}
echo '</table>';