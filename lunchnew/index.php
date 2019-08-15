<?php
include 'config/config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $employeesql = "SELECT employee_name FROM employees WHERE employeestatus = 'Active'";
    $employeelist = $conn->prepare($employeesql);
    $employeelist->execute();
    $listresult = $employeelist->fetchAll(PDO::FETCH_ASSOC);

    $employeeupdatesql = "SELECT id,employee_name FROM employees";
    $employeeupdatelist = $conn->prepare($employeeupdatesql);
    $employeeupdatelist->execute();
    $updateresult = $employeeupdatelist->fetchAll(PDO::FETCH_ASSOC);

}
catch(PDOException $e) {
      echo "Error: " . $e->getMessage();            
  }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Lunch Voucher</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  
  
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url("http://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
}

body {
  font: 14px/1 'Open Sans', sans-serif;
  color: #555;
  background: #eee;
}

h1 {
  padding: 50px 0;
  font-weight: 400;
  text-align: center;
}

p {
  margin: 0 0 20px;
  line-height: 1.5;
}

main {
  min-width: 320px;
 max-width: 650px;
  padding: 50px;
  margin: 0 auto;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}

label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

label[for*='1']:before {
  content: '\f1cb';
}

label[for*='2']:before {
  content: '\f17d';
}

label[for*='3']:before {
  content: '\f16b';
}

label[for*='4']:before {
  content: '\f1a9';
}



label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid orange;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }

  label:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}

    </style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <h1>IS LUNCH</h1>
  <img src = "images/IS_Logo.jpg" style="height: 100px; margin-left: 600px">
<main>
  
  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">Add Employee</label>
    
  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">Generate Voucher</label>
    
  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Display Voucher</label>
    
  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">Deactivate/Reactivate Employee</label>
    
  <section id="content1">
    <form id="employee_add" method="post"> 
      <div class="form-group">
        <label for="employee_name">Name:</label>
        <input type="text" class="form-control" id="employee_name" name="employee_name">
      </div>

      <div class="form-group">
        <label for="status">Status:</label>
        <select class="form-control" id="status" name="status">
          <option>Active</option>
          <option>Inactive</option>
        </select>
      </div>
      

      <div class="form-group">
        <input type="button" class="btn btn-primary" id="add_emp" value="Add">
      </div>
      </form>
      
      
  </section>


  <section id="content2">
    <form id="gen_voucher" method="post">
      <div class="form-group">
        <label for="date_begin">Date Begin:</label>
        <input type="date" class="form-control" id="date_begin" name="date_begin">
      </div>

      <div class="form-group">
        <label for="date_end">Date End:</label>
        <input type="date" class="form-control" id="date_end" name="date_end">
      </div>

      <div class="form-group">
        <label for="number_days">Number of Days:</label>
        <input type="number" class="form-control" id="number_days" name="number_days">
      </div>

      <div class="form-group">
         <label for="color_voucher">Color:</label>
         <input type="color" class="form-control" id="color_voucher" name="color_voucher">
      </div>
      
      
      <div class="form-group">
        <input type="button" class="btn btn-primary" id="vouch_gen" name="vouch_gen" value="Generate">
      </div>
      </form>
      
      <h2>Custom Generation</h2>
      <form id="custom_gen" method="post">
          <div class="form-group">
              <label for="name_select">Name:</label>
              <select class="form-control" id="customname_select" name="customname_select">
                  <option>Select a name</option>
                  <?php
                  foreach($listresult as $listrow){
                    echo '<option value="'.$listrow['employee_name'].'">'.$listrow['employee_name'].'</option>';
                  }                       
                  ?>
              </select>
          </div>

          <div class="form-group">
              <label for="date_begin">Date Begin:</label>
              <input type="date" class="form-control" id="customdate_begin" name="customdate_begin">
          </div>

          <div class="form-group">
              <label for="date_end">Date End:</label>
              <input type="date" class="form-control" id="customdate_end" name="customdate_end">
          </div>

          <div class="form-group">
              <label for="number_days">Number of Days:</label>
              <input type="number" class="form-control" id="customnumber_days" name="customnumber_days">
          </div>

          <div class="form-group">
              <label for="color_voucher">Color:</label>
              <input type="color" class="form-control" id="customcolor_voucher" name="customcolor_voucher">
          </div>

          <div class="form-group">
              <input type="button" class="btn btn-primary" id="customvouch_gen" name="customvouch_gen" value="Generate">
          </div>
      </form>



  </section>


  <section id="content3">
    <form id="display_voucher" method="post" action="scripts/voucher.php">
    <div class="form-group">
      <label for="voucher_period">Time Period:</label>
      <input type="month" class="form-control" id="voucher_period" name="voucher_period">
    </div>

    <!--div class="form-group">
        <label for="num_per_page">Numbers per page</label>
        <input type="number" class="form-control" id="num_per_page" name="num_per_page">
    </div-->

    <div class="form-group">
      <input type="submit" class="btn btn-primary" id="vouch_disp" name="vouch_disp" value="Display"> 
    </div>
    </form>
  </section>



  <section id="content4">
    <form id="emp_update" method="post">
    <div class="form-group">
      <label for="name_select">Name:</label>
      <select class="form-control" id="name_select" name="name_select">
        <option>Select a name</option>
        <?php
          foreach($updateresult as $updaterow){
            echo '<option value="'.$updaterow['id'].'">'.$updaterow['employee_name'].'</option>';
          }                       
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="status_update">Status:</label>
      <select class="form-control" id="status_update" name="status_update">
        <option>Active</option>
        <option>Inactive</option>
      </select>
    </div>

    <div class="form-group">
      <input type="button" class="btn btn-primary" id="update_emp" value="Update">
    </div>
    </form>
  </section>
    
</main>
  
  
</body>
<script>
   $(document).ready(function(){
      $("#add_emp").click(function(){
        $.ajax({
          url:"scripts/addemployee.php",
          type:"post",
          data:$("#employee_add").serialize(),
          success:function(d)
          {
            alert(d);
            $("#employee_add")[0].reset();
          }
        });
      });
   });

   $(document).ready(function(){
      $("#vouch_gen").click(function(){
        $.ajax({
          url:"scripts/generatevoucher.php",
          type:"post",
          data:$("#gen_voucher").serialize(),
          success:function(d)
          {
            alert(d);
            $("#gen_voucher")[0].reset();
          }
        });
      });
   });

   $(document).ready(function(){
      $("#customvouch_gen").click(function(){
        $.ajax({
          url:"scripts/customgen.php",
          type:"post",
          data:$("#custom_gen").serialize(),
          success:function(d)
          {
            alert(d);
            $("#custom_gen")[0].reset();
          }
        });
      });
   });

   $(document).ready(function(){
      $("#update_emp").click(function(){
        $.ajax({
          url:"scripts/updaterecord.php",
          type:"post",
          data:$("#emp_update").serialize(),
          success:function(d)
          {
            alert(d);
            $("#emp_update")[0].reset();
          }
        });
      });
   });
    
</script>
</html>

