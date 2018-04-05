<?php
function Conectar(){
    define('host','localhost');
    define('user','root');
    define('password','');
    define('bdname','agendamascotas');
	
	//conexion heroku
	// $cleardbUrl = parse_url(getenv("CLEARDB_DATABASE_URL"));
	// define('host',$cleardbUrl["host"]);
    // define('user',$cleardbUrl["user"]);
    // define('password',$cleardbUrl["pass"]);
    // define('bdname',substr($cleardbUrl["path"],1));
    
    $conexion = mysqli_connect(host, user, password, bdname)
     or die ("no sep udo conectar a la BD");
     return $conexion;
    
}
