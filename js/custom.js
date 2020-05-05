

$(function () {
    // $('#example').DataTable({
    //     "columns": [
    //         { "data": "name" },
    //         { "data": "group_status" },
    //     ],
    //     data:  [
    //         {'name': 'Maths', 'group_status': 'Open'},
    //         {'name': 'Maths', 'group_status': 'Open'},
    //         {'name': 'Maths', 'group_status': 'Open'},
    //         {'name': 'Maths', 'group_status': 'Open'},
    //         {'name': 'Maths', 'group_status': 'Open'},
    //     ]
        
    // });
    getGroups();
});

function getGroups () {
    $.get("http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?get_groups", {}, 
        data => {
            console.log(data);
            $('#example').DataTable({
                "columns": [
                    { "data": "name" },
                    { "data": "description" },
                    { "data": "level_name" },
                    { "data": "sublect_name" },
                    { "data": "first_name" },
                    { "data": "group_status" },
                ],
                data:  data
            });
        }, 'JSON'
    )
}