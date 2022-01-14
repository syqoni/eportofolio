<?php

class database{
    
    var $server="localhost";
	var $username="id15532618_root";
	var $password="Sakura2020.21";
	var $db="id15532618_eporto";
	
    public function connect(){
        $mysqli=new mysqli($this->server, $this->username, $this->password);
        if($mysqli->connect_error){
            echo "Gagal koneksi ke Database : (".$msqli->connect_error.")";
        }
        
        return $mysqli;
    }
    
}

?>