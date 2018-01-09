<?php
  extract( $_POST );

  function calcGrade($n) {
    if( $n >= 90 ):
      return 'A';
    elseif( $n >= 80 ):
      return 'B';
    elseif( $n >= 70 ):
      return 'C';
    elseif( $n >= 60 ):
      return 'D';
    else:
      return 'F';
    endif;
  }

  function grades() {
    global $gradeA; global $gradeB; global $gradeC;

    if( !isset( $gradeA ) ):
      return (object) array(
        'valid' => false
      );
    else:
      if( is_numeric( $gradeA ) && is_numeric( $gradeB ) && is_numeric( $gradeC ) ):
        $gradeA = (int) $gradeA; $gradeB = (int) $gradeB; $gradeC = (int) $gradeC;
          // # cast grades to integer type
        if( $gradeA >= 0 && $gradeA <= 100 && $gradeB >= 0 && $gradeB <= 100 && $gradeC >= 0 && $gradeC <= 100 ):
          return (object) array(
            'gradeOne' => calcGrade( $gradeA ),
            'gradeTwo' => calcGrade( $gradeB ),
            'gradeThree' => calcGrade( $gradeC ),
            'valid' => true
          );
        else:
          return (object) array(
            'valid' => false,
            'error' => 'Grades Out of Bounds'
          );
        endif;
      else:
        return (object) array(
          'valid' => false,
          'error' => 'Invalid Grade Input'
        );
      endif;
    endif;
  }

?>
<!doctype html>
<html>
  <head>
    <title>Lab 6</title>
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
          <!-- CONDITIONAL CHECK FOR POSTED FORM -->
          <?php if( !isset( $gradeA ) || !grades()->valid ): ?>
            <!-- ERROR ENCOUNTERED -->
            <?php if( isset( grades()->error ) ): ?>
              <div class="alert alert-dismissible alert-danger text-center">
                <i class="ico ico-left fa fa-bullhorn"></i><strong>Error Encountered</strong> "<?php echo grades()->error ?>"
              </div>
            <?php endif; ?>
            <form class="form-horizontal" method='post'>
              <fieldset>
                <legend>Lab 6 / Grade Input</legend>
                <div class="form-group">
                  <label for="inputGrade" class="col-lg-2 control-label">Grade (1)</label>
                  <div class="col-lg-10">
                    <input name='gradeA' type="text" class="form-control" id="inputGrade" placeholder="Grade Input">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputGrade" class="col-lg-2 control-label">Grade (2)</label>
                  <div class="col-lg-10">
                    <input name='gradeB' type="text" class="form-control" id="inputGrade" placeholder="Grade Input">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputGrade" class="col-lg-2 control-label">Grade (3)</label>
                  <div class="col-lg-10">
                    <input name='gradeC' type="text" class="form-control" id="inputGrade" placeholder="Grade Input">
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
          <?php else: $foo = grades(); ?>
            <!-- POST DATA IS AVAILABLE -->
            <h1>Lab 6 Results</h1>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Grade 1</th>
                  <th>Grade 2</th>
                  <th>Grade 3</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><?php echo $foo->gradeOne; ?></td>
                  <td><?php echo $foo->gradeTwo; ?></td>
                  <td><?php echo $foo->gradeThree; ?></td>
                </tr>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
        <h1 class="text-center hatch" style="color:green;">
          <i class="fa fa-check"></i>
        </h1>
      </div>
    </div>
  </body>
</html>
