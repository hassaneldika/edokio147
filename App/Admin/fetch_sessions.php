<?php
	include('connect.php');
	$conx=new Service();
	$conx->connect();
	if(isset($_POST["action"])) {
		$query = "SELECT * FROM session INNER JOIN event ON session.EventId=event.EventId ";
		if(isset($_POST['sessionname']) && !empty($_POST['sessionname'])) {
			$query .= " WHERE SessionName LIKE  '%".$_POST['sessionname']."%'";
		}
		$stmt = $conx->dbh->prepare($query);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$output = '';

		$eventstmt = $conx->dbh->prepare("SELECT * FROM event");
		$eventstmt->execute();
		$allevents = $eventstmt->fetchAll();

		if(!empty($result))	{
			foreach($result as $row){
				$datetoshow = substr($row['SessionDate'],0,10);
				$status=$row['SessionStatus'];
				$statustoshow='';
				if ($status=='0') {
					$statustoshow='<a class="btn bg-danger full-width text-white" onclick="confirmactivate('.$row['SessionId'].')"> Activate </a>';
				} else {
					$statustoshow='<a class="btn bg-success full-width text-white" onclick="confirmdeactivate('.$row['SessionId'].')"> Deactivate </a>';
				}
				$optionstoshow = '';
				foreach ($allevents as $event) {
					$selectedstring='';
					if ($row['EventId'] == $event['EventId']) {$selectedstring=' selected';}
					$optionstoshow .='<option value="'.$event['EventId'].'" '.$selectedstring.' >'.$event['EventName'].'</option>';
				}
				$output .= '
					<tr>
						<td><input type="text" name="sessionname" class="form-admin-input" value="'.$row['SessionName'].'" id="sessionname'.$row['SessionId'].'" required></td>
						<td><select name="eventid" style="padding: 1px;height: 26px;width: 100%;" id="eventid'.$row['SessionId'].'">'.$optionstoshow.'</select></td>
						<td><input type="number" min="0" class="form-admin-input" name="sessioncorrectanswer" value="'.$row['MinCorrectAnswers'].'" id="sessioncorrectanswer'.$row['SessionId'].'" required></td>
						<td><input type="number" min="0" class="form-admin-input" name="sessioncredits" value="'.$row['SessionCredits'].'" id="sessioncredits'.$row['SessionId'].'" required></td>
						<td>'.$datetoshow.'</td>
						<td><a class="btn btn-admin-edit text-white" onclick="addquestion('.$row['SessionId'].')"> Add Question </a></td>
						<td>'.$statustoshow.'</td>
						<td><a class="btn btn-admin-delete text-white" onclick="confirmdelete('.$row['SessionId'].')"> Delete </a></td>
						<td><a class="btn btn-admin-edit text-white" onclick="submitedit('.$row['SessionId'].')"> Edit </a></td>
						<td><a class="btn btn-admin-add text-white" onclick="viewquestions('.$row['SessionId'].')"> View </a></td>
						<form action="editsession.php" method="post" id="sessionform'.$row['SessionId'].'"></form>
					</tr>
					';
			}
		} else {
			$output = '<h3>No presentations found.</h3>';
		}
		echo $output;
	}
?>