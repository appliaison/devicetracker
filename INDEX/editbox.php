
			<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">

			<!-- start of Type -->
			<tr>
				<th><a href="">Typex</a></th>
				<th><a href="">&nbsp;</a></th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
				
				<tr>	
				
				<td>
				<select name="hh_type" id="hh_type" tabindex="1">
				<option value="0">ANY</option>

				<?php

				$sql = "SELECT * FROM troubador_device.handheld_type ORDER BY Id ASC";
				
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				 
				 
				 
					echo "<option value='" . $fetch['type'] . "'>" . $fetch['type'] . "</option>\n";  
				   
				 
				 
				 
				 }
				
				?>
				
				</select>
				
				</td>
				<td></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of Type -->
			<!-- start of Location -->
			<tr>

				<th><a href="">Location</a></th>
				<th>&nbsp;</a></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th></tr>
				
				<tr>	
				
				<td>
					<select name="hh_location" id="hh_location" tabindex="2">
				<option value="0">ANY</option>

				<?php

				$sql = "SELECT * FROM troubador_device.location ORDER BY id ASC";
				
				$rs = mysql_query($sql, $connect);
				while ($fetch = mysql_fetch_assoc($rs))
				{
				 
					echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
						 if (strlen($handheld_location) > 0)
					{
					if ($_SESSION['hh_']	== $fetch['id'])
					{ 
					echo "<option value='" . $fetch['handheld_location'] . "'" . " selected" . ">" . $fetch['name'] . "</option>\n";  
					}
					else
					{
					echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
					}

					}
					else
					{
					echo "<option value='" . $fetch['id'] . "'>" . $fetch['name'] . "</option>\n";  
					}
		 			 
				 }
				
				?>
				
				</select>
				</td>
				<td></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of Location -->
			<!-- start of Assigned # -->
			<tr>

				<th><a href="">Assigned #</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
				</tr>
				<tr>	
				
				<th>
				<input value="" name="hh_assigned_num" size="20" class="edit" id="hh_assigned_num" type="text" tabindex="3">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Assigned # -->
			<!-- start of Revision # -->
			<tr>

				<th><a href="">Revision #</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>	
				</tr>
				<tr>	
				
				<th>
				<input value="" name="hh_revision_num" size="20" class="edit" id="hh_revision_num" type="text" tabindex="4">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Revision # -->
			<!-- start of PIN -->
			<tr>

				<th><a href="">PIN</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="" name="hh_pin" size="20" class="edit" id="hh_pin" type="text" tabindex="5">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of PIN -->

			<!-- start of IMEI -->
			<tr>

				<th><a href="">IMEI</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="" name="hh_imei" size="20" class="edit" id="hh_imei" type="text" tabindex="6">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of IMEI -->
			<!-- start of Bootroom -->
			<tr>

				<th><a href="">Bootroom Version</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="" name="hh_bootrom" size="20" class="edit" id="hh_bootrom" type="text" tabindex="7">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of Bootroom -->
			<!-- start of MB -->
			<tr>

				<th><a href="">CPR</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
				
				</tr>
				
				<tr>	
				
				<th>
				<input value="" name="hh_cpr" size="20" class="edit" id="hh_cpr" type="text" tabindex="8">
				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&#160;</th>
				<th>&#160;</th>
				<th>&nbsp;</th>
			</tr>
			<!-- end of MB -->
			<!-- start of notes -->
			<tr>

				<th><a href="">Notes</a></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th>
				<th>&#160;</th></tr>
				
				<tr>	
				
				<td>
				
				<textarea rows="3" name="hh_notes" id="hh_notes" cols="40" value="" tabindex="9" ></textarea>
				
				</td>
				<td></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<!-- end of notes-->
			<!-- start of checkboxes -->
			<tr>
				<th><input type="checkbox" name="hh_is_secure" id="hh_is_secure" value="1" id="sim_in_svv" class="checkbox" tabindex="10" /><a href="">Secure / Insecure</a>
				<input type="checkbox" name="hh_is_corp" value="1" id="hh_is_corp" class="checkbox" tabindex="11" /><a href="">Corporate</a>
				<input type="checkbox" name="hh_is_otasl" value="1" id="hh_is_otasl" class="checkbox" tabindex="12" /><a href="">OTASL</a>

				</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>	
			<!-- end of checkboxes-->

			<!-- start of submit -->
			<tr>

				<th><input type="submit"  value="Submit" name="B1" onClick="sendRequest()" tabindex="16">&nbsp;&nbsp; 
				<!-- <input type="reset" value="Reset" name="B2" class="smallerboxsp"> -->
			     <input type="submit" name="submit">
				 <input type="button" name="cancel" value="Cancel" onclick="closebox()">

				</th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
			</tr>
				

			<!-- end of submit-->
			<!-- start of submit -->
			<tr>

				<th><span class="ok" id="returned_value" ></span></th>
				<th>&nbsp;</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th><th>&#160;</th><th>&#160;</th>
			</tr>
				

			<!-- end of submit-->

			<!-- end of form -->