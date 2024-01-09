   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>

    $(document).ready(function(){

    $(".button").click(function(){

    $.ajax({

    type:"POST",

    url: "<?php echo site_url('add_employee/add_employee_data');?>",

    data:$("#myForm").serialize(),

    success: function (dataCheck) {

    //alert(dataCheck);

    $('.sort').append(dataCheck);

    //window.location.reload();},

    });});});

    </script>

    <div id="container">

    <div class="shell">

    <div id="main">

    <div class="cl">&nbsp;</div>

    <div id="content">

    <!-- Box -->

    <div class="box">

    <!-- Box Head -->

    <div class="box-head">

    <h2 class="left">Add Employee Record</h2>

    <div class="right">

    <label></label>

    </div>

    </div>

    <div class="table">

    <form name="emp" action="" onsubmit="return validate_form();" method="post" id="myForm">

    <table class="" align="center" width="100%" cellspacing="2" cellpadding="2">

    <tr>

    <td>Employee ID<span style="color:red">*</span></td>

    <td>

    <input type="text" value="" name="emp_id" class="field small-field">

    </td>

    </tr>

    <tr>

    <td>Employee Name<span style="color:red">*</span></td>

    <td>

    <input type="text" value="" name="emp_name" class="field small-field">

    </td>

    </tr>

    <tr>

    <td>Gender</td>

    <td>

    <select name="emp_gender" class="field">

    <option value="Male">Male</option>

    <option value="Female">Female</option>

    </select>

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Marital Status</td>

    <td width="57%">

    <select name="emp_status" class="field">

    <option value="Single">Single</option>

    <option value="Married">Married</option>

    <option value="Divorced">Divorced</option>

    </select>

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Address</td>

    <td width="57%">

    <textarea rows="4" maxlen="200" name="address" cols="20"></textarea>

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Mobile Number</td>

    <td width="57%">

    <input type="text" value="" onkeypress="return isNumberKey(event)" name="emp_mobile_no" class="field small-field">

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Home Number</td>

    <td width="57%">

    <input type="text" value="" onkeypress="return isNumberKey(event)" name="emp_home_no" class="field small-field">

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Designation</td>

    <td width="57%">

    <select name="emp_designation" class="field">

    <option value="HR">HR</option>

    <option value="PHP Developer">PHP Developer</option>

    <option value="Web Designert">Web Designer</option>

    <option value="SEO">SEO</option>

    <option value="Project Manager">Project Manager</option>

    <option value="Bidding">Bidding</option>

    </select>

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Work Email<span style="color:red">*</span></td>

    <td width="57%">

    <input type="text" value="" name="w_email_id" class="field small-field">

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Private Email<span style="color:red">*</span></td>

    <td width="57%">

    <input type="text" value="" name="p_email_id" class="field small-field">

    </td>

    </tr>

    <tr>

    <td align="left" valign="top" width="41%">Joining Date<span style="color:red">*</span></td>

    <td width="57%">

    <input type="text" class="datepicker" name="join_date" class="field small-field">

    </td>

    </tr>

    <tr>

    <td colspan="2">

    <p align="center">

    <input type="button" class="button" value="submit" />

    <input type="reset" value=" Reset All" class="button" name="B5">

    </td>

    </tr>

    </table>

    </form>

    </div>

    </div>

    </div>

    </div>

    <div id="sidebar">

    <div class="box">

    <div class="box-head">

    <h2>Employee List</h2>

    </div>

    <div class="sort" id="show">

    <br>

    </div>



