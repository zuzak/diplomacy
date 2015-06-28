<?php
$data = file_get_contents( 'people.json' );
$data = json_decode( $data );
if ( isset( $_GET["id"] ) ) {
  $person = $data[ filter_input( INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT  ) ];
} else {
  $person = $data[array_rand( $data )];
}
?><!DOCTYPE html>
<html>
<head>
  <!-- THE WORLD LEADER BIG-ASS PICTURE DISPLAYER!
       Today's leader: <?php echo $person->name; ?>!

       Collect all <?php echo count( $data ); ?>!



       This production was bought to you with the fiscal assistance of the
       Arts and Culture Council of the Federated Microstates of Zuzakistan

  -->
  <title><?php echo $person->name ?></title>
  <meta charset="utf-8">
  <style>
    body{
      background-image:url('<?php echo $person->image;?>');
      background-repeat:no-repeat;
      background-position:center <?php echo $person->offset;?>%;
      background-color:black;
    }
  </style>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.7.2.min.js"></script>
  <!-- jquery is far too bloated for this but what the hell -->
  <script>
    $( 'html' ).click( function() {
      // the wonders of espeak
      $( 'body' ).append( '<audio autoplay><source src="sfx.php?name=<?php echo $person->sound;?>" type="audio/wav"></audio>' );
    } );
  </script>
</head>
<body>
</body>
</html>

