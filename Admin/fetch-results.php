<?php
	include('connect.php');
	$conx = new Service;
	$conx->connect();
	$stmt = $conx->dbh->prepare("SELECT * FROM examgrades INNER JOIN tblusers ON examgrades.id = tblusers.id INNER JOIN session ON examgrades.sessionid = session.SessionId ORDER BY examgrades.examdate");

	$column = array('email', 'id','SessionName','credits','correctanswers','examstatus','examdate');

	// $query = "SELECT * FROM shoppingcart  ";
	$query = 'SELECT * FROM examgrades INNER JOIN tblusers ON examgrades.id = tblusers.id INNER JOIN session ON examgrades.sessionid = session.SessionId ';

	if(isset($_POST['search']['value'])) {
		$query .= '
			WHERE tblusers.email LIKE "%'.$_POST['search']['value'].'%"
			OR examgrades.id LIKE "%'.$_POST['search']['value'].'%"
			OR session.SessionName LIKE "%'.$_POST['search']['value'].'%"
			OR examgrades.examdate LIKE "%'.$_POST['search']['value'].'%"
		';
	}

	if(isset($_POST['order'])) {
		$query .= ' ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	} else {
		$query .= ' ORDER BY examgrades.gradeid DESC ';
	}

	$query1 = '';

	if($_POST['length'] != -1) {
		$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
	}

	$ProductPricement = $conx->dbh->prepare($query);

	$ProductPricement->execute();

	$number_filter_row = $ProductPricement->rowCount();

	$ProductPricement = $conx->dbh->prepare($query . $query1);

	$ProductPricement->execute();

	$result = $ProductPricement->fetchAll();

	$data = array();

	foreach($result as $row) {
		$countstmt = $conx->dbh->prepare("SELECT COUNT(SessionId) AS qstcount FROM questiontbl WHERE SessionId = ".$row['SessionId'].";");
		$countstmt->execute();
		$qstcount = $countstmt->fetch();
		$sub_array = array();
		$sub_array[] = $row['email'];
		$sub_array[] = $row['id'];
		$sub_array[] = $row['SessionName'];
		$sub_array[] = $row['credits'];
		$sub_array[] = $row['correctanswers']." out of ".$qstcount['qstcount'];
		$sub_array[] = $row['examstatus'];
		$sub_array[] = $row['examdate'];
		$data[] = $sub_array;
	}

	function count_all_data($conx) {
		$query = "SELECT * FROM examgrades";
		$ProductPricement = $conx->dbh->prepare($query);
		$ProductPricement->execute();
		return $ProductPricement->rowCount();
	}

	$output = array(
		'draw'				=> intval($_POST['draw']),
		'recordsTotal'		=> count_all_data($conx),
		'recordsFiltered'	=> $number_filter_row,
		'data'				=> $data
	);

	echo json_encode($output);
?>