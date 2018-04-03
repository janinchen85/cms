<?php
	
class db {
	 // ################ Configurations ######################
		/* Your SQL Database server */
		private $db_host = 'localhost';
		/* Your SQL Database Username */
		private $db_username = 'root';
		/* Your SQL Database Password */
		private $db_pw = '';
		/* Your SQL Database Name */
		private $db_name = 'cms';

		/* You can turn off = 0 or turn on = 1 mysqli error messages */
		private $show_error	= 1;
		// ################ End of Configurations #################

		/* Clearing / reset */
		private $connect = '';
		private $query = '';
		/* Array decletation for mysql queries */
		private $result	= array();
		

	
	public function connect(){
			$this->connect = mysqli_connect($this->db_host, $this->db_username, $this->db_pw);
			if (!$this->connect) $this->error("Connection failed<br>");
			if ($this->db_name != '') $this->select_db($this->db_name);
	}
	
	public function select_db($db_name = '') {
			if ($db_name != '') $this->db_name = $db_name;
			if (!mysqli_select_db($this->connect, $this->db_name)) $this->error("Cannot find database ".$this->db_name ."<br>");
	}
	
	function close(){
			$this->connect = mysqli_close($this->connect);
	}
	
	
	function geterrdesc() {
		$this->error = mysqli_error();
		return $this->error;
	}
	
	function geterrno() {
		$this->errno = mysqli_errno();
		return $this->errno;
	}
	
	function error($errormsg) {
		$this->errdesc = mysqli_error();
		$this->errno = mysqli_errno();
		
		$errormsg .= "<b>mysqli error:</b> $this->errdesc\n<br>";
		$errormsg .= "<b>mysqli error number:</b> $this->errno\n<br>";
		
		if ($this->show_error) $errormsg = "$errormsg";
		else $errormsg = "\n<!-- $errormsg -->\n";
		die("</table><font face=\"Verdana\" size=2><b>SQL-DATABASE ERROR</b><br><br>".$errormsg."</font><br>");
	}
	
	function query($sql, $show_error = 1){
		$this->query = mysqli_query($this->connect, $sql);
		if ($show_error == 1 && !$this->query) $this->error("Invalid SQL: ".$sql ."<br>");
		return $this->query;
	}
	
	function fetch_array($sql) {
		$this->result = mysqli_fetch_array($this->query);
		return $this->result;
	}
	
}
?>