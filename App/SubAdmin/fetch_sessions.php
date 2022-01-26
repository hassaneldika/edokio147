<?php
	include('connect.php');
	$conx=new Service();
	$conx->connect();
	session_start();
					//var_dump($_SESSION);
	if(isset($_POST["action"])) {
		$query = $conx->dbh->prepare("SELECT * FROM session INNER JOIN AdminModules ON session.EventId=AdminModules.ModuleId Where AdminId=:AdminId");
		
		$query->bindParam(":AdminId",$_SESSION['userid']);

		$query->execute();
		$result = $query->fetchAll();
		$output = '';

		$eventstmt = $conx->dbh->prepare("SELECT * FROM session INNER JOIN AdminModules ON session.EventId=AdminModules.ModuleId Where AdminId=:AdminId");
		$eventstmt->bindParam(":AdminId",$_SESSION["userid"]);
		$eventstmt->execute();
		$allevents = $eventstmt->fetchAll();
        //var_dump($allevents);
        //var_dump($_SESSION);
       // var_dump($_POST);
		if(!empty($result))	{
			foreach($result as $row){
				$datetoshow = substr($row['SessionDate'],0,10);
				//$status=$row['SessionStatus'];
				$statustoshow='';
				// if ($status=='0') {
				// 	$statustoshow='<a class="btn bg-danger full-width text-white" onclick="confirmactivate('.$row['SessionId'].')"> Activate </a>';
				// } else {
				// 	$statustoshow='<a class="btn bg-success full-width text-white" onclick="confirmdeactivate('.$row['SessionId'].')"> Deactivate </a>';
				// }
				$optionstoshow = '';
				foreach ($allevents as $event) {
					$selectedstring='';
					if ($row['ModuleId'] == $event['ModuleId']) {$selectedstring=' selected';}
					$optionstoshow .='<option value="'.$event['ModuleId'].'" '.$selectedstring.' >'.$event['AdminModulesName'].'</option>';
				}
				$output .= '
					<tr>
						<td><input type="text" name="sessionname" class="form-admin-input" value="'.$row['SessionName'].'" id="sessionname'.$row['SessionId'].'" required></td>
						<td><select name="eventid" style="padding: 1px;height: 26px;width: 100%;" id="eventid'.$row['SessionId'].'">'.$optionstoshow.'</select></td>
						<td><input type="number" min="0" class="form-admin-input" name="sessioncorrectanswer" value="'.$row['MinCorrectAnswers'].'" id="sessioncorrectanswer'.$row['SessionId'].'" required></td>
						<td><input type="number" min="0" class="form-admin-input" name="sessioncredits" value="'.$row['SessionCredits'].'" id="sessioncredits'.$row['SessionId'].'" required></td>
						<td>'.$datetoshow.'</td>
						
					</tr>
					';
			}
		} else {
			$output = '<h3>No presentations found.</h3>';
		}
		echo $output;
	}
?>