<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container">
        <?php require_once 'includes/navbar.php'?>
                
        <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Question & Answers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <form class="AjaxForm" id="add-question-form" 
                    method='POST' enctype="multipart/form-data"
                >
                    <div class="form-group">
                        <input type="hidden" id="question_id" name="question_id">
                        <label for="question_title" class="col-form-label">Question Title:</label>
                        <input type="text" class="form-control" id="question_title" name="question_title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="question_subject" class="col-form-label">Subject:</label>
                        <select type="text" class="form-control" id="question_subject" name="question_subject" required>
                            <option value='1'>Maths</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question-file" class="col-form-label">File:</label>
                        <input type="file" class="form-control" id="question-file" name="question-file" required accept="application/pdf">
                    </div>
                
                </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-close" >Close</button>
                    <button type="button" class="btn btn-primary" onClick="saveQuestions()">Save</button>
                </div>
                </div>
            </div>
            </div>
        <!-- End section add notes -->



        <div>
            <!-- <h2>here</h2> -->
            <h3>All Questions and answers</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" id="add-subject"> Add Question </button>
            <br>
            <br>


            <!-- begin section groups list -->
            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>File</th>
                        <th>Subject</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
            <!-- end section groups list -->

        </div>
    </div>
    <!-- jQuery v3.2.1  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script>

    $(function () {
        getQuestions();
        setTimeout(() => {
            loadNotesSubjectListInQuestions();
        }, 0);
        $('#exampleModalCenter').on('shown.bs.modal', function () {
            $('#add-question-form').trigger("reset");
            
        });

        $(document).on('submit', 'form#add-question-form', function() {   
            var formData = new FormData(this);
            $.ajax({
                url     : "http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?add_questions",
                type    : 'POST',
                dataType: 'json',
                data    : formData,
                success : function( data ) {
                        // console.log(data);
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

    function deleteQuestion (row) {
        var r = confirm("Are you sure you want to delete this question?");
        if (r == true) {
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?delete_question', 
            {user_id: 1, id: row.id}, resp => {
                window.alert('Update successfull');   
                window.location.reload();
            });
        } else;
    }

    function editForm (formData) {
        $('#add-subject').click();
        setTimeout(() => {
            $('#question_id').val(+formData.id);
            $('#question_title').val(formData.question);
            $('#question_subject').val(+formData.subject_id);
        }, 1000);
    }

    function saveQuestions () {
        let question_id = $('#question_id').val().trim();
        let questionTitle = $('#question_title').val().trim();
        let questionSubject = $('#question_subject').val().trim();
        let fileName = $('#question-file').val();
        if (!questionTitle || !questionSubject ) {
            return alert('Please fill in all fields');
        }
        $('#add-question-form').submit();
    }
    </script>
</body>
</html>