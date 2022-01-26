<table width="100%" id="table">
	<thead>
		<tr>
			<th align="left">Name</th>
			<th align="left">Pharmacist id</th>
			<th align="left">Presentation name</th>
			<th align="left">credits</th>
			<th align="left"># of correct answers</th>
			<th align="left">Pass/fail</th>
			<th align="left">exam date</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($result as $rows) {
		$countstmt = $conx->dbh->prepare("SELECT COUNT(SessionId) AS qstcount FROM questiontbl WHERE SessionId = ".$rows['SessionId'].";");
		$countstmt->execute();
		$qstcount = $countstmt->fetch();
	?>
		<tr>
			<td><?php echo $rows['email'];?></td>
			<td><?php echo $rows['userid'];?></td>
			<td><?php echo $rows['SessionName'];?></td>
			<td><?php echo $rows['credits'];?></td>
			<td><?php echo $rows['correctanswers']." out of ".$qstcount['qstcount'];?></td>
			<td><?php echo $rows['examstatus'];?></td>
			<td><?php echo $rows['examdate'];?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>