<?php

  $data = (object) $_COOKIE;
    // # dump cookie data into local variable

  function set_data() {
      global $data;
      $one_day = time() + ( 36e2 * 24 );
      setcookie( 'random', $data->random, $one_day );
      setcookie( 'turns', $data->turns, $one_day );
  }

  if( !isset( $data->random ) ):
    $data->random = rand( 1, 50 );
    $data->turns = 0;
    set_data();
        // # set random number if not already set
  endif;

  $error = false;
    // # instantiate error in false state
  function setError($message) {
    global $error;
    $error = (object) array(
      'message' => $message
    );
  };

    if( !empty( $_POST ) ):
      $input = (object) $_POST;
        // # dump user input into local data
      if( strlen( $input->choice ) > 0 ):
        if( !is_numeric( $input->choice ) ):
          setError('Choice Must Be Numeric');
        else:
          $input->choice = (int) $input->choice;
          if( $input->choice > 50 || $input->choice <= 0 ):
            setError('Choice Must Be Between 1 and 50');
          endif;
        endif;
      endif;
    endif;

?>
<!doctype html>
<html>
  <head>
    <title>Lab 12</title>
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
        <?php if( isset( $input ) && $error ): ?>
          <div class="alert alert-dismissible alert-danger text-center slideDown">
            <i class="ico ico-left fa fa-bullhorn"></i><strong>Error Encountered</strong> "<?php echo $error->message; ?>"
          </div>
        <?php endif; ?>
        <div class="jumbotron">
          <?php if( isset( $input ) && !$error ): ?>
            <div class="text-center">
            <?php if( $data->random == $input->choice ): ?>
              <h3>Congratulations! You've Answered Correctly.</h3>
              <h3>
                <small>Guesses Required: <?php echo $data->turns; ?></small>
              </h3>
              <h2>
                <small>Random Number Reset</small>
              </h2>
              <?php $data->random = rand( 1, 50 ); $data->turns = 0; set_data(); ?>
            <?php else: $data->turns++; set_data(); ?>
              <h3>Better luck next time!</h3>
              <?php if( $data->random > $input->choice ): ?>
                <h3>
                  <small>Too low...</small>
                </h3>
              <?php else: ?>
                <h3>
                  <small>Too high...</small>
                </h3>
              <?php endif ?>
            <?php endif; ?>
            </div>
          <?php endif; ?>
          <form name='flag' class="form-horizontal" method='post'>
            <fieldset>
              <legend>Lab 12 / Data Input</legend>
              <div class="form-group">
                <label for="choice" class="col-lg-2 control-label">Choice</label>
                <div class="col-lg-10">
                  <input name='choice' type="text" class="form-control" id="choice" placeholder="What's Your Guess?">
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
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
