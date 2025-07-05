<style>
		.panel-body .btn:not(.btn-block) { width:230px;margin-bottom:10px;height: 90px;margin-left: 20px;font-size: 18px; }
	</style>		
	<footer>
		<!--<p>&copy; copyright 2021 TAXIVALA</p>-->
	</footer>
	<div class="overlay" id="overlay">
		<div id="loading-img"></div>
	</div>
<style type="text/css">
#loading-img {
	background: url(img/loading.gif) center center no-repeat;
	height: 100%;
	z-index: 20;
}
.overlay {
	background: #e9e9e9;  
	display: none;        
	position: fixed;   
	top: 0;               
	right: 0;         
	bottom: 0;
	left: 0;
	opacity: 0.7;
	height: 100vh;
	
}
</style>
<script type="text/javascript">
function convertToTimestamp(sel_date){
	//date should be Y-M-D
	var newdate = sel_date.replace("-", "/");
	return new Date(newdate).getTime();
}
</script>
<!-- Common CSS and JS ---->
<script src="<?php echo $base_url ?>/assets/js/chosen.jquery.min.js"></script>
<link href="<?php echo $base_url ?>/assets/css/chosen.min.css" rel="stylesheet" media="screen">

<script src="<?php echo $base_url ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url ?>/assets/js/scripts.js"></script>    </body>
</html>