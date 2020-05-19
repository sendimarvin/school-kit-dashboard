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
                <h5 class="modal-title" >Add Level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form class="AjaxForm" id="add-level-form" 
                action="http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?add_level" 
                method='POST' enctype="multipart/form-data"
            >
            <div class="form-group">
                <input type="hidden" id="level_id" name="level_id">
                <label for="level_name" class="col-form-label">Level Name:</label>
                <input type="text" class="form-control" id="level_name" name="level_name">
            </div>
            
            </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close" >Close</button>
                <button type="button" class="btn btn-primary" onClick="saveLevel()">Save</button>
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

            <button type="button" class="btn btn-primary" data-toggle="modal" 
                data-target="#exampleModalCenter" id="add-level"> Add Level </button>

            <br>
            <br>

            <!-- begin section groups list -->
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
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
        $('#exampleModalCenter').on('shown.bs.modal', function () {
            $('#level_id').val('');
            $('#add-subject-form').trigger("reset");
        });
        

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

    function editForm (formData) {
        $('#add-level').click();
        setTimeout(() => {
            $('#level_id').val(+formData.id);
            $('#level_name').val(formData.name);
        }, 1000);
    }

    function deleteLevel (row) {
        var r = confirm("Are you sure you want to delete this level?");
        if (r == true) {
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?delete_level', 
            {user_id: 1, id: row.id}, resp => {
                window.alert('Update successfull');   
                window.location.reload();
            });
        } else;
    }

    function saveLevel () {
        let level_id = +$('#level_id').val();
        let level_name = $('#level_name').val().trim();
        if (!level_name) {
            return alert('Please fill in all fields');
        }

        $('#add-level-form').submit();
        $('#modal-close').click();
    }



    </script>
</body>
</html>