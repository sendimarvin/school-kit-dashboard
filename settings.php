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
            <h3>System settigs</h3>
            <hr>

            <table style="width:85%">
            
                <tr>
                    <td >
                        <button class="btn btn-danger" onClick="resetSystem(0)">Reset System</button>
                    </td>
                    <td >
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td >
                        <button class="btn btn-default" onClick="resetSystem(1)">Truncate System</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h4>Monthly Charge</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="number" class="form-control" id="charge" name="charge" disabled="true">
                        </div>
                    </td>
                    <td>
                        &nbsp; &nbsp;<button class="btn btn-default" onClick="updateMonthlyCharge()" id="edit-charge">Edit</button>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        &nbsp;
                        <hr>
                    </td>
                </tr>
            </table>

            

        </div>
    </div>
    <!-- jQuery v3.2.1  -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    //   $(function () {
    //       getEvents();
    //   });

    function updateMonthlyCharge () {
        if ($('#charge').prop('disabled')) {
            $('#charge').prop('disabled', false);
            $('#edit-charge').html('Save');
        } else {
            $('#charge').prop('disabled', true);
            $('#edit-charge').html('Edit');

            let charge = +$('#charge').val();
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?update_charge', 
                {user_id: 1, charge: charge}, resp => {
                try {
                    resp = JSON.parse(resp);
                    if (resp.success) {
                        window.alert(resp.msg);
                        
                    } else {
                        window.alert(resp.msg);
                        
                    }
                } catch (e) {
                    window.alert('Something is not right');    
                }  
            });
        }
    }

    function resetSystem (type = 0) {
        var r = confirm("Are you sure you want to reset the system. This will delete all transctions. Please first make a backup.");
        if (r == true) {
            $.post('http://cresteddevelopers.com/AppFiles/SkulKitApp/manage-users.php?reset_system', {user_id: 1, type: type}, resp => {
                try {
                    resp = JSON.parse(resp);
                    if (resp.success) {
                        window.alert(resp.msg);
                        
                    } else {
                        window.alert(resp.msg);
                        
                    }
                } catch (e) {
                    window.alert('Something is not right');    
                }  
            });
        } else;
    }
    </script>
</body>
</html>