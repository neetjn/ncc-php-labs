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

    if( strlen( $data->lastName ) > 0 && strlen( $data->studentID ) > 0 && strlen( $data->major ) > 0 && strlen( $data->courses ) > 0 ):
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

      $data->courses = split( ',', str_replace( ' ', '', $data->courses ) );
      $data->credits = to_numeric( split( ',', str_replace( ' ', '', $data->credits ) ) );
      if( !$data->credits ):
        setErr('Credits Must Be Numeric');
      else:
        if( sizeof( $data->courses ) !== sizeof( $data->credits ) ):
          setErr('Course and Credits Mismatch');
        else:
          $student = array(
            'ID' => $data->studentID,
            'Address' => $data->address,
            'Major' => $data->major,
            'Courses' => $data->courses,
            'Credits' => $data->credits
          );
        endif;
      endif;
    else:
      setErr('Insufficient Parameters Passed');
    endif;
  else:
    $data = false;
      // # assume post data not specified
  endif;

?>
<!doctype html>
<html>
  <head>
    <title>Lab 9</title>
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
              <h1>Lab 9 / Results</h1>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h2>Keys</h2>
                <h3><small>echo</small></h3>
                <?php foreach( $student as $key=>$val ): ?>
                  <h4><?php echo $key; ?></h4>
                <?php endforeach; ?>
              </div>
              <div class="col-md-8">
                <h2>Values</h2>
                <h3><small>print_r</small></h3>
                <?php foreach( $student as $key=>$val ): ?>
                <p>
                  <code>
                    <?php print_r( $val ); ?>
                  </code>
                </p>
                <?php endforeach; ?>
              </div>
            </div>
          <?php else: ?>
            <form name='flag' class="form-horizontal" method='post'>
              <fieldset>
                <legend>Lab 9 / Data Input</legend>
                <div class="form-group">
                  <label for="lastName" class="col-lg-2 control-label">Last Name</label>
                  <div class="col-lg-10">
                    <input name='lastName' type="text" class="form-control" id="lastName" placeholder="Student Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="studentID" class="col-lg-2 control-label">Student ID</label>
                  <div class="col-lg-10">
                    <input name='studentID' type="text" class="form-control" id="studentID" placeholder="Student ID">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address" class="col-lg-2 control-label">Address</label>
                  <div class="col-lg-10">
                    <input name='address' type="text" class="form-control" id="address" placeholder="City, State...">
                  </div>
                </div>
                <div class="form-group">
                  <label for="major" class="col-lg-2 control-label">Major</label>
                  <div class="col-lg-10">
                    <input name='major' type="text" class="form-control" id="major" placeholder="Major">
                  </div>
                </div>
                <div class="form-group">
                  <label for="courses" class="col-lg-2 control-label">Courses</label>
                  <div class="col-lg-10">
                    <input name='courses' type="text" class="form-control" id="courses" placeholder="Courses ( Separated by Commas )">
                  </div>
                </div>
                <div class="form-group">
                  <label for="credits" class="col-lg-2 control-label">Credits</label>
                  <div class="col-lg-10">
                    <input name='credits' type="text" class="form-control" id="credits" placeholder="Credits ( Separated by Commas )">
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
