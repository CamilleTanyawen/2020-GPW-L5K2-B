<?php
error_reporting(0);
$pagelevel = 3;
require('db.php');
session_start();
require_once('header.php');
require_once('logincheck.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
       <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    <link href="assets/plugins/full-calendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
    <![endif]-->

</head>



        <!--body wrapper start-->
        <div class="wrapper">
              
              <!--Start Page Title-->
               <div class="page-title-box">
                    <h4 class="page-title">Dynamic Bus </h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="homepage.php">Dashboard</a>
                        </li>
                        
                        <li class="active">
                            Dynamic Bus
                        </li>
                    </ol>
                    <div class="clearfix"></div>
                 </div>
                  <!--End Page Title-->          
           
           
               <!-- Start row-->
                <div class="row">
                    <div class="calendar-layout clearfix">
                      
                   
                <div class="col-md-10 col-md-offset-1">
                    
                          <div class="white-box">
                             <div id='calendar'></div>
                    </div>
                     </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascripts-->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/pace.min.js"></script>
<script src="js/main.js"></script>
            
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/fullcalendar.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#external-events .fc-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });

        function fillZero(value) {
            return String(value).length > 1 ? value : '0' + value;
        }

        function parseTime(value) {
            return value.getFullYear() + '-' + (fillZero(value.getMonth() + 1)) + '-' + fillZero(value.getDate());
        }

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            dragOpacity: .5,
            //外部拖动
            drop: function(date) {
                var startdate;
                if (date._i) {
                    var dateArr   = date._i;
                    var year      = dateArr[0];
                    var month     = fillZero(dateArr[1] + 1);
                    var day       = fillZero(dateArr[2]);
                    var s_hour    = fillZero(dateArr[3]);
                    var s_minute  = fillZero(dateArr[4]);
                    startdate = year + '-' + month + '-' + day;
                } else {
                    startdate     = parseTime(date._d);
                    var s_hour    = '00';
                    var s_minute  = '00';
                }
                $.post('ajax.php?action=add',{ title: $(this).text(), startdate: startdate, s_hour: s_hour, s_minute: s_minute, allday: date._ambigTime }, function(msg) { 
                    if (msg != 1) { 
                        alert(msg); 
                    } else {
                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }
                    } 
                }); 
            },
            //内部拖动 
            eventDrop: function(event, delta, revertFunc) {
                var daydiff  = delta._days;
                var minudiff = delta._milliseconds;
                if (daydiff == 0 && event.allDay) {
                    var time    = event.start._i;
                    var timeArr = time.substr(time.length - 5).split(':');
                    var h       = timeArr[0] * 3600;
                    var m       = timeArr[1] * 60;
                    minudiff    = -(h + m) * 1000;
                }
                $.post('ajax.php?action=drag',{ id: event.id, daydiff: daydiff, minudiff: minudiff, allday: event.allDay }, function(msg) {
                    if (msg != 1) { 
                        alert(msg); 
                        revertFunc(); //恢复原状 
                    } 
                }); 
            },
            events: 'json.php'
        });


    });
</script>




<?php

mysqli_close($connection);

?>