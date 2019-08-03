<!DOCTYPE html>
<html>
<body onload="window.print()">
<style >


.tableStyle {
    border: hidden;
    width: 100%;


}
	table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
</style>
<table  width="100%" >
	<tbody>
	<tr>
		<td width="10%">Name</td>
		<td colspan="2">
			<table  class="tableStyle" >
				<tr>
					<td><label> Family Name</label></td>
			</tr>
			<tr>
			<td>{{$dsin->lastname}}</td>
			</tr></table>
		</td>
		
		<td colspan="2">
			<table  class="tableStyle">
				<tr>
					<td>Given Name</td>
			</tr>
			<tr>
			<td>{{$dsin->firstname}}</td>
			</tr></table>
		</td>
		
	</tr>


<tr>

		<td>Day of birth</td>
		
		<td width="40%">
<table class="tableStyle">
			<TR>
				<td width="100%">Year - Month - Day</td>
			</TR>
			<tr>
				<td>
				{{$dsin->birthday}}
			</td>
			</tr>
		</table>
	</td>
		<td>Home Address</td>
		<td >
			
			<table  class="tableStyle">
				<tr>
					<td>Country</td>
			</tr>
			<tr>
			<td>{{$dsin->country}}</td>
			</tr></table>
		</td>
		<td colspan="2">
			
			<table  class="tableStyle">
				<tr>
					<td>City</td>
			</tr>
			<tr>
			<td>{{$dsin->city}}</td>
			</tr></table>
		</td>
		

	</tr>	

	<tr>
		<td rowspan="2">Purpose of Visit</td>
		<td rowspan="2" colspan="2">
			
			<input type="checkbox"  name="Tourism" <?php if($dsin->purpose==1) {?> checked="checked"<?php } ?>>Tourism
			<input type="checkbox"  name="Business"<?php if($dsin->purpose==2) {?> checked="checked"<?php } ?>>Businenss
			<input type="checkbox"  name="Visting relatives"<?php if($dsin->purpose==3) {?> checked="checked"<?php } ?>>Visiting relatives<br>
			&emsp;Orthers
			(&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;)
		</td>
		<td >Last fight No/Vessel</td>
		<td colspan="2">	{{$ttchung->flightno}}</td>
		
	</tr>


	<tr>
		<td>Intended length of Stay</td>
		<td colspan="2">{{$ttchung->day}}</td>
		
	</tr>

	<tr>
		<td>Intended Address</td>
		<td colspan="2">{{$ttchung->adress}}</td>
		<td>Tel</td>
		<td>{{$ttchung->phone}}</td>
	</tr>
	<tr>
		<td colspan="5">
			<table width="100%">
				<tr>
					<td  colspan="2">Check the boxes for the applicable answer to the questions on the back side</td>
				</tr>
				<tr>
					<td>1.	Any history of receiving a deportation order or refusal of entry into Japan</td>
					<td>
						<input type="checkbox"  name="yes" <?php if($dsin->option1==1) {?> checked="checked"<?php } ?>>Yes
						<input type="checkbox"  name="no"<?php if($dsin->option1==0) {?> checked="checked"<?php } ?>>No
					</td>
				</tr>
				<tr>
					<td>2.	Any history of being convicted of a crime(not only in Japan)</td>
					<td>
						<input type="checkbox"  name="yes"<?php if($dsin->option2==1) {?> checked="checked"<?php } ?>>Yes
						<input type="checkbox"  name="no"<?php if($dsin->option2==0) {?> checked="checked"<?php } ?>>No
					</td>
				</tr>
				<tr>
					<td>3.	Possession of controllled substrances,guns,bladed weapons, or gunpowder</td>
					<td>
						<input type="checkbox"  name="yes"<?php if($dsin->option3==1) {?> checked="checked"<?php } ?>>Yes
						<input type="checkbox"  name="no"<?php if($dsin->option3==0) {?> checked="checked"<?php } ?>>No
					</td>
				</tr>
			</table>
		</td>
	</tr>
</tbody>
</table>

</body>

</html>
