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
                <h5 class="modal-title" id="exampleModalLongTitle">Add Notes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
            <form>
            <div class="form-group">
                <label for="notes-title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="notes-title">
            </div>
            <div class="form-group">
                <label for="notes-subject" class="col-form-label">Subject:</label>
                <!-- <input type="text" class="form-control" id="notes-subject"> -->

                <input list="notes-subject" value="" class="custom-select custom-select-sm">
                <datalist id="notes-subject" style="width:90%">
                    <!-- <option value="ISO-8859-1">ISO-8859-1</option>
                    <option value="cp1252">ANSI</option>
                    <option value="utf8">UTF-8</option> -->
                </datalist>

            </div>
            <div class="form-group">
                <label for="notes-file" class="col-form-label">Notes:</label>
                <input type="file" class="form-control" id="notes-file"   accept="application/pdf">
            </div>
            </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"> Add Notes </button>

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

        $('#exampleModalCenter').on('shown.bs.modal', function () {
            console.log('here');
            loadNotesSubjectList();
        })

      });
    </script>
</body>
</html>