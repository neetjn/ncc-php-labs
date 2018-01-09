<?php
  /*

    Author: John Nolette

  */
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Bookstore / Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/paper/bootstrap.min.css">
    <style>
      * {
        font-family: 'verdana';
      }
      body {
        background-color: #49BDEF;
      }
      .wrapper {
        margin-top: 2em;
      }
      .ico {
        display: inline-block;
      }
      .ico-left {
        padding-right: 6px;
      }
      .ico-right {
        padding-left: 6px;
      }

      #target {
        font-size: 1.2em;
      }

      .inverse-color {
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="inverse-color text-right">
              <i class="ico ico-left fa fa-book"></i> Bookstore
            </h1>
            <h4 class="inverse-color text-right">
              php-html
            </h4>
          </div>
          <div class="col-md-6">
            <div class="alert alert-dismissible alert-danger text-center">
              <i class="ico ico-left fa fa-bullhorn"></i> <strong>Watch out!</strong> These books are super expensive.
            </div>
            <div class="well">
              <p id="target">
<?php
  echo '
Sales: $190000
<br />
Expenses:
<br />
&nbsp;&nbsp;&nbsp;&nbsp;Rent: $25000
<br />
&nbsp;&nbsp;&nbsp;&nbsp;Salary: $37500
<br />
&nbsp;&nbsp;&nbsp;&nbsp;Supplies: $410
<br />
Total:
<br />
&nbsp;&nbsp;&nbsp;&nbsp; Operating Income: 43910
<br/>
&nbsp;&nbsp;&nbsp;&nbsp; Income after Taxes: 31616
  ';
?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
