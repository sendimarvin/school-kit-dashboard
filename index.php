<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container">
      <?php require_once 'includes/navbar.php'?>
        <div>
            <!-- <h2>here</h2> -->
            <h3>All Groups in application</h3>
            <br>
            <br>

            <!-- begin section groups list -->
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Level</th>
                        <th>Subject</th>
                        <th>Events</th>
                        <th>Members</th>
                        <th>Created By</th>
                        <th>Group Status</th>
                    </tr>
                </thead>
            </table>
            <!-- end section groups list -->

        </div>
    </div>
    <!-- jQuery v3.2.1  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
      $(function () {
          getGroups();
      });
    </script>
</body>
</html>