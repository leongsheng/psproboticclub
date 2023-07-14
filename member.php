<?php
include("conn_db.php");
// Initialize the session
session_start();

$selected1="JTMK";
$selected2="JKE";
$selected3="JP";
$selected4="JKM";
$selected5="";
$query=mysqli_query($conn,"select * from member");
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["admin_login"]) || $_SESSION["admin_login"] !== true){
    header("location: login.php");
    exit;
}

if(isset($_POST['search_btn'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $search=strtoupper($_POST['search']);

        $query=mysqli_query($conn, "select * from member where name like '%$search%'");
    }
}

if(isset($_POST['program'])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if($_POST['program'] == ""){
            $selected1="JTMK";
            $selected2="JKE";
            $selected3="JP";
            $selected4="JKM";
            $selected5="";
        }
        elseif($_POST['program'] == "all"){
            $selected1="JTMK";
            $selected2="JKE";
            $selected3="JP";
            $selected4="JKM";
            $selected5="JKM";
        }
        else{
            $selected1=$_POST['program'];
            $selected2=$_POST['program'];
            $selected3=$_POST['program'];
            $selected4=$_POST['program'];
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.14/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/member.css">
<title>Robotic Member Information</title>
</head>
<body>
    <div class="container p-30">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment"> 
                         <a href="admin_to_member.php" class="btn dim_button"><span class="glyphicon glyphicon-user"></span>User Page</i></a>
                         <a class="btn dim_button create_new" href="member_request.php"> <span class="glyphicon glyphicon-plus"></span>Request</a>
                        </div>
                        <a class="btn" href="logout.php"> <span class="glyphicon glyphicon-log-out"></span>Logout </a>
                        <form method="post">
                            <div class="dropdown">
                                <select class="dropdown-select" name="program" onchange="this.form.submit();">
                                    <option value="">Program</option>
                                    <option value="all">All</option>
                                    <option value="JTMK">JTMK</option>
                                    <option value="JKE">JKE</option>
                                    <option value="JKM">JKM</option>
                                    <option value="JP">JP</option> 
                                </select>
                            </div>
                        </form>
                        <div class="col-sm-8 add_flex">
                                <form action="member.php" method="post">
                                    <div class="form-control hide_search" style="height: 10px;"></div>
                                    <input type="text" class="text_search" placeholder="search with name" style="height: 40px;" name="search">
                                    <input type="submit" class="button_search" value="Search" name="search_btn">
                                    <div class="form-control hide_search" style="height: 10px;"></div>
                                </form>
                        </div> 
                    </div>
                    <div class="overflow-x">
                        <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="width:5%;">ID</th>
                                    <th style="width:20%;">Name</th>
                                    <th style="width:10%;">Matric No</th>
                                    <th style="width:10%;">Program</th>
                                    <th style="width:5%;">Sem</th>
                                    <th style="width:10%;">Ic Number</th>
                                    <th style="width:10%;">Tel No</th>
                                    <th style="width:10%;">status</th>
                                    <th style="width:10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $list=1;

                                while($row = mysqli_fetch_array($query)){
                                if($row['status'] != "" && ($row['program'] == $selected1 || $row['program'] == $selected2 || $row['program'] == $selected3 || $row['program'] == $selected4 || $row['program'] == $selected5)){
                                    Print "<tr>";
                                    Print '<td>'.$list."</td>";
                                    if($row['name'] == ""){
                                        Print '<td>'.""."</td>";
                                    }
                                    elseif($row['name'] != ""){
                                        Print '<td>'.$row['name']."</td>";
                                    }
                                    Print '<td>'.$row['matric_no']."</td>";
                                    if($row['program'] == ""){
                                        Print '<td>'.""."</td>";
                                    }
                                    elseif($row['program'] != ""){
                                        if($row['program'] == "JTMK"){
                                            Print '<td><span class="mode mode_jtmk">'.$row['program']."</span></td>";
                                        }
                                        elseif($row['program'] == "JKM"){
                                            Print '<td><span class="mode mode_jkm">'.$row['program']."</span></td>";
                                        }
                                        elseif($row['program'] == "JP"){
                                            Print '<td><span class="mode mode_jp">'.$row['program']."</span></td>";
                                        }
                                        elseif($row['program'] == "JKE"){
                                            Print '<td><span class="mode mode_jke">'.$row['program']."</span></td>";
                                        }
                                    }
                                    if($row['sem'] == "0"){
                                        Print '<td>'.""."</td>";
                                    }
                                    elseif($row['sem'] != ""){
                                        Print '<td>'.$row['sem']."</td>";
                                    }
                                    if($row['ic_number'] == ""){
                                        Print '<td>'.""."</td>";
                                    }
                                    elseif($row['ic_number'] != ""){
                                        Print '<td>'.$row['ic_number']."</td>";
                                    }
                                    if($row['tel'] == ""){
                                        Print '<td>'.""."</td>";
                                    }
                                    elseif($row['tel'] != ""){
                                        Print '<td>'.$row['tel']."</td>";
                                    }
                                    if($row['status'] == "admin"){
                                        Print '<td><span class="mode mode_admin">'.$row['status']."</span></td>";
                                    }
                                    else{
                                        Print '<td><span class="mode mode_member">'.$row['status']."</span></td>";
                                    }
                                    Print '<td><div class="btn-group">
                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                    <i class="fa fa-pencil-square-o"></i> </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="update_member.php?id='.$row['id'].'" >
                                                Update Details
                                            </a>
                                        </li> 
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown_more">
                                        <li>
                                            <a href="delete_member.php?id='.$row['id'].'">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </li>
                                    </ul>
                                </div></td>';
                                Print "</tr>";
                                }
                                $list+=1;
                                }
                            ?>      
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.14/js/jquery.dataTables.min.js"></script>
<script src="assets/js/member.js"></script>
</body>
</html>


