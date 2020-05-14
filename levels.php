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

    <!-- Begin section add notes -->
    <!-- Button trigger modal -->
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form class="AjaxForm" id="add-subject-form" 
                action="http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?add_notes_to_subject" 
                method='POST' enctype="multipart/form-data"
            >
            <div class="form-group">
                <label for="notes-title" class="col-form-label">Level Name:</label>
                <input type="text" class="form-control" id="notes-title" name="title">
            </div>
            
            </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close" >Close</button>
                <button type="button" class="btn btn-primary" onClick="saveNotes()">Save</button>
            </div>
            </div>
        </div>
        </div>
    <!-- End section add notes -->




    <div class="container">
        <?php require_once 'includes/navbar.php'?>
        <div>
            <!-- <h2>here</h2> -->
            <h3>All Levels</h3>
            <hr>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Add Level </button>

            <br>
            <br>

            <!-- begin section groups list -->
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
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
        getLevels();

        $(document).on('submit', 'form.AjaxForm', function() {
            var formData = new FormData(this);
            $.ajax({
                url     : $(this).attr('action'),
                type    : $(this).attr('method'),
                dataType: 'json',
                data    : formData,
                success : function( data ) {
                        alert('Submission successfull');
                        window.location.reload();
                },
                error   : function( xhr, err ) {
                            alert('Error');     
                },
                cache: false,
                contentType: false,
                processData: false
            });    
            return false;
        });


      });
    </script>
</body>
</html>