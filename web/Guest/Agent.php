<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Assets/Template/Form/form.css">
    <style>
        body{
            margin: 0;
        }
    </style>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
		$name=$_POST["txt_name"];
		$address=$_POST["txt_address"];
		$contact=$_POST["txt_contact"];
		$email=$_POST["txt_email"];
		$password=$_POST["txt_password"];
		$district=$_POST["sel_district"];
        $place=$_POST["sel_place"];
		
		$photo=$_FILES["txt_photo"]["name"];
		$path=$_FILES["txt_photo"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/Agent/".$photo);
		$proof=$_FILES["txt_proof"]["name"];
		$path1=$_FILES["txt_proof"]["tmp_name"];
		move_uploaded_file($path1,"../Assets/Files/Agent/".$proof);
		
		
		
		
		$insQry="insert into tbl_agent(agent_name,agent_address,agent_contact,agent_email,agent_password,agent_photo,agent_proof,place_id)values('".$name."','".$address."','".$contact."','".$email."','".$password."','".$photo."','".$proof."','".$place."')";
		if($Conn->query($insQry))
		{
			?>
        	<script>
			alert("data inserted!!");
			window.location="Agent.php";
			</script>
   		 	<?php
    	}

}
?>
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
 
    <div id="background">
        <div id="tab" align="center">
            <table border="0">
                <tr>
                    <th>
                        Name
                    </th>
                    <td>
                        <input type="text" name="txt_name" id="txt_name" required
                            title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
                            pattern="^[A-Z]+[a-zA-Z ]*$">
                    </td>
                </tr>
                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        <input type="email" name="txt_email" id="txt_email" required>
                    </td>
                </tr>
                <tr>
                    <th>
                        Contact
                    </th>
                    <td>
                        <input type="text" name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" required
                            title="Phone number with 7-9 and remaing 9 digit with 0-9">
                    </td>
                </tr>
                
                <tr>
                    <th>
                        Address
                    </th>
                    <td>
                        <textarea name="txt_address" id="txt_address" required cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>
                        District
                    </th>
                    <td>
                        <select name="sel_district" id="sel_district" onchange="getplace(this.value)" required>
                            <option value="">Select District</option>
                            
                            <?php
		   $selqry="select * from tbl_district";
		   $result1=$Conn->query($selqry);
		   while($row=$result1->fetch_assoc())
		   {
			   ?>
               <option value="<?php  echo ($row['district_id']);?>"><?php  echo ($row['district_name']);?></option>
               <?php
		   }
		   ?>
                             
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>
                        Place
                    </th>
                    <td>
                        <select name="sel_place" id="sel_place" required>
                            <option value="">Select Place</option>
                            
                            
                             
                            
                        </select>
                    </td>
                </tr>
                <tr>
                <th>
                    Upload Photo
                </th>
                <td>
                    <input type="file" name="txt_photo" id="txt_photo2" required>
                </td>
                </tr>
                <tr>
                <th>
                    Upload Proof
                </th>
                <td>
                    <input type="file" name="txt_proof" id="txt_proof2" required>
                </td>
                </tr>
                <tr>
                    <th>
                        Password
                    </th>
                    <td>
                        <input type="password" name="txt_password" id="txt_password" required type="text"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    </td>
                </tr>
                
               
                <tr>
                    <td colspan=2 align="center">
                        <input type="submit" value="Register" name="btn_save" id="btn_save" >
                   
                        <input type="reset" value="Cancel" name="btncancel" id="btncancel">
                    </td>
                </tr>
            </table>
        </div>
    </div>

</form>
</body>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getplace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/Ajaxplace.php?did="+did,
	  success: function(html){
		$("#sel_place").html(html);
	  }
	});
}
</script>

</html>