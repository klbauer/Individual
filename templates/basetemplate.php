<?php
abstract class BaseTemplate {

    protected function get_footer() {
        return "<footer><br/>
            Contents © 2015 Garage Sales USA
        </footer>
	</div>
</body>
</html>";
    }

    protected function get_header($title) {
        $user = 'klbauer/cis355/Individual/main';

        if (!isset($_SESSION['persons_id'])) {
            return "<!DOCTYPE html>
<html>
<head>
	<title>GarageSalesUSA</title>
	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <link rel='stylesheet' type='text/css' href='https://bootswatch.com/slate/bootstrap.min.css'>
</head>
<body>
	<nav class='navbar navbar-default'>
	  <div class='container-fluid'>
	    <div class='navbar-header'>
	      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target=''#bs-example-navbar-collapse-2'>
        <span class='sr-only'>Toggle navigation</span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	      </button>
	      <a class='navbar-brand' href='/~$user/lessons/index.php'>Garage Sales USA</a>
	    </div>

	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-2'>
	      <ul class='nav navbar-nav navbar-right'>
	        <li><a href='/~$user/login.php'>Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class='container'>";
        }
        else {
            return "<!DOCTYPE html>
<html>
<head>
	<title>GarageSalesUSA</title>
	<meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <link rel='stylesheet' type='text/css' href='https://bootswatch.com/slate/bootstrap.min.css'>
</head>
<body>
	<nav class='navbar navbar-default'>
	  <div class='container-fluid'>
	    <div class='navbar-header'>
	      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target=''#bs-example-navbar-collapse-2'>
        <span class='sr-only'>Toggle navigation</span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	        <span class='icon-bar'></span>
	      </button>
	      <a class='navbar-brand' href='/~$user/lessons/index.php'>Garage Sales USA</a>
	    </div>

	    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-2'>
	      <ul class='nav navbar-nav navbar-right'>
	        <li><a href='/~$user/logout.php'>Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class='container'>";
        }
    }

    public abstract function get_final_page();
}