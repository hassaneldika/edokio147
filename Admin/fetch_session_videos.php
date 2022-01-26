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
						<td colspan="2">'.$row['SessionName'].'</td>
						<td colspan="1"><input type="text" name="videoname" class="form-admin-input" value="'.$row['videoname'].'" id="videoname'.$row['SessionId'].'" required></td>
						<td colspan="2"><input type="text" name="youtube" class="form-admin-input" value="'.$row['youtube'].'" id="youtube'.$row['SessionId'].'" required></td>
						<td colspan="2" ><textarea id="VideoText'.$row['SessionId'].'"  class="form-admin-input" style="width: 100%;">"'.$row['VideoText'].'"</textarea>
						</td>

						<input type="text" value="'.$row['VideoText'].'"  name="VideoText" id="VideoText'.$row['SessionId'].'" >
						<td colspan="" >
						<input type="text" value="'.$row['direction'].'"  name="direction" id="direction'.$row['SessionId'].'" >
						</td>
						<td colspan="2" >
						<input type="text" value="'.$row['PDF'].'"  name="direction" id="direction'.$row['SessionId'].'" >
						</td>
						<td>
						<a class="btn btn-admin-delete text-white" onclick="confirmdelete('.$row['SessionId'].')"> Remove Video</a>
						</td>
						<td><a class="btn btn-admin-edit text-white" onclick="submitedit('.$row['SessionId'].')"> Edit </a></td>
						<td><a class="btn btn-admin-add text-white" onclick="viewquestions('.$row['SessionId'].')"> View </a></td>
						<form action="editsession.php" method="post" id="sessionform'.$row['SessionId'].'">
						/form>
					</tr>';
			}
		} else {
			$output = '<h3>No presentations found.</h3>';
		}
		echo $output;
	}
?>