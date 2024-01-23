<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div style = "background-color:blue;">hello</div>
                </div>
                <div class="col-sm-8">
                    <div style = "background-color:green;">hi</div>
                </div>
            </div>
        </div>
        <form action="test.php" method="get">
        <input type="date" name=date>
        <input name="action" value="update" type="hidden" >
        <button type="submit">Submit</button>
        </form>
        <?php
        
        
if(isset($_GET['action']))
{
  $a=strtotime($_GET['date']);
  $b=date("d/m/Y",$a);
  echo $b;

}

        ?>
        <div class="container px-4">
  <div class="row gx-5">
    <div class="col-4" style="background-color: black;">
     <div class="p-3 border bg-light" >Custom column padding</div>
    </div>
    <div class="col" style="background-color: black;">
      <div class="p-3 border bg-light" >Custom column padding</div>
    </div>
  </div>
</div>
  </body>
</html>