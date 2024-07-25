<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
      header("location: login.php");
      exit;
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <title>Welcome <?php $_SESSION['username']   ?></title>
    <link rel = "icon" href ="logo.png"  type = "image/x-icon">   
  </head>
  <body>
    
    <?php
      if(isset($_SESSION['status'])){
        echo $_SESSION['status'];
        unset( $_SESSION['status']);
      }
    ?>
    <!-- edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal">
    Edit modal
    </button> -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:lightblue">
            <h5 class="modal-title" id="editmodal">Update Student Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class = "container">
              <form action = "/FA/student_info_form.php" method = "post">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group col-md-6">
                  <label for="facultyid">Faculty Id</label>
                  <input type="text" class="form-control" id="facultyidEdit" name="facultyidEdit" placeholder="Faculty_ID">
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="nameEdit" name="nameEdit" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="Rollno">Roll Number</label>
                  <input type="text" class="form-control" id="RollnoEdit" name = "RollnoEdit" placeholder="Rollno">
                </div>
                <div class="form-group col-md-6">
                  <label for="date">DOB</label>
                  <input type="date" class="form-control" id="dateEdit" name = "dateEdit" placeholder="date">
                </div>
                <div class="form-group col-md-6">
                  <label for="address">Address</label>
                  <input type="text" class="form-control" id="addressEdit" name = "addressEdit" placeholder="address">
                </div>
                <div class="form-group col-md-8">
                  <label for="exampleInputEmail1">Email Id</label>
                  <input type="email" class="form-control" id="emailidEdit" name = "emailidEdit" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group col-md-6">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" id="departmentEdit" name = "departmentEdit" placeholder="Department">
                </div>
                <div class="form-group col-md-6">
                  <label for="cgpa">CGPA</label>
                  <input type="number" class="form-control" id="cgpaEdit" name = "cgpaEdit" placeholder="cgpa">
                </div>
                <div class="form-group col-md-6">
                  <label for="hostel">Hostel Details</label>
                  <input type="text" class="form-control" id="hostelEdit" name = "hostelEdit" >
                </div>
                <div class="form-group col-md-6">
                  <label for="yearofpassing">Year of Passing</label>
                  <input type="date" class="form-control" id="yearofpassingEdit" name = "yearofpassingEdit" placeholder="yearofpassing">
                </div>
                <div class="form-group col-md-6">
                  <label for="placement_status">Placement Status</label>
                  <input type="text" class="form-control" id="placement_statusEdit" name = "placement_statusEdit" >
                </div>
                <div class="form-group col-md-6">
                  <label for="placement_company">Placed Company Name</label>
                  <input type="text" class="form-control" id="placement_companyEdit" name = "placement_companyEdit" placeholder="placement_company">
                </div>
                <div class="form-group col-md-6">
                  <label for="ctc">CTC</label>
                  <input type="number" class="form-control" id="ctcEdit" name = "ctcEdit" placeholder="ctc">
                </div>
                <div class="form-group col-md-6">
                  <label for="parent">Parent's Name</label>
                  <input type="text" class="form-control" id="parentEdit" name = "parentEdit" >
                </div>
                <div class="form-group col-md-6">
                  <label for="parentmobile">Parent's Mobile Number</label>
                  <input type="text" class="form-control" id="mobileEdit" name = "mobileEdit" >
                </div>
                <div class="form-group col-md-6">
                  <label for="guardian">Guardian Name</label>
                  <input type="text" class="form-control" id="guardianEdit" name = "guardianEdit" >
                </div>
                <div class="form-group col-md-6">
                  <label for="guardianNumber">Guardian's Number</label>
                  <input type="text" class="form-control" id="guardian_numberEdit" name = "guardian_numberEdit" >
                </div>
                <button type="submit" class="btn btn-dark col-md-6">Submit</button>  
              </form>
            </div>
          </div>
          <div class="modal-footer" style="background-color:skyblue">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!--companies view Modal -->
    <div class="modal fade" id="companiesVIEWModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:skyblue">
            <h5 class="modal-title" id="exampleModalLabel">Company History</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="companies_viewing_data"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- -->
    <?php require 'partials/_nav.php' ?>
    <div style="background-image: url('bg.jpg')">
      <br>
      <div style="width:15%;  float:left">
        <a href="/FA/welcome.php"> <img src="logo.png" height="120" width="120" /></a>
      </div> 
      <div class="container" style="width:85%; height: 120px;  float:right; color:white">
        <div class="alert alert-success" role="alert">
          <marquee behavior="scroll" direction="left" scrollamount="10">
            <h4 class="alert-heading">Welcome <?php echo $_SESSION['username']   ?> to Faculty Advisor 
            Mentoring System</h4>
          </marquee>    
          <hr>
        </div>
      </div>
      <br><br> <br><br><br> <br>
      
      <!--Search bars-->
      <?php 
        $session_id = session_id();
        if($session_id == 1)
        { echo '<input type="text" class="myInput" id="myInput0" onkeyup="mySearchFunction(0)" placeholder="Search for RollNo.." title="Type in a rollno">
          <input type="text" class="myInput" id="myInput1" onkeyup="mySearchFunction(1)" placeholder="Search for Names.." title="Type in a name">
          <input type="text" class="myInput" id="myInput2" onkeyup="mySearchFunction(2)" placeholder="Search for DOB.." title="Type in a DOB">
          <input type="text" class="myInput" id="myInput3" onkeyup="mySearchFunction(3)" placeholder="Search for Address.." title="Type in a Address">
          <input type="text" class="myInput" id="myInput4" onkeyup="mySearchFunction(4)" placeholder="Search for Email Id.." title="Type in a Email Id">
          <input type="text" class="myInput" id="myInput5" onkeyup="mySearchFunction(5)" placeholder="Search for Department.." title="Type in a Department">
          <input type="text" class="myInput" id="myInput6" onkeyup="mySearchFunction(6)" placeholder="Search for Faculty Id.." title="Type in a FacultyId">
          <input type="text" class="myInput" id="myInput7" onkeyup="mySearchFunction(7)" placeholder="Search for CGPA.." title="Type in a CGPA">
          <input type="text" class="myInput" id="myInput8" onkeyup="mySearchFunction(8)" placeholder="Search for Year of Passing.." title="Type in a Year of Passing">
          <input type="text" class="myInput" id="myInput9" onkeyup="mySearchFunction(9)" placeholder="Search for Hostel.." title="Type in a Hostel">
          <input type="text" class="myInput" id="myInput10" onkeyup="mySearchFunction(10)" placeholder="Search for Parents Name.." title="Type in a Parents Name">
          <input type="text" class="myInput" id="myInput11" onkeyup="mySearchFunction(11)" placeholder="Search for Parents Contact.." title="Type in a Parents Contact">
          <input type="text" class="myInput" id="myInput12" onkeyup="mySearchFunction(12)" placeholder="Search for Guardian Name.." title="Type in a Guardian Name">
          <input type="text" class="myInput" id="myInput13" onkeyup="mySearchFunction(13)" placeholder="Search for Guardians Contact.." title="Type in a Guardians Contact">
          <input type="text" class="myInput" id="myInput14" onkeyup="mySearchFunction(14)" placeholder="Search for Placement Status.." title="Type in a Placement Status">
          <input type="text" class="myInput" id="myInput15" onkeyup="mySearchFunction(15)" placeholder="Search for Placement Company.." title="Type in a Placement Company">
          <input type="text" class="myInput" id="myInput16" onkeyup="mySearchFunction(16)" placeholder="Search for CTC(in lakhs).." title="Type in a CTC(in lakhs)">
          ';
        }
      ?>
      
      <div id='DivIdToPrint'>
        <div style="overflow-x:auto;">
          <div class="table-responsive">
            <table class="table table-hover" id="myTable" >
              <thead class="thead-dark">
                <tr>
                  <th scope="col" onclick="sortTable(0)">SNo.</th>
                  <th scope="col" onclick="sortTable(1)">Roll No.</th>
                  <th scope="col" onclick="sortTable(2)">Name</th>
                  <th scope="col" onclick="sortTable(3)">DOB</th>
                  <th scope="col" onclick="sortTable(4)">Address</th>
                  <th scope="col" onclick="sortTable(5)">Email Id</th>
                  <th scope="col" onclick="sortTable(6)">Department</th>
                  <th scope="col" onclick="sortTable(7)">Faculty Id</th>
                  <th scope="col" onclick="sortTable(8)">CGPA</th>
                  <th scope="col" onclick="sortTable(9)">Year of passing</th> 
                  <th scope="col" onclick="sortTable(10)">Hostel</th>     
                  <th scope="col" onclick="sortTable(11)">Parent's Name</th>
                  <th scope="col" onclick="sortTable(12)">Parent's Contact</th>
                  <th scope="col" onclick="sortTable(13)">Guardian Name</th>
                  <th scope="col" onclick="sortTable(14)">Guardian's Contact</th>
                  <th scope="col" onclick="sortTable(15)">Placement Status</th>
                  <th scope="col" onclick="sortTable(16)">Placement Company</th>
                  <th scope="col" onclick="sortTable(17)">CTC(in lakhs)</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include 'partials/_dbconnect.php';
                  $session_id = session_id();
                  $sql = "SELECT * FROM  `studinfo`";
                    
                  if($session_id == 1)
                  {
                    $name = $_SESSION['username'];
                    $fid = "Select facultyid from fa where username = '$name'";
                    $res = mysqli_query($conn,$fid);
                    $col = mysqli_fetch_assoc($res);
                    $id = $col['facultyid'];
                  }
                  else if($session_id == 2)
                  {
                    $sname =$_SESSION['username']; 
                  }
                  $result = mysqli_query($conn,$sql);
                  $sno=0;
                  $cnt=0;
                  while($row = mysqli_fetch_assoc($result)){
                    if($session_id == 1)
                    {
                      if($id == $row['facultyid']){
                        $sno++;
                        echo "<tr>
                                <th scope='row'>$sno</th>
                                <td class='roll_no'>". $row['Roll_No'] ."</td>
                                <td>". $row['Name'] ."</td>
                                <td>". $row['dob'] ."</td>
                                <td>". $row['address'] ."</td>
                                <td>". $row['email_id'] ."</td>
                                <td>". $row['department'] ."</td>
                                <td>". $row['facultyid'] ."</td>
                                <td>". $row['cgpa'] ."</td>
                                <td>". $row['year_of_passing'] ."</td>
                                <td>". $row['hostel'] ."</td>
                                <td>". $row['parent_name'] ."</td>
                                <td>". $row['ph_no'] ."</td>
                                <td>". $row['guardian'] ."</td>
                                <td>". $row['guardian_number'] ."</td>
                                <td>". $row['placement_status'] ."</td>
                                <td>". $row['placed_company'] ."</td>
                                <td>". $row['ctc(in lakhs)'] ."</td>
                                <td>
                                  <a href='#' class='badge badge-dark view_btn'>Company history</a>
                                
                                </td>
                              </tr>";
                      }
                    } 
                    else if($session_id == 2)
                    {
                      if($sname == $row['Roll_No']){
                        $cnt++;
                        echo "<tr>
                                <th scope='row'>$cnt</th>
                                <td>". $row['Roll_No'] ."</td>
                                <td>". $row['Name'] ."</td>
                                <td>". $row['dob'] ."</td>
                                <td>". $row['address'] ."</td>
                                <td>". $row['email_id'] ."</td>
                                <td>". $row['department'] ."</td>
                                <td>". $row['facultyid'] ."</td>
                                <td>". $row['cgpa'] ."</td>
                                <td>". $row['year_of_passing'] ."</td>
                                <td>". $row['hostel'] ."</td>
                                <td>". $row['parent_name'] ."</td>
                                <td>". $row['ph_no'] ."</td>
                                <td>". $row['guardian'] ."</td>
                                <td>". $row['guardian_number'] ."</td>
                                <td>". $row['placement_status'] ."</td>
                                <td>". $row['placed_company'] ."</td>
                                <td>". $row['ctc(in lakhs)'] ."</td>
                                <td><button class='edit btn btn-sm btn-dark' id = ".$row['sno'].">Edit</button></td>
                              </tr>";
                      }
                    } 
                  } 
                ?>
                <?php
                  if($session_id == 2){
                    if($cnt ==  0){
                      echo "<p class='mb-0' style='text-align:center'> <a href = '/FA/student_info_form.php'> Add Your Details - Student Information</p>";
                    }
                  }
                ?>
              </tbody>
            </table>  
          </div>
        </div>

        <div id="myAverage">
          <?php
            $session_id = session_id();
            if($session_id == 1){
              $sql2 = "SELECT SUM(`cgpa`),SUM(`ctc(in lakhs)`),AVG(`cgpa`),AVG(`ctc(in lakhs)`) FROM  `studinfo` where `facultyid`=$id";
              $res2 = mysqli_query($conn,$sql2);
              $col2 = mysqli_fetch_assoc($res2);
              $sum_cgpa = $col2['SUM(`cgpa`)'];
              $sum_ctc = $col2['SUM(`ctc(in lakhs)`)'];
              $avg_cgpa = $col2['AVG(`cgpa`)'];
              $avg_ctc = $col2['AVG(`ctc(in lakhs)`)'];
              echo "<br>";
              echo "<div>";
              echo "  <b>Average CGPA :</b>". $avg_cgpa. "  <br />";
              echo "  <b>Average CTC(in Lakhs) :</b>". $avg_ctc. "  <br />";
              echo "</div>";
            }
          ?>
        </div>

      </div>
      <div class="text-center">
        <br>
        <!--<a class="btn btn-primary button" href = "/FA/testpdf2.php" role="button">Generate PDF</a>-->
        <input class="btn btn-dark button col-sm-1"  type='button' id='btn' value='Print' onclick='printDiv();'>
      </div>
      <br><br><br><br><br><br><br><br><br>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function () {
        $('.view_btn').click(function (e) { 
          e.preventDefault();
          var roll_no= $(this).closest('tr').find('.roll_no').text();
          //console.log(roll_no);
          $.ajax({
            type: "POST",
            url: "companies.php",
            data: {
                  'checking_viewbtn': true,
                  'roll_num': roll_no,
            },
            success: function (response) {
              //console.log(response); 
              $('.companies_viewing_data').html(response);
              $('#companiesVIEWModal').modal('show');
            }
          });
        });
      });
    </script>
      
    <script>
      edits=document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click",(e)=>{
          console.log("edit ",e);
          tr = e.target.parentNode.parentNode;
          Roll_No=tr.getElementsByTagName("td")[0].innerText;
          Name=tr.getElementsByTagName("td")[1].innerText;
          dob=tr.getElementsByTagName("td")[2].innerText;
          cgpa=tr.getElementsByTagName("td")[7].innerText;
          address=tr.getElementsByTagName("td")[3].innerText;
          placement_status=tr.getElementsByTagName("td")[14].innerText;
          placed_company=tr.getElementsByTagName("td")[15].innerText;
          ctc=tr.getElementsByTagName("td")[16].innerText;
          department=tr.getElementsByTagName("td")[5].innerText;
          year_of_passing=tr.getElementsByTagName("td")[8].innerText;
          email_id=tr.getElementsByTagName("td")[4].innerText;

          parent = tr.getElementsByTagName("td")[10].innerText;
          mobile = tr.getElementsByTagName("td")[11].innerText;
          hostel = tr.getElementsByTagName("td")[9].innerText;
          guardian = tr.getElementsByTagName("td")[12].innerText;
          guardian_number = tr.getElementsByTagName("td")[13].innerText;
          facultyid=tr.getElementsByTagName("td")[6].innerText;

          RollnoEdit.value=Roll_No;
          nameEdit.value=Name;
          dateEdit.value=dob;
          cgpaEdit.value=cgpa;
          addressEdit.value=address;
          placement_statusEdit.value=placement_status;
          placement_companyEdit.value=placed_company;
          ctcEdit.value=ctc;
          departmentEdit.value=department;
          yearofpassingEdit.value=year_of_passing;
          emailidEdit.value=email_id;
          facultyidEdit.value=facultyid;
          parentEdit.value = parent;
          mobileEdit.value = mobile;
          hostelEdit.value = hostel;
          guardianEdit.value = guardian;
          guardian_numberEdit.value = guardian_number;
      
          snoEdit.value = e.target.id;

          console.log(e.target.id);
          $('#editmodal').modal('toggle');
        })
      })
    </script>

    <!-- PDF or Print function -->
    <script>
      function printDiv()
      {
        var divToPrint=document.getElementById('DivIdToPrint');
        var mywindow = window.open('', 'Print Window');
        mywindow.document.write('<html><head><title>Faculty Advisor Mentoring System</title>');
        mywindow.document.write('<link rel="stylesheet" href="http://www.dynamicdrive.com/ddincludes/mainstyle.css" type="text/css" />');
        mywindow.document.write('<link rel = "icon" href ="logo.png"  type = "image/x-icon">   </head><body >');
        mywindow.document.write('<style>');
        mywindow.document.write(' .myDiv table{');
        mywindow.document.write('    font-size: 10px;'); //customize so that your page fits
        mywindow.document.write(' }');
        mywindow.document.write(' .myDiv table, th, td {');
        mywindow.document.write('   border: 1px solid #ddd;');
        mywindow.document.write('   border-collapse: collapse;');
        mywindow.document.write(' }');
        mywindow.document.write('</style>');
        mywindow.document.write('<body><div class="myDiv">'+divToPrint.innerHTML+'</div>');
        mywindow.document.write('</body></html>');

        //----code to inject style to the new document: so that always the 'Landscape' mode is selected for Print preview
        var css = '@page { size: landscape; }',
            head = mywindow.document.head || mywindow.document.getElementsByTagName('head')[0],
            style = mywindow.document.createElement('style');
        style.type = 'text/css';
        style.media = 'print';
        if (style.styleSheet){
          style.styleSheet.cssText = css;
        } 
        else {
          style.appendChild(mywindow.document.createTextNode(css));
        }
        head.appendChild(style);
        //----------------------------------

        mywindow.print();
        mywindow.close();
        setTimeout(function(){mywindow.close();},10);
      }
    </script> 

    <!-- Cursor for Sorting on Headers -->
    <style>th {cursor: pointer;}</style>
    <!-- Sorting with Headers function -->
    <script>
      function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0,xcheck,ycheck;
        table = document.getElementById("myTable");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc"; 
        /*Make a loop that will continue until no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.rows;
          // console.log(rows[1]);
          // console.log(rows[1].getElementsByTagName("TD"));
          /*Loop through all table rows (except the first, which contains table headers):*/
          for (i = 1; i < (rows.length - 1); i++) {
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare, one from current row and one from the next:*/
            if (n==0)//Sno is of TH tag. Rest columns are of TD tag
            { x = rows[i].getElementsByTagName("TH")[n];
              y = rows[i + 1].getElementsByTagName("TH")[n];
            }
            else
            { x = rows[i].getElementsByTagName("TD")[n-1];
              y = rows[i + 1].getElementsByTagName("TD")[n-1];
            }
            
            /*check if the two rows should switch place, based on the direction, asc or desc:*/
            if( n==0 || n==8 | n==17)//numerical comparison
            { xcheck = Number(x.innerHTML);
              ycheck = Number(y.innerHTML);
            }
            else if (n==3 || n==9)//date comparison
            { xcheck = new Date(x.innerHTML);
              ycheck = new Date(y.innerHTML);
            }
            else //string comparison
            { xcheck = x.innerHTML.toLowerCase();
              ycheck = y.innerHTML.toLowerCase();
            }
            if (dir == "asc") {
              if (xcheck > ycheck) {
                //if so, mark as a switch and break the loop:
                shouldSwitch= true;
                break;
              }
            } 
            else if (dir == "desc") {
              if (xcheck < ycheck) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount ++;      
          } 
          else {
            /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }
    </script>


    <!--Search Function Styling-->
    <style>
      .myInput {
        background-image: url('searchicon.png');
        background-size: 20px 20px;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 19.5%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
      }
    </style>

    <!--Search Function & Changing average -->
    <script>
      function mySearchFunction() {
        var input, filter, table, tr, td, i, txtValue, n;

        var myCount = "<?php echo $sno; ?>";
        var mySumCgpa = "<?php echo $sum_cgpa; ?>";
        var mySumCtc = "<?php echo $sum_ctc; ?>";
        var avgElement = table = document.getElementById("myAverage");
        
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
          tr[i].style.display = "";

          for (n=0;n<17;n++)
          {
            td = tr[i].getElementsByTagName("td")[n];
            if (td) {
              txtValue = td.textContent || td.innerText;
              input = document.getElementById("myInput"+n);
              filter = input.value.toUpperCase();
              if (!(txtValue.toUpperCase().indexOf(filter) > -1))
              { tr[i].style.display = "none";
                // console.log(tr[i].getElementsByTagName("td")[7].innerText);
                // console.log(tr[i].getElementsByTagName("td")[16]);
                mySumCgpa = mySumCgpa - tr[i].getElementsByTagName("td")[7].innerText;
                mySumCtc = mySumCtc - tr[i].getElementsByTagName("td")[16].innerText;
                myCount = myCount-1;
                // console.log(myCount+" "+mySumCgpa);
                break;
              } 
            } 
          }      
        }

        var myAvgCgpa = mySumCgpa / myCount;
        var myAvgCtc = mySumCtc / myCount;
        avgElement.innerHTML = `<br>
                                <div>
                                  <b>Average CGPA :</b>`+myAvgCgpa+`  <br />
                                  <b>Average CTC(in Lakhs) :</b>`+myAvgCtc+`  <br />
                                </div>`;
      }
    </script>

  </body>
</html>