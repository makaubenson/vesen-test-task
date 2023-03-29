<?php
include 'server.php';
?>
<!doctype html>
<html lang="en">

<head>
    <?php
include './components/header.php';
?>
    <title>Vesen Computing</title>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-4">
                <div class="table-responsive">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
      $data_fetch_query = "SELECT * FROM `users`";
      $data_result = mysqli_query($db, $data_fetch_query);
      if ($data_result->num_rows > 0){
          while($row = $data_result->fetch_assoc()) {

              $user_name = $row['name'];
              $user_email = $row['email'];
              $user_phone = $row['phone'];
              $date_added = $row['date_added'];

      echo "<tr> <td>" .$user_name. "</td>";
      echo "<td>" .$user_email."</td>";
      echo "<td>" .$user_phone."</td>";
      echo "<td>" .$date_added."</td>";
      echo "<td>
        
      <form method ='POST' action=''>
      <input  type='text' hidden name='user_mail' value='$user_email'>
      <input type='submit'  data-name='$user_name' data-mail='$user_email' data-phone='$user_phone' data-date_added='$date_added' value='PRINT' name='print-user-btn' class='btn btn-success print-btn m-2'>
      </form>
      </td> </tr>";
      }
      
      }else{
      echo "<td>"."No data Found"."</td>";
      }


      ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>


        <script>
        < script >
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
        <?php
include './components/scripts.php';
?>
</body>

</html>