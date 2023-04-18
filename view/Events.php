<?php
require_once "../functions/stadium_fxn.php";
?>
<!Doctype HTML>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="css/style.css" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>


	<body>
		
		<div id="mySidenav" class="sidenav">
		<p class="logo"><span>A</span>strix</p>
	
	 
		<a href="Events.php"class="icon-a"><i class="fa fa-calendar icons"></i> Events</a>
		<a href="Revenue.php"class="icon-a"><i class="fa fa-money icons"></i>  Revenue</a>
		<a href="Ticket.php"class="icon-a"><i class="fa fa-ticket icons"></i>  Tickets</a>	  
		<a href="Stadium.php"class="icon-a"><i class="fa fa-building icons"></i> Stadiums</a>
	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav"  >☰  Events</span>
	<span style="font-size:30px;cursor:pointer; color: white;" class="nav2"  >☰  Events</span>
	</div>
		
		<div class="col-div-6">
		<div class="profile">

			
			<p>Manoj Adhikari <span>UI / UX DESIGNER</span></p>
		</div>
	</div>
		<div class="clearfix"></div>
	</div>

		<div class="clearfix"></div>
		<br/>
		
		<div class="col-div-3">
			<div class="box">
				<p>67<br/><span>Stadiums</span></p>
				<i class="fa fa-users box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>88<br/><span>Events</span></p>
				<i class="fa fa-list box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>99<br/><span>Total Revenue</span></p>
				<i class="fa fa-shopping-bag box-icon"></i>
			</div>
		</div>
		<div class="col-div-3">
			<div class="box">
				<p>78<br/><span>Tickets</span></p>
				<i class="fa fa-tasks box-icon"></i>
			</div>
		</div>
		<div class="clearfix"></div>
		<br/><br/>
		<div class="col-div-8">
			<div class="box-8">
			<div class="content-box">
				<p>Event<input type="text" name="search" style="margin-left: 500px;"><button style="color: #f7403b;">Search</button></p>
				<br/>
				<table>
	  <tr>
        <th>Event</th>
	    <th>Stadium</th>
        <th>Price</th>
	    <th></th>
	  </tr>
	  <!-- <tr>
	    <td>Ghana Premier League</td>        
	    <td>Baba Yara Stadium</td>
		<td>50</td>
		<td><a href="payment.php?ticket_id=">Purchase</button></td>
	  </tr> -->
	<?php  event_list(); ?>
	  
	  
	</table>
			</div>
		</div>
		</div>

		<div class="col-div-4">
			<div class="box-4">
			<div class="content-box">
				<p>Total Sale <span>Sell All</span></p>

				<div class="circle-wrap">
	    <div class="circle">
	      <div class="mask full">
	        <div class="fill"></div>
	      </div>
	      <div class="mask half">
	        <div class="fill"></div>
	      </div>
	      <div class="inside-circle"> 70% </div>
	    </div>
	  </div>
			</div>
		</div>
		</div>
			
		<div class="clearfix"></div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>

	  $(".nav").click(function(){
	    $("#mySidenav").css('width','70px');
	    $("#main").css('margin-left','70px');
	    $(".logo").css('visibility', 'hidden');
	    $(".logo span").css('visibility', 'visible');
	     $(".logo span").css('margin-left', '-10px');
	     $(".icon-a").css('visibility', 'hidden');
	     $(".icons").css('visibility', 'visible');
	     $(".icons").css('margin-left', '-8px');
	      $(".nav").css('display','none');
	      $(".nav2").css('display','block');
	  });

	$(".nav2").click(function(){
	    $("#mySidenav").css('width','300px');
	    $("#main").css('margin-left','300px');
	    $(".logo").css('visibility', 'visible');
	     $(".icon-a").css('visibility', 'visible');
	     $(".icons").css('visibility', 'visible');
	     $(".nav").css('display','block');
	      $(".nav2").css('display','none');
	 });

	</script>

	</body>


	</html>