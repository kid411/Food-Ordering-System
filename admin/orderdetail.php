<?php
include_once("header.php")
?>

<?php
$conn=mysqli_connect("localhost","root","","project");

$oid=$_GET["oid"];
$uid=$_GET["uid"];


$qry="Select * from orders where oid='$oid'";
$result=$conn->query($qry);
$row=$result->fetch_assoc();
$doo=$row["doo"];


$qy="Select * from user where uid='$uid'";

$result=$conn->query($qy);
$sr="<table  class='table table-striped'>";
while($row=$result->fetch_assoc())
{   
    $fname=$row["fname"];
    $lname=$row["lname"];
    $address=$row["address"];
    $mail=$row["mail"];
    $username=$row["username"];
    $contact=$row["contact"];
    $doj=$row["doj"];
    $isonline=$row["isonline"];
    $lastseen=$row["lastseen"];
    $visitcount=$row["visitcount"];

}
$sr.="</table>";
echo $sr;

?>
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="widget-box transparent">
            <div class="widget-header widget-header-large">
                <h3 class="widget-title grey lighter">
                    <i class="ace-icon fa fa-leaf green"></i>
                    Customer Invoice
                </h3>

                <div class="widget-toolbar no-border invoice-info">
                    <span class="invoice-info-label" >Invoice:</span>
                    <span class="red"><?php echo $oid; ?></span>

                    <br>
                    <span class="invoice-info-label">Date:</span>
                    <span class="blue"><?php echo "$doo"; ?></span>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main padding-24">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
                                    <b>Customer Info</b>
                                </div>
                            </div>

                            <div>
                                <ul class="list-unstyled  spaced">
                                    <li>
                                        <i class="ace-icon fa fa-caret-right green"></i><?php echo "$fname $lname"; ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right green"></i><?php echo "$contact"; ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right green"></i><?php echo "$mail"; ?>
                                    </li>

                                    <li>
                                        <i class="ace-icon fa fa-caret-right green"></i>
                                        <?php echo "$address"; ?>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="space"></div>

                    <div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="center">Sr No.</th>
                                    <th>Product</th>
                                    <th class="hidden-xs">Quantity</th>
                                    <th class="hidden-480">Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                
                
                            $qry="Select * from orderdetail where oid='$oid'";
//echo $qry;


$result=$conn->query($qry);
$pqtotal=0;
$odid=0;
while($row=$result->fetch_assoc())
{
    
    $odid=$odid+1;
    $proname=$row["proname"];
    $price=$row["price"];
    $priceqty=$row["priceqty"];
    $pid=$row["pid"];
    $qty=$row["qty"];
    $pqtotal+=$priceqty;
    $str="<tr><td>$odid</td><td>$proname</td><td>$qty</td><td>$price</td><td>$priceqty</td></tr>";   
    echo $str;
}

?>
                            
                            </tbody>
                        </table>
                    </div>

                    <div class="hr hr8 hr-double hr-dotted"></div>

                    <div class="row">
                        <div class="col-sm-5 pull-right">
                            <h4 class="pull-right">
                                Total amount :
                                <span class="red"><?php echo $pqtotal; ?></span>
                            </h4>
                        </div>
                    </div>

                    <div class="space-6"></div>
                    <div class="well">
                    We value your trust and confidence in us and sincerely appreciate you! Your commitment as a customer is much appreciated.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once("footer.php")
?>