<?php
	
	/*
	echo "<br>This Product is now available. <br><br> You can directly purchase this product with following link";
	
	?>
	
	<a href="<?php echo $this->webroot.'buyshops/product_details/'.$email_unavailable_product['product']['id']; ?>"><?php echo $email_unavailable_product['product']['prodname']; ?></a>
	
	<?php
	
	echo "<br><h4>Product Details</h4>:-";
	
	echo "<br>".$email_unavailable_product['product']['prodname'];
	echo "<br>".$email_unavailable_product['product']['prodscdes'];	
	echo "<br>".$email_unavailable_product['product']['proddesc'];
	
	echo "<br>".$email_unavailable_product['attribute_master']['attname'];
	echo "<br>".$email_unavailable_product['attribute_value']['attvalue'];	
	*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.text14_white{
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	color:#ffffff;
	text-decoration:none;
}
.text12_black{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	color:#000000;
	font-weight:normal;
	text-decoration:none;
}
.text18_blue{
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px;
	color:#0165a1;
	font-weight:normal;
	text-decoration:none;
}
.text13_gray{
	font-family:Arial, Helvetica, sans-serif;
	font-size:13px;
	color:#434343;
	font-weight:normal;
	text-decoration:none;
}
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" style="border:2px solid #ececec">
  <tr>
    <td height="100" align="center" valign="middle"><img src="http://projects.sibzsolutions.net/onlyhuman/human/img/logo.jpg" width="382" height="56" alt="logo" /></td>
  </tr>
  <tr>
    <td height="31" align="center" valign="middle" bgcolor="#0866e4" class="text14_white"><strong>Only Human</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  
  <tr>
	  <tr>
        <td height="41" align="left" valign="top" class="text18_blue"><strong>Dear Customer<br><br> This Product is now available. <br><br>You can directly purchase this product with following link.</strong><br><br><a href="<?php echo $this->webroot.'buyshops/product_details/'.$email_unavailable_product['product']['id']; ?>"><?php echo $email_unavailable_product['product']['prodname']; ?></a></td>
      </tr>
	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br><h4>Product Details:- </h4>"; ?></td>
      </tr>
	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Product Name:- ".$email_unavailable_product['product']['prodname'];?></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Short Description:- ".$email_unavailable_product['product']['prodscdes'];	?></td>
      </tr>
      <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br>Description:- ".$email_unavailable_product['product']['proddesc'];?></td>
      </tr>
	  
	 <tr>
        <td align="left" valign="top">&nbsp;<?php //echo "<br>".$email_unavailable_product['attribute_master']['attname']." -  ".$email_unavailable_product['attribute_value']['attvalue']; ?></td>
      </tr>
	  <tr>
		<td align="left" valign="top">&nbsp;</td>
      </tr>
      <tr>
		<td align="left" valign="top">&nbsp;Link:- <a href="<?php echo $this->webroot.'buyshops/product_details/'.$email_unavailable_product['product']['id']; ?>"><?php echo $email_unavailable_product['product']['prodname']; ?></a></td>
      </tr>
	  <tr>
        <td align="left" valign="top">&nbsp;<?php echo "<br><h4> Thanx for showing the response with us.. </h4>"; ?></td>
      </tr>

  </table>
    </td>
  </tr>
  
  <tr>
    <td align="left" valign="top" bgcolor="#efefef" style="padding:30px 20px; font-size:12px;" class="text12_black">
      This email was sent from a notification-only address that cannot accept incoming email. Please do not reply to this 
message. 
<br />
<br />
If you need to contact us about your order, Please mail us at <span style="color:#4188df">Only Human</span> for any assistance. 
<br />
<br />
Please note that this e-mail only acknowledges that we have received a request for a quotation from you the client. Neither propertypriceindex.com nor any of its affiliates are deemed to have a binding contract with the client at this point.
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#111111" class="text12_black" style="color:#ffffff; padding:10px;">&copy; 2015 onlyhumansportswear. All Rights Reserved.</td>
  </tr>
</table>
</body>
</html>
<?php
	
	//die();
	
?>