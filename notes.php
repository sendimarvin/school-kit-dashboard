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
                <h5 class="modal-title" >Add Notes</h5>
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
                <input type="hidden" id="notes_id" name="notes_id">
                <label for="notes-title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="notes-title" name="title">
            </div>
            <div class="form-group">
                <label for="notes-subject" class="col-form-label">Subject:</label>

                <select type="text" class="form-control" id="notes-subject" name="notes-subject">
                    <option value='1'>Maths</option>
                </select>
                

            </div>

            <div class="form-group">
                <label for="notes-file" class="col-form-label">Notes:</label>
                <input type="file" class="form-control" id="notes-file" name="file" accept="application/pdf">
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
            <h3>All Subject Notes</h3>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" 
                id="exampleModalLongTitle"> Add Notes </button>

            <br>
            <br>

            <!-- begin section groups list -->
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Level</th>
                        <th>Notes</th>
                        <th>Create Date</th>
                        <th>Action </th>
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
        getNotes();
        setTimeout(() => {
            loadNotesSubjectList();
        }, 0);

        $('#exampleModalCenter').on('shown.bs.modal', function () {
            $('#notes_id').val('');
            $('#add-subject-form').trigger('reset');
            
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
        console.log(formData);
        $('#exampleModalLongTitle').click();
        setTimeout(() => {
            $('#notes_id').val(+formData.id);
            $('#notes-title').val(formData.name);
            $('#notes-subject').val(+formData.subject_id);
        }, 1000);
    }

    function deleteItem (row) {
        var r = confirm("Are you sure you want to delete these notes?");
        if (r == true) {
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?delete_notes', 
            {user_id: 1, id: row.id}, resp => {
                window.alert('Update successfull');   
                window.location.reload();
            });
        } else;
    }


    </script>
</body>
</html>