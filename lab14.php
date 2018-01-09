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

  class Triangle {
    private $a, $b;
    public function __construct($a, $b) {
      $this->a = $a;
      $this->b = $b;
    } // # triangle constructor
    public function calculate() {
      return sqrt( pow( $this->a, 2 ) + pow( $this->b, 2 ) );
    } // # calculate third side
  };

  $triangle = null;

    if( !empty( $_POST ) ):
      if( !isset( $data->sideA ) || !isset( $data->sideB ) ):
        setError('Two Sides Must Be Specified');
      else:
        if( ( !is_numeric( $data->sideA ) || $data->sideA < 0 ) || ( !is_numeric( $data->sideB ) || $data->sideB < 0 )  ):
          setError('Input Must Be Numeric');
        else:
          $triangle = new Triangle( $data->sideA, $data->sideB );
        endif;
      endif;
    endif;

?>
<!doctype html>
<html>
  <head>
    <title>Lab 14</title>
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
      .hidden {
        display: none;
      }
    </style>
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
          <?php if( !isset( $triangle ) ): ?>
          <form name='flag' class="form-horizontal" method='post'>
            <fieldset>
              <legend>Lab 14 / Data Input</legend>
              <div class="form-group">
                <label for="sideA" class="col-lg-2 control-label">Side A</label>
                <div class="col-lg-10">
                  <input name='sideA' type="text" class="form-control" id="sideA" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="sideB" class="col-lg-2 control-label">Side B</label>
                <div class="col-lg-10">
                  <input name='sideB' type="text" class="form-control" id="sideB" placeholder="">
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
          <?php else: ?>
            <h1 class="text-center pulse">
              <i class="fa fa-bell"></i>
            </h1>
            <h2 class="text-center"><?php echo( $triangle->calculate() ); ?></h2>
          <?php endif; ?>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
