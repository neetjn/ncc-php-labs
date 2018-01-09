<?php

  $data = (object) $_POST;
    // # dump post data into local variable

  $error = false;
    // # instantiate error in false state
  function setError($message) {
    global $error;
    $error = (object) array(
      'message' => $message
    );
  };

    function __isDim($dim) {
      return ( is_numeric( $dim ) & ( $dim > 0 ) & ctype_digit( $dim ) );
    }; // # reusable routine to validate dimension

    if( !empty( $_POST ) ):
      if( !isset( $data->length ) || !isset( $data->width ) ):
        setError('Dimension Must Be Specified');
      else:
        if( !__isDim( $data->length ) || !__isDim( $data->width ) ):
          setError('Dimensions Must Be Numeric');
        else:
          if( ctype_digit( $data->operation ) && ( (int) $data->operation >= 1 || (int) $data->operation <= 3 ) ):
            $table = array( );
              // # allocate table
            for($i = 1; $i <= $data->length; $i++) {
              $table[] = array();
                // # push new array
                  // # index of $i-1
              for($j = 1; $j <= $data->width; $j++) {
                switch( (int) $data->operation ):
                  case 1:
                    $table[$i-1][] = $i*$j;
                    break;
                  case 2:
                    $table[$i-1][] = $i+$j;
                    break;
                  case 3:
                    $table[$i-1][] = pow( $i, $j );
                    break;
                endswitch;
              } // # 1-width
            } // # 1-length
          else:
            setError('Invalid Operation Specified');
          endif;
        endif;
      endif;
    endif;

?>
<!doctype html>
<html>
  <head>
    <title>Final Project</title>
    <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href="http://www.justinaguilar.com/animations/css/animations.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/paper/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='Project1.css' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="alert alert-dismissible alert-info text-center">
          <i class="ico ico-left fa fa-code"></i><strong>Project by John Nolette</strong> Designed using Open Source Frameworks
        </div>
        <?php if( isset( $data ) && $error ): ?>
          <div class="alert alert-dismissible alert-danger text-center slideDown">
            <i class="ico ico-left fa fa-bullhorn"></i><strong>Error Encountered</strong> "<?php echo $error->message; ?>"
          </div>
        <?php endif; ?>
        <div class="jumbotron">
          <?php if( !isset( $table ) ): ?>
          <h3 class="text-center">
            <i class="ico ico-left fa fa-flag" style="color:red;"></i> Table Cannot Be Constructed Without Input
          </h3>
          <div class="span7 text-center">
            <a href="Project1.htm" class="btn btn-large btn-danger">Input Data</a>
          </div>
          <?php else: ?>
          <?php if( (int) $data->header === 1 ? true : false ):?>
          <!-- show header if specified in input -->
          <h1 class="text-center fadeIn">
            <i class="ico ico-left fa fa-calculator"></i> Results
          </h1>
          <hr />
          <?php endif; ?>
          <pre class="hidden">
            <?php print_r($table); ?>
          </pre>
          <table class="table table-striped table-hover" style="font-size: <?php echo $data->size; ?>px;">
            <thead>
              <tr>
                <th>
                  <i class="fa fa-cube"></i>
                </th>
                <!-- create a table header from 1-length -->
                <?php for($i = 1; $i <= $data->length; $i++): ?>
                <th><?php echo $i; ?></th>
                <?php endfor; ?>
              </tr>
            </thead>
            <tbody>
              <?php for($i = 1; $i <= $data->width; $i++): ?>
              <!-- create a table row from 1-width -->
              <tr>
                <th><?php echo $i; ?></th>
                <?php foreach( $table as $t ): ?>
                  <!-- output length x width -->
                  <td><?php echo $t[$i-1]; ?></td>
                <?php endforeach; ?>
              </tr>
              <?php endfor; ?>
            </tbody>
          </table>
          <hr />
          <div class="span7 text-center">
            <a href="Project1.htm" class="btn btn-large btn-primary">
              Reset Parameters
            </a>
          </div>
          <?php endif; ?>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
