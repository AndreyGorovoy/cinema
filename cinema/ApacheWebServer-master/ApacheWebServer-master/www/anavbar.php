<html>
<head>
    <meta charset="utf-8">
    <title>Ticketing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<!-- Incldue jquery script (used for drop down menus) and javascript (used for the page stylings) locations -->	
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
<!--Set the ticketing button to administrator homepage allfilms.php) -->
        <a href="allfilms.php" class="navbar-brand">Ticketing</a>
    </div>
    <div id="navbarCollapse" class="collapse navbar-collapse">
<!-- Sets the main buttons on the navigation bar on the left hand side and the relevant pages they link to -->
        <ul class="nav navbar-nav">
            <li class="active"><a href="admin.php">Home</a></li>
			<li><a href="allfilms.php">All Films</a></li>
			<li><a href="filmadd.php">Add a Film</a></li>
			<li><a href="asignup.php">Add User</a></li>
			<li><a href="edituser.php">Edit Users</a></li>
            <li><a href="screening.php">Add Screening</a></li>
			<li><a href="venue.php">Add a Venue</a></li>
        </ul>
		<ul class="nav navbar-nav navbar-right">
<!-- Sets the link to the logout page on the right hand side of the navbar -->		
			<li><a href="logout.php">Logout</a></li>
		</ul>
</nav>