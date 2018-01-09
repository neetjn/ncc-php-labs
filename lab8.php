<?php

  extract( $_POST );

  function process_data() {
    global $data;
      // # grab data export from main scope

    if( isset( $data ) ) {

      function to_numeric($arr) {
        $x = array();
        foreach( $arr as $y ) {
          if( !is_numeric( $y ) ):
            return false;
          endif;
          $x[] = (int) $y;
            // # cast $y and get strict numeric value of element
        }
        return $x;
      } // # function will only be called into scope if data is submitted and valid

      function fillArray($arr) {
        $x = array(  );
        $index = -1;
        foreach( $arr as $ele ):
          $index++;
          $x[$index] = array(  );
          for( $i = 0; $i < $ele; $i++ ) {
            $x[$index][] = $i+1;
          }
        endforeach;
        return $x;
      } // # function will only be called into scope if data is submitted and valid

      if( strlen( str_replace( ' ', '', $data ) ) > 0 ) {
        $processed = to_numeric( explode( ',', $data ) );

        if( !$processed ):
          return (object) array(
            'error' => (object) array(
              'message' => 'Input Must Be Numeric'
            )
          ); // # script will assume data has been submitted and is non numeric
        endif;

        return (object) array(
          'results' => array(
            'processed' => $processed,
            'sumArr' => fillArray( $processed )
          ),
          'error' => false
        ); // # script will assume data has been submitted and is not empty
      } else {
        return (object) array(
          'error' => (object) array(
            'message' => 'Invalid Data Input'
          )
        ); // # script will assume data has been submitted and is empty
      }
    }

    return false;
      // # script will assume data has not yet been submitted
  }

  $data = process_data();

?>
<!doctype html>
<html>
  <head>
    <title>Lab 8</title>
    <link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href="http://www.justinaguilar.com/animations/css/animations.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/paper/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <style>
      * {
        font-family: 'Play', sans-serif;
      }
      h1, h2, h3, h4, h5, h6, caption {
        font-family: 'Open Sans Condensed', sans-serif;
      }
      body {
        background-color: #E0E0E0;
      }
      .ico {
        display: inline-block;
      }
      .ico-left {
        padding-right: 5px;
      }
      .ico-right {
        padding-left: 5px;
      }
      .wrapper {
        margin-top: 2em;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="alert alert-dismissible alert-info text-center">
          <i class="ico ico-left fa fa-code"></i><strong>Project by John Nolette</strong> Designed using Open Source Frameworks
        </div>
        <?php if( $data && $data->error ): ?>
          <div class="alert alert-dismissible alert-danger text-center">
            <i class="ico ico-left fa fa-bullhorn"></i><strong>Error Encountered</strong> "<?php echo $data->error->message; ?>"
          </div>
        <?php endif; ?>
        <div class="jumbotron">
          <?php if( $data && !$data->error ): ?>
            <div class="page-header">
              <h1>Lab 8 / Results</h1>
            </div>
            <div class="row">
              <div class="col-md-6">
                <h2>Processed Data</h2>
                <code><?php print_r( $data->results['processed'] ); ?></code>
              </div>
              <div class="col-md-6">
                <h2>Array Sum</h2>
                <code><?php print_r( $data->results['sumArr'] ); ?></code>
                <h4>
                  Sum: <?php
                    $sum = 0;
                      foreach( $data->results['sumArr'] as $s ): foreach( $s as $k ): $sum += $k; endforeach; endforeach;
                    echo $sum;
                  ?>
                </h4>
              </div>
            </div>
          <?php else: ?>
            <form class="form-horizontal" method='post'>
              <fieldset>
                <legend>Lab 8 / Data Input</legend>
                <div class="form-group">
                  <label for="inputData" class="col-lg-2 control-label">Data</label>
                  <div class="col-lg-10">
                    <input name='data' type="text" class="form-control" id="inputData" placeholder="Data Input">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </fieldset>
            </form>
          <?php endif; ?>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
