<?php
session_start();
  include('head.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <title>Wateen Bakery | Admin</title>
    </head>
    <body class="bg-white">
        <!--  -=============== -->
        <nav class="navbar navbar-dark lighten-1" style="background-color:#895920">
        <div> <a class="navbar-brand text-white">Wateen Bakery</a></div>
            <ul class="navbar-nav d-flex align-items-center flex-column">
            <li class="nav-item" id="logout-btn" name="logout">
                        <a class="nav-link" href="../controller/logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                    </li>
                </ul>
        </nav>
        <!-- -=============== -->
        <div class="mt-5">
            <table class="table table-hover w-75 m-auto ">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">Total Seals</th>
                        <th scope="col">Total Transection</th>
                        <th scope="col">Top Five expensive Item to buy</th>
                        <th scope="col">Total Users</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                </tbody>
            </table>
        </div>
       <hr class="bg-dark">
        <div class="mt-5">
        <table class="table table-hover w-75 m-auto ">
                <thead class="table-warning">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col"> Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Created_Date</th>
                    </tr>
                <tbody>
                    <tr>
                        <th> Total Seals</th>
                        <th>Total Transection</th>
                        <th>Total Item</th>
                        <th> Total Users</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>