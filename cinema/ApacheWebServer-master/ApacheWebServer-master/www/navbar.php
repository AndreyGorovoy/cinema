<html>
<head>
    <meta charset="utf-8">
    <title>Ticketing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Link to Twitter Bootstrap Style sheet -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<!-- Incldue jquery script (used for drop down menus) and javascript for the page stylings -->	
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>

<nav role="navigation" class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
<!--Set the ticketing button to home (index.php) -->
        <a href="index.php" class="navbar-brand">Ticketing</a>
    </div>
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
<!-- Sets the main buttons on the navigation bar on the left hand side and the relevant pages they link to -->
            <li class="active"><a href="index.php">Home</a></li>
			<li><a href="index.php">All Films</a></li>
			<li><a href="databasesearch.php">Film Search</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
<!--Sets the login, logout and signup buttons on the right hand side of the navigation bar -->
		<ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php">Logout</a></li>
		</ul>
       <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php">Sign Up</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Login</a></li>
        </ul>
		</div>
</nav>