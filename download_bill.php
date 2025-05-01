<?php
session_start();
if(!isset($_SESSION['email']))
{
 echo "<script>window.location.href='main.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="html2pdf.bundle.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Document</title>
</head>
<style>
  .bill{
      width: 100%;
      /* margin-left: 20%; */
      height: 300px;
      margin-top: 30px;
  }
  .bill img{
      float: left;
  }
  .bill_header .span1
  {
      font-weight: bold;
      font-size: 18px;
      margin-left: 80%;
  }
  .bill_header .span2
  {
      font-weight: 100;
      margin-left: 60%;
  }
  .bill_adddress div:nth-child(1)
  {
      width: 20%;
      font-size: 17px;
      font-weight: 100;
      height: 20px;
      float: left;
  }
  .bill_adddress div:nth-child(2)
  {
      width: 300%;
      font-size: 17px;
      font-weight: 100;
      height: 20px;
      margin-left: 70%;
  }
  .customer_data span:nth-child(1)
  {
      margin-left: 30px;
      font-size: 18px;
  }

  .customer_data span:nth-child(2)
  {
      margin-left: 300px;
      font-size: 18px;
  }

  .customer_data span:nth-child(3)
  {
      margin-left: 190px;
      font-size: 18px;
      border-style:solid;
  }
  table th{
      width: 10%;
  }
  table{
      border: 1px solid black;
  }
  table th {
      border-bottom: 1px solid black;
      border-right: solid 1px black;
  }

  .customer_data1 span:nth-child(1)
  {
      margin-left: 74%;
      font-size: 18px;
  }

  .customer_data2 span:nth-child(1)
 {
    margin-left: 76%;
    font-size: 18px;
 } 


</style>
<body style="font-family:verdana;">
    

    <?php
    
    include("connection.php");
    $o_id = $_REQUEST['o_id'];
    $sql="SELECT * from order_data where o_id=$o_id";
    $result=mysqli_query($con,$sql);
    $a=mysqli_fetch_array($result);
    $get_c_id=$a['c_id'];
    $get_p_id=$a['p_id'];
    
    $sql1="SELECT * from c_login where c_id='$get_c_id'";
    $result1=mysqli_query($con,$sql1);
    $b=mysqli_fetch_array($result1);
    
    $sql2="SELECT * from a_product where p_id='$get_p_id'";
    $result2=mysqli_query($con,$sql2);
    $c=mysqli_fetch_array($result2);
    
    $sql3="SELECT * from address where c_id='$get_c_id'";
    $result3=mysqli_query($con,$sql3);
    $d=mysqli_fetch_array($result3);
    ?>
<div id="bill">
<div   class="bill">
       
<h1>Mobile Store</h1>
    
        
            <hr>
        <div class="customer_data">
            <span><b>Invoice No :</b><?php echo $a['o_id']; ?></span>
            <span><b>Customer Name :</b><?php echo $b['username']; ?></span>
            <span><b>Order No : </b><?php echo $a['o_id']; ?></span>
        </div>
        <hr style="border-style: dashed;" >
        <div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Description</th>
                    <th>Mrp</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Total Amount</th>
                </tr>

                <tr>
                    <th>1</th>
                    <?php
                    /*$get_total = $a['quantity'] * $a['price'];
                    $get_total1=$a['quantity'] * $a['mrp'];
                    $get_disc=$a['mrp'] - $a['price'];
                    $total_disc=$a['quantity'] * $get_disc;*/
                    ?>
                    <th><?php echo $a['p_name']; $get_name= $a['p_name'] ?></th>
                    <th><?php echo $a['mrp']; ?></th>
                    <th><?php echo $a['quantity']; ?></th>
                    <th><?php echo $a['price']; ?></th>
                    <th><?php echo $a['price']; ?></th>
                </tr>
            </table>
        </div>
</div>
    <hr style="border-style: dashed;" >
        <div class="customer_data">
            <span><b>Total Iteam :</b>01</span>
            <span><b>Total Qty : </b><?php echo $a['quantity']; ?></span>
            <span><b>Total Amount :</b><?php echo $a['price']; ?></span>
        </div>
        <!-- <div class="customer_data1">
            <span><b>Discount Amount(-)</b><?php /*echo $total_disc;*/ ?></span> 
        </div>-->
        <hr style="border-style: dashed;" >

        <div class="customer_data2">
            <span><b>Grand Total : </b><?php echo $a['price']; ?></span>
        </div>

        <hr style="border-style: dashed;" >
        <div style="font-weight: bold;">
            <center>
                <!-- <span>***Your Total Savings : Rs<?php /*echo $total_disc;*/ ?>***</span> -->
            </center>
        </div>

        <hr style="border-style: dashed;" >

        <div>
            <span style="text-decoration: underline;" >Declartion</span>
            <ul>
                <li>We declare that invoice shows the actual price of the goods described and that all particulars are true and correct</li>
                <li>This is computer generted invoice no signature required</li>
            </ul>
        </div>
 </div>

 <div>
       <center> <button class="btn btn-success" id="downloadBtn">Download Invoice</button></center>
</div>


<script>
    document.getElementById('downloadBtn').addEventListener('click',function(){var element=document.getElementById('bill');
        html2pdf(element,{margin:10,filename:'<?php echo $username  ?>',image:{type:'jpeg',quality:0.98},html2canvas:{scale:2},jsPDF:{unit:'mm',format:'a4',orientation:'Landscape'}});});
</script>
</body>
</html>