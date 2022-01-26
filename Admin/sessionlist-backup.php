<?php foreach ($result as $rows) { ?>
	<form action="editsession.php" method="post">
		<tr>
			<input type="hidden" name="sessionid" value="<?php echo $rows['SessionId']; ?>">
			<td><input type="text" name="sessionname" class="form-admin-input" value="<?php echo $rows['SessionName'];?>" required></td>
			<td>
				<select name="eventid" style="padding: 1px;height: 26px;width: 100%;">
					<?php foreach ($allevents as $event): ?>
						<option value="<?php echo $event['EventId'] ?>" <?php if($rows['EventId'] == $event['EventId']) echo "selected";?>><?php echo $event['EventName'] ?></option>
					<?php endforeach ?>
				</select>
			</td>
			<td><input type="number" class="form-admin-input" name="sessioncorrectanswer" value="<?php echo $rows['MinCorrectAnswers']; ?>" required></td>
			<td><input type="number" class="form-admin-input" name="sessioncredits" value="<?php echo $rows['SessionCredits']; ?>" required></td>
			<td><?php echo substr($rows['SessionDate'],0,10); ?></td>
			<td>
				<a class="btn btn-admin-edit text-white" onclick="addquestion(<?php echo $rows['SessionId']; ?>)"> Add Question </a>													
			</td>
			<td>
				<?php
				$status=$rows['SessionStatus'];
				if($status=='0') { ?>
				<a class="btn bg-danger full-width text-white"> Activate </a>
				<?php } else if($status=='1') { ?>
				<a class="btn bg-success full-width text-white" onclick="confirmdeactivate(<?php echo $rows['SessionId']; ?>)"> Deactivate </a>
				<?php } ?>
			</td>
			<td>
				<a class="btn btn-admin-delete text-white" onclick="confirmdelete(<?php echo $rows['SessionId']; ?>)"> Delete </a>
			</td>
			<td>
				<button class="btn btn-admin-edit text-white" type="submit" name="lEu9pSFrmo"> Edit </button>
			</td>
			<td>
				<a class="btn btn-admin-add text-white" onclick="viewquestions(<?php echo $rows['SessionId']; ?>)"> View </a>
			</td>
		</tr>
	</form>
<?php } ?>