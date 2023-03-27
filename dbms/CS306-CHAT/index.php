<!DOCTYPE html>
<html style="height: 100%;">
  <head>
    <title>CS306 - HTML RECIT</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
  <link rel="stylesheet" href="style.css" />

<div class="container form-container" >
<div class="row form-row" style="width: 100%;">
    <div class="col" style="width: 100%;">
        <form role="form" method="POST" action="chat.php">
            
            <div class="form-group row">
                <label for="inputUser" class="col-sm-3 col-form-label"> Username</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="inputUser" name="name" placeholder="Username" required="true">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label"> Password</label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required="true">
                </div>
            </div>



            <div class="form-group row">
                <div class=" col-sm-12 button-row">
                <input type="submit" value="Sign in" name="submit" class="btn btn-primary signin-btn"/>
                </div>
            </div>
        </form>
</div>
</div>
</div>
  </body>
</html>