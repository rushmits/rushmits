
<DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Salary Slip</title>
<style>
	body{
		font-family: calibri;
	}
	.child_table tr td{
		width: 80px;
	}
</style>
</head>
<body style="margin: 0; padding:0; font-family: calibri; font-size: 15px;">

<table cellpadding="6" cellspacing="0" border="1" width="900px;" style="max-width: 100%; text-align: left;"  align="center">
	<tr>
		<td style="height: 80px; vertical-align: middle; ">
			<table cellpadding="0" cellspacing="0" border="0" width="100%" style="float: left;">
				<tr>
					<td> <img src="http://lbomm.netplus.co.in/admin_assets/img/logo.png" style="display: before; float: left; width: 110px;"/> </td>
					<td> 
						<ul style="margin: 0; padding:0; list-style-type: none; float: right;">
							<li>	Netplus Broadband Services (P) Ltd. </li>
							<li>	Vth Floor, H-Block, B.R.S. Nagar,  </li>
							<li>	Ferozpur Road, Ludhiana-141001,  </li>
							<li>	Punjab – INDIA </li>
						</ul>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td> Salary Statement for the month of : <strong> <?php echo date("M . Y"); ?> </strong> </td>
	</tr>
	<tr>
		<td>
			<table cellpadding="3" cellspacing="0" border="1" width="100%" style="text-align: left;">
				<tr>
					<th> Employee Name </th>
					<td>  <?php echo $emp->emp_name ?> </td>
					<th>Employee Code  </th>
					<td colspan="3"> <?php echo $emp->emp_code ?>  </td>
				</tr>	
				<tr>
					<th>Designation	</th>
					<td><?php echo $emp->designation ?>	</td>		
					<th>Bank Name </th>
					<td colspan="3"> <?php echo $emp->bank_name ?></td>	
				</tr>
				<tr>
					<th>Department	</th>
					<td><?php echo $emp->department ?>	</td>
					<th>Account No.	</th>
					<td colspan="3"> <?php echo $emp->acc_no ?>	</td>	
				</tr>
				<tr>
					<th> DOJ (dd/mm/yyyy) : </th>
					<td> <?php 
						echo $emp->doj;
					 ?>  </td>
					<th> Working Days :  </th>
					<td> <?php echo $emp->month_days ?>  </td>
					<th> Days Worked :  </th>
					<td> <?php echo $emp->paid_days ?> </td>
				</tr>
				<tr style="border: 2px solid red;">
					<th> Location </th>
					<td colspan="3"> <?php echo $emp->base_location ?> </td>	
					<td>  </td>
					<td>  </td>	
				</tr>
				<tr>
					<th> SALARY </th>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<th> AMOUNT </th>	
								<th> EARNED </th>	
								<th> AMOUNT  </th>	
							</tr>
						</table>
					</td>
					<th> DEDUCTIONS: </th>
					<th> AMOUNT </th>
					<td>  </td>
					<td>  </td>
				</tr>
				<tr>
					<td> Stipend </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td> <?php echo $emp->total_fix_salary ?> </td>	
								<td> Stipend </td>	
								<td>   <?php echo $emp->fix_salary_1 ?>  </td>	
							</tr>
						</table>
					</td>
					<td> TDS: </td>
					<td> <?php echo $emp->tds ?> </td>
					<td>  </td>
					<td>  </td>
				</tr>
				<tr>
					<td>  </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td>  </td>	
								<td> Arrear </td>	
								<td> <?php echo round( $emp->arrear, 2) ?> </td>	
							</tr>
						</table>
					</td>
					<td> Mobile Bill Excess: </td>
					<td> <?php echo $emp->mobile_bill ?>  </td>
					<td>  </td>
					<td>  </td>
				</tr>
				
				<tr>
					<td>  </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td>  </td>	
								<td>  </td>	
								<td>  </td>	
							</tr>
						</table>
					</td>
					<td> Advance</td>
					<td>  <?php echo $emp->advance ?> </td>
					<td>  </td>
					<td>  </td>
				</tr>
				
				<tr>
					<td>  </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td>   </td>	
								<td> </td>	
								<td>   </td>	
							</tr>
						</table>
					</td>
					<td>  Fine</td>
					<td>  <?php echo $emp->fine ?>   </td>
					<td>  </td>
					<td>  </td>
				</tr>
				
				<tr>
					<td>  </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td>   </td>	
								<td> Others </td>	
								<td>   <?php echo $emp->other + $emp->agent_of_month + $emp->fix_conveyance + $emp->ot_amount + $emp->bonus_incent_call_ctr + $emp->night_allowance ?> </td>	
							</tr>
						</table>
					</td>
					<td>   Exces Salary Recovery </td>
					<td>  <?php echo $emp->excess_sal_reco  ?>   </td>
					<td>  </td>
					<td>  </td>
				</tr>
				
				<tr>
					<td> Total </td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" width="100%" style="text-align: left;" class="child_table">
							<tr>
								<td> <?php echo $emp->total_fix_salary ?>    </td>	
								<td> Total </td>	
								<td> <?php echo $emp->total ?>    </td>	
							</tr>
						</table>
					</td>
					<td> Total Deductions:</td>
					<td>  <?php echo $emp->mobile_bill  + $emp->advance  + $emp->fine  + $emp->excess_sal_reco +$emp->tds  ?>   </td>
					<td> Net Pay </td>
					<td> <strong>  <?php echo $amount =   $emp->total - ($emp->mobile_bill  + $emp->advance  + $emp->fine  + $emp->excess_sal_reco +$emp->tds) . ".00"  ?>  </strong> </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td> <span style="color: blue"> Net Pay (In Words)  </span>  <span style="text-transform: lowercase"> <?php echo ucfirst( digit_to_words( $amount )); ?> only</span> </td>
	</tr>
	<tr>
		<td style="font-size:12px; text-align: center;"> This is a system generated document, requires no signature </td>
	</tr>
	
</table>

</body>
</html>