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
<title>Robotic Member request</title>
</head>
<?php include("conn_db.php");
?>
<body>
    <div class="container p-30">
        <div class="row">
            <div class="col-md-12 main-datatable">
                <div class="card_body">
                    <div class="row d-flex">
                        <div class="col-sm-4 createSegment"> 
                         <a href="member.php" class="btn dim_button"><span class="glyphicon glyphicon-user"></span>Back</i></a>
                        </div>
                        <div class="col-sm-8 add_flex">
                            <div class="form-control hide_search" style="height: 60px;"></div>
                        </div> 
                    </div>
                    <div class="overflow-x">
                        <table style="width:100%;" id="filtertable" class="table cust-datatable dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="min-width: auto">ID</th>
                                    <th style="min-width: auto">Matric No</th>
                                    <th style="min-width: auto">Program</th>
                                    <th style="min-width: auto">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query=mysqli_query($conn,"select * from member where status = ''");
                                $list=1;

                                while($row = mysqli_fetch_array($query)){
                                Print "<tr>";
                                    Print '<td>'.$list."</td>";
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
                                    Print '<td><div class="btn-group">
                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="request.php?id='.$row['id'].'">
                                                Accept
                                            </a>
                                        </li> 
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a class="dropdown-toggle dropdown_icon" data-toggle="dropdown">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown_more">
                                        <li>
                                            <a href="delete.php?id='.$row['id'].'">
                                                <i class="fa fa-trash"></i> Reject
                                            </a>
                                        </li>
                                    </ul>
                                </div></td>';
                                Print "</tr>";
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


