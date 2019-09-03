<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel='stylesheet' href='assets/vendor/full-calendar/css/fullcalendar.css' />
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <title>Lakbay Bikol | Admin</title>
</head>

<?php
include_once("../includes/db2.php");
if(isset($_GET['filt']))
{
	$filter = $_GET['filt'];  
	$query = mysqli_query($conn,"SELECT * FROM tbl_events where province_id='".$filter."'");	
}
else
{
	$query = mysqli_query($conn,"SELECT * FROM tbl_events");
}

$data  = array(); 
$resp  = array();
$i     = 0;
$row   = mysqli_num_rows($query);



if($row > 0){
    while($data['events'] = mysqli_fetch_assoc($query))
    {
        $i++;
        //Geting event days

                $start = $data['events']['event_start_date'];//die;
                $end = $data['events']['event_end_date'];
                // $diff = abs($end - $start); // that's it!
            
                // $days = floor($diff/(60*60*24));
                // $days = $days+1;
                // Defining colors to events
                if($data['events']['event_category'] == "Festival"){
                        $color='#1e31ce';
                }
                elseif($data['events']['event_category'] == "Cultural/Historical Tourism"){
                        $color='#ff1682';
                }
                // }elseif($days > 1 and $days <= 15){
                //         $color='#8FBC8F';
                // }elseif($days > 15 and $days <= 30){
                //         $color='#C0C0C0';
                // }elseif($days > 30 and $days <= 60){
                //         $color='#90EE90';
                // }else{
                //         $color='#F4A460';
                // }
                //Creating event short name with ...
                // var_dump($data['events']['event_name']);
                if(!empty($data['events']['event_name'])){
                        
                                // $start = start));
                                $event_short_name = substr($data['events']['event_name'] , 0, 15);
                              
                    
                                $startDate = strtotime($start);
                                //Colecting data in array         
                                $resp[$start . '_' . $data['events']['id'] . '_' . $i] = array(
                                        'id'    => $data['events']['id'],
                                        'title' => $event_short_name,
                                        'start' => $start,
                                        'url'   => 'event_view_item.php?item='.$data['events']['id'],
                                        'end'   => $end,
                                        'color' => $color,
                                );
                        }
                }            
            
    }
    $resp = array_values($resp);
    // var_dump($resp);

?>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                                		<div class="input-group">
                                                <select id="selectpicker" name="filt">
                                                	<option disabled selected value> --Filter by Province-- </option>
			                                    	<option value="1">Albay</option>
			                                        <option value="5">Masbate</option>
			                                        <option value="6">Sorsogon</option>
			                                        <option value="4">Catanduanes</option>
			                                        <option value="3">Camarines Sur</option>
			                                        <option value="2">Camarines Norte</option> -->
			                                    </select>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary">Go!</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            
                                <div id="calendar"></div>
								
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end content -->
            
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1  -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>

	<script src='assets/vendor/full-calendar/js/moment.min.js'></script>
	<script src='assets/vendor/full-calendar/js/fullcalendar.js'></script>
	<script>
								$(function() {

								  // page is now ready, initialize the calendar...

								  $('#calendar').fullCalendar({
								     editable: false,
								     events: <?php echo json_encode($resp) ?>,
								      eventLimit: 4 ,
								    // put your options and callbacks here
								  })

								});
								</script>
</body>
 
</html>