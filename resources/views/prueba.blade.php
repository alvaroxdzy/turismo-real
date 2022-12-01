<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({beforeShowDay: noMondays});

  } );
  </script>

<script type="text/javascript">
    function noMondays(date){
      if (date.getDay() === 1)  /* Monday */
            return [ false, "closed", "Closed on Monday" ]
      else
            return [ true, "", "" ]
}
</script>

</head>

<body>
 
<p>Date: <input type="text" id="datepicker"></p>
 
 
</body>
</html>