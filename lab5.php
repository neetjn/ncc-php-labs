<?php
  $str = '     mary jones lives in santa cruz, California at 22 ocean drive.';

  $data = (object) array(
    'length' => strlen( $str ),
    'caps' => ucwords( $str ),
    'lowercase' => strtolower( $str ),
    'short' => substr( ucwords( $str ), 25, 22),
    'trimmed' => trim( substr( ucwords( $str ), 25, 22) ),
    'index' => strpos( trim( substr( ucwords( $str ), 25, 22) ), 'California' ),
    'final' => str_replace( 'Santa Cruz', 'Los Altos', trim( substr( ucwords( $str ), 25, 22) ) ),
    'numwords' => str_word_count( str_replace( trim( substr( ucwords( $str ), 20, 44) ), 'Santa Cruz', 'Los Altos' ) )
  ); // # detailed results, not ideal due to numerous calculations
?>
<!doctype html>
<html>
  <head>
    <title>Lab 5</title>
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
        <div class="jumbotron">
          <h1>Lab 5 Results</h1>
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Base</th>
                <th>Length</th>
                <th>Caps</th>
                <th>Lowercase</th>
                <th>Short</th>
                <th>Trimmed+Short</th>
                <th>Index</th>
                <th>Final</th>
                <th>Num Words</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><?php echo $str; ?></td>
                <td><?php echo $data->length; ?></td>
                <td><?php echo $data->caps; ?></td>
                <td><?php echo $data->lowercase; ?></td>
                <td><?php echo $data->short; ?></td>
                <td><?php echo $data->trimmed; ?></td>
                <td><?php echo $data->index; ?></td>
                <td><?php echo $data->final; ?></td>
                <td><?php echo $data->numwords; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
