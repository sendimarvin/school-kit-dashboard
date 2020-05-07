



function getGroups () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_groups", {}, 
        data => {
            // console.log(data);
            let oTable = $('#example').DataTable({
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "level_name" },
                    { "data": "sublect_name" },
                    { "data": "events_count" },
                    { "data": "members_count" },
                    { "data": "first_name" },
                    { "data": "group_status" },
                ],
                data:  data
            });

        }, 'JSON'
    )
}

function getEvents () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_group_events", {}, 
        data => {
            // console.log(data);
            let oTable = $('#example').DataTable({
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "name" },
                    { "data": "group_name" },
                    { "data": "description" },
                    { "data": "no_of_discussants" },
                    { "data": "create_date" },
                    { "data": "end_date_time" },
                ],
                data:  data
            });

        }, 'JSON'
    )
}

function getSubjects () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_subjects", {}, 
        data => {
            // console.log(data);
            let oTable = $('#example').DataTable({
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "name" },
                    { "data": "level_name" },
                    { "data": "subject_notes_counts" },
                    { "data": "subject_questions_counts" },
                ],
                data:  data
            });

        }, 'JSON'
    )
}

function getUsers () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_all_users", {}, 
        data => {
            let oTable = $('#example').DataTable({
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "first_name" },
                    { "data": "last_name" },
                    { "data": "phone" },
                    { "data": "email" },
                    { "data": "level_name" },
                ],
                data:  data
            });

        }, 'JSON'
    )
}

function getNotes () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_notes_in_subject", {}, 
        data => {
            let oTable = $('#example').DataTable({
                "pageLength": 25,
                "order": [[ 0, "asc" ]],
                "columns": [
                    { "data": "name" },
                    { "data": "subject_name" },
                    { "data": "level_name" },
                    { "data": "notes" },
                    { "data": "created_at" },
                ],
                data:  data
            });

        }, 'JSON'
    )
}

function loadNotesSubjectList () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_subjects", {}, 
        data => {
            let html_str = ``;
            data.forEach(item => {
                html_str += `<option value="${item.name}">${item.name}</option>`;
            });
            $('#notes-subject').html(html_str);
        }, 'JSON'
    )
}

function saveNotes () {
    let notesTitle = $('#notes-title').val();
    let subjectId = $('[list="notes-subject"]').val();
    let isNotes = $('#notes-title').val();
}