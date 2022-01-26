<?php

	
class Service{
	public $dbh;
	public $dbhdirectory;
	public function connect(){
		date_default_timezone_set('Europe/London'); 
		// $this->dbh=new PDO('mysql:host=localhost;dbname=Edokio;charset=utf8','root','');
		$this->dbh=new PDO('mysql:host=213.171.200.100;dbname=Edokio;charset=utf8','EdokioUser','PagesUser@123');
		
	}
	//disconnect from database
	public function disconnect(){
		$this->dbh=null;
		$this->dbhdirectory=null;
	}
	function GetDirection($SessionId){
		$this->connect();
	   $sql = "SELECT * FROM session WHERE SessionId = :SessionId";
	   $insertstmt = $this->dbh->prepare($sql);
	   $insertstmt->bindParam(":SessionId",$SessionId);
	   
	   $insertstmt->execute();
	   $GetDirection= $insertstmt->fetchAll();
	   $this->disconnect();
	   return  $GetDirection;
	   
   }
	
	 function GetUserModulesAcess($AdminId){
         $this->connect();
	    $sql = "SELECT * FROM AdminModules WHERE AdminId = :AdminId";
		$insertstmt = $this->dbh->prepare($sql);
		$insertstmt->bindParam(":AdminId",$AdminId);
		
		$insertstmt->execute();
		$GetUserModulesAcess= $insertstmt->fetchAll();
		$this->disconnect();
        return  $GetUserModulesAcess;
		
	}
	  function CheckUserExists($CoachName,$Phone){
         $this->connect();
	    $sql = "SELECT * FROM tblusers WHERE password = :password AND admin =:admin";
		$insertstmt = $this->dbh->prepare($sql);
		$insertstmt->bindParam(":admin",$CoachName);
		$insertstmt->bindParam(":password",$Phone);
		$insertstmt->execute();
		$CheckUserExists= $insertstmt->fetchAll();
		$this->disconnect();
        return $CheckUserExists;
	}
		  function GetPieData(){
         $this->connect();
	    $sql = "SELECT S.SessionName, COUNT(*) FROM session S JOIN examgrades E ON E.sessionid = S.SessionId GROUP BY S.SessionName";
		$insertstmt = $this->dbh->prepare($sql);
		
		$insertstmt->execute();
		$Pie= $insertstmt->fetchAll();
		$this->disconnect();
        return $Pie;
	}
	
	
	  function getQuizDetails($examsessionid){
         $this->connect();
	    $sql = "SELECT * FROM questiontbl WHERE SessionId = :SessionId";
		$insertstmt = $this->dbh->prepare($sql);
		$insertstmt->bindParam(":SessionId",$examsessionid);
		
		$insertstmt->execute();
		$CheckUserExists= $insertstmt->fetchAll();
		$this->disconnect();
        return $CheckUserExists;
	


			}

	function InsertNewUsers($FullName,$Phone,$CoachName,$activated){
		$activated="1";
	$insertsql = "INSERT INTO tblusers (email, password, admin,activated) VALUES('".$FullName."','".$Phone."','".$CoachName."','".$activated."')";
			
			$insertstmt = $this->dbh->prepare($insertsql);
			$insertstmt->bindParam(":activated",$activated);
			$insertstmt->bindParam(":admin",$CoachName);
			$insertstmt->bindParam(":email",$FullName);
			$insertstmt->bindParam(":password",$Phone);
		
			$insertstmt->execute();
		}





	function GetAdmins(){
        $this->connect();
	    $sql = "SELECT * FROM Admins ";
		$stm = $this->dbh->prepare($sql);
	
		$stm->execute();
		$count = $stm->rowCount();
	
		$count= $stm->fetchAll();
		$this->disconnect();
        return  $count;

	
	}
	
	function GetAllJobs(){
        $this->connect();
	    $sql = "SELECT * FROM Jobs ORDER BY JobDate DESC";
		$stm = $this->dbh->prepare($sql);
	
		$stm->execute();
		
	
		$count= $stm->fetchAll();
		$this->disconnect();
        return  $count;

	
	}
	

	
	function GetUserName($id){
        $this->connect();
	    $sql = "SELECT * FROM tblusers WHERE  id = :id ";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":id",$id);
	
		$stm->execute();
		$count = $stm->rowCount();
	
		$count= $stm->fetchAll();
		$this->disconnect();
        return  $count;

	
	}

	
	
	




	function CheckDOBandIdNum($dateofbirth, $userid){
        $this->connect();
	    $sql = "SELECT * FROM tblusers WHERE userid = :userid AND dateofbirth =:dateofbirth";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":userid",$userid);
		$stm->bindParam(":dateofbirth",$dateofbirth);
		$stm->execute();
		$count = $stm->rowCount();
	
		$count= $stm->fetchAll();
		$this->disconnect();
        return  $count;

	
	}

function CheckDOBandId($dateofbirth, $userid){
         $this->connect();
	    $sql = "SELECT * FROM tblusers WHERE userid = :userid AND dateofbirth =:dateofbirth";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":userid",$userid);
		$stm->bindParam(":dateofbirth",$dateofbirth);
		$stm->execute();
		$Activity= $stm->fetchAll();
		$this->disconnect();
        return $Activity;
	


			}





	// EXAM FUNCTIONS START
	public function getAllEvents(){
		$this->connect();
		$sql = "SELECT event.* FROM event INNER JOIN session ON event.EventId=session.EventId AND session.SessionStatus = 1 INNER JOIN questiontbl ON session.SessionId=questiontbl.SessionId WHERE event.EventStatus = 1 GROUP BY event.EventId ORDER BY event.EventOrder DESC;";
		$stm = $this->dbh->prepare($sql);
		$stm->execute();
		$events = $stm->fetchAll();
		$this->disconnect();
		return $events;
	}

	public function getSessions($eventid){
		$this->connect();
		$sql = "SELECT session.* FROM session INNER JOIN questiontbl ON session.SessionId=questiontbl.SessionId WHERE EventId = :eid AND SessionStatus = 1 GROUP BY session.SessionId;";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":eid",$eventid);
		$stm->execute();
		$sessionsdetails = $stm->fetchAll();
		$this->disconnect();
		return $sessionsdetails;
	}

	public function getAllQuestions($sessionid){
		$this->connect();
		$sql = "SELECT questiontbl.*, session.* FROM questiontbl INNER JOIN session ON questiontbl.SessionId=session.SessionId AND session.SessionStatus = 1 INNER JOIN event ON session.EventId=event.EventId AND event.EventStatus = 1 WHERE questiontbl.SessionId=:sid ORDER BY questiontbl.qid";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":sid",$sessionid);
		$stm->execute();
		$questions = $stm->fetchAll();
		$this->disconnect();
		return $questions;
	}

	public function SessionsInEvent($userid,$eventid) {
		$this->connect();
		$allsessions = $this->getSessions($eventid);
		$status = false;
		foreach ($allsessions as $sessiondetails) {
			if (!$this->ExamTaken($userid,$sessiondetails['SessionId'])) {
				$status = true;
			}
		}
		return $status;
		// $stm = $this->dbh->prepare($sql);
		// $stm->bindParam(":qid",$questionid);
		// $stm->execute();
		// $questiondetails = $stm->fetch();
		// $this->disconnect();
		// return $questiondetails;
	}

	public function getSessionDetails($sessionid){
		$this->connect();
		$sql = "SELECT session.* FROM session INNER JOIN questiontbl ON session.SessionId=questiontbl.SessionId WHERE session.SessionId = :sid AND session.SessionStatus = 1 GROUP BY session.SessionId;";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":sid",$sessionid);
		$stm->execute();
		$sessiondetails = $stm->fetch();
		$this->disconnect();
		return $sessiondetails;
	}

	public function ExamTaken($userid, $sessionid){
		$this->connect();
		$sql = "SELECT * FROM examgrades WHERE userid = :uid AND sessionid = :sid AND examstatus = 'P';";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":uid",$userid);
		$stm->bindParam(":sid",$sessionid);
		$stm->execute();
		$sessiondetails = $stm->fetch();
		$this->disconnect();
		if (empty($sessiondetails)) {
			return false;
		} else {
			return true;
		}
	}

	public function getQuestionDetails($questionid){
		$this->connect();
		$sql = "SELECT questiontbl.* FROM questiontbl INNER JOIN session ON questiontbl.SessionId=session.SessionId AND session.SessionStatus = 1 INNER JOIN event ON session.EventId=event.EventId AND event.EventStatus = 1 WHERE questiontbl.qid=:qid ORDER BY questiontbl.qid";
		$stm = $this->dbh->prepare($sql);
		$stm->bindParam(":qid",$questionid);
		$stm->execute();
		$questiondetails = $stm->fetch();
		$this->disconnect();
		return $questiondetails;
	}

	public function AssignGrade($userid,$sessionid,$credits,$correctanswers,$examstatus,$UserGrades,$admin){
		$this->connect();
		$checksql = "SELECT * FROM examgrades WHERE id=:id AND sessionid=:sid;";
		$checkstmt = $this->dbh->prepare($checksql);
		$checkstmt->bindParam("id",$userid);
		$checkstmt->bindParam(":sid",$sessionid);
		$checkstmt->execute();
		$gradedetails = $checkstmt->fetch();
		if (empty($gradedetails)) {
			$insertsql = "INSERT INTO examgrades (id, sessionid, credits, correctanswers, examstatus,UserGrades,admin) VALUES(:id,:sid,:credits,:crctanswers,:examstatus,:UserGrades,:admin)";
			// $insertsql = "SELECT questiontbl.* FROM questiontbl INNER JOIN session ON questiontbl.SessionId=session.SessionId AND session.SessionStatus = 1 INNER JOIN event ON session.EventId=event.EventId AND event.EventStatus = 1 WHERE questiontbl.qid=:qid ORDER BY questiontbl.qid";
			$insertstmt = $this->dbh->prepare($insertsql);
			$insertstmt->bindParam(":id",$userid);
			$insertstmt->bindParam(":sid",$sessionid);
			$insertstmt->bindParam(":admin",$admin);

			$insertstmt->bindParam(":credits",$credits);
			$insertstmt->bindParam(":crctanswers",$correctanswers);
			$insertstmt->bindParam(":examstatus",$examstatus);
			$insertstmt->bindParam(":UserGrades",$UserGrades);
			$insertstmt->execute();
		} else{
			$currentdate = date('Y-m-d H:i:s');
			$updatesql = "UPDATE examgrades SET credits = :credits, correctanswers = :crctanswers,admin=:admin, examstatus = :examstatus, examdate = :examdate,UserGrades=:UserGrades WHERE gradeid = :gid ";
			$updatestmt = $this->dbh->prepare($updatesql);
			$updatestmt->bindParam(":credits",$credits);
			$updatestmt->bindParam(":crctanswers",$correctanswers);
			$updatestmt->bindParam(":examstatus",$examstatus);
			$updatestmt->bindParam(":UserGrades",$UserGrades);
				$updatestmt->bindParam(":admin",$admin);
			$updatestmt->bindParam(":examdate",$currentdate);
			$updatestmt->bindParam(":gid",$gradedetails['gradeid']);
			$updatestmt->execute();
		}
		$this->disconnect();
	}
	// EXAM FUNCTIONS END
}//end class
?>





