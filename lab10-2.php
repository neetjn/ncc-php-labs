<?php

  $data = (object) $_POST;

  if( !empty( $_POST ) ):
    $data->error = false;
    function setErr($message) {
      global $data;
      $data->error = array(
        'message' => $message
      ); // # define our error stub
    }

    if( strlen( $data->currencyType ) > 0 && strlen( $data->currencyAmt ) > 0 ):
      if( is_numeric( $data->currencyAmt ) ):
        global $data;
        $converted = 0;
        switch( $data->currencyType ):
          case 'Euros':
            $converted = round( $data->currencyAmt / 1.157, 2 );
            break;
          case 'Pounds':
            $converted = round( $data->currencyAmt / 0.6956, 2 );
            break;
          case 'CAD':
            $converted = round( $data->currencyAmt / 1.247, 2 );
            break;
          case 'Francs':
            $converted = round( $data->currencyAmt / 0.7729, 2 );
            break;
          default:
            setErr('Invalid Currency Type Specified');
            break;
        endswitch;
      else:
        setErr('Currency Amount Must Be Numeric');
      endif;
    else:
      setErr('Invalid Parameters Specified');
    endif;

  else:
    $data = false;
      // # assume post data not specified
  endif;

?>
<!doctype html>
<html>
  <head>
    <title>Lab 10 / Results</title>
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
          <div class="alert alert-dismissible alert-danger text-center slideDown">
            <i class="ico ico-left fa fa-bullhorn"></i><strong>Error Encountered</strong> "<?php echo $data->error['message']; ?>"
          </div>
        <?php endif; ?>
        <div class="jumbotron">
          <?php if( $data && !$data->error ): ?>
            <div class="page-header">
              <h1>Lab 10 / Results</h1>
            </div>
            <?php if( $data && $data->error ): ?>
            <h1 class="text-center">Cannot Proceed Due To Error</h1>
            <h2 class="text-center"><small>Move Back To <a href="lab10.php">Data Input</a></small></h2>
            <?php else: ?>
            <table class="table table-striped table-hover">
              <thead>
                <th>USD Amount</th>
                <th>Currency Type</th>
                <th>Conveted Sum</th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <i class="ico ico-left fa fa-usd"></i><?php echo $data->currencyAmt; ?>
                  </td>
                  <td>
                    <?php echo $data->currencyType; ?>
                  </td>
                  <td>
                    <i class="ico ico-left fa fa-money"></i><?php echo $converted; ?>
                  </td>
                </tr>
              </tbody>
            </table>
            <?php endif; ?>
          <?php else: ?>
            <div class="jumbotron alert alert-dismissible alert-danger">
              <p class="text-center">
                <i class="ico ico-left fa fa-flag"></i> Input Data Undefined
              </p>
            </div>
            <p class="text-center">
              <a href="lab10.php" type="submit" class="btn btn-lg btn-warning">Input Data</a>
            </p>
          <?php endif; ?>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
