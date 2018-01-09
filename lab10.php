<!doctype html>
<html>
  <head>
    <title>Lab 10 / Input</title>
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
          <form name='flag' class="form-horizontal" method='post' action="lab10-2.php">
            <fieldset>
              <legend>Lab 10 / Data Input</legend>
              <div class="form-group">
                <label for="currencyAmt" class="col-lg-2 control-label">Currency Amount</label>
                <div class="col-lg-10">
                  <input name='currencyAmt' type="text" class="form-control" id="currencyAmt" placeholder="Amount">
                </div>
              </div>
              <div class="form-group">
                <label for="currencyType" class="col-lg-2 control-label">Currency Type</label>
                <div class="col-lg-10">
                  <select name="currencyType" class="form-control" id="currencyType">
                    <option>Euros</option>
                    <option>Pounds</option>
                    <option>CAD</option>
                    <option>Francs</option>
                  </select>
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
