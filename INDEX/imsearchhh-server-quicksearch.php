<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $typesvalue = $_REQEUST['type'];
 
 
?>
		<form method="post" action="signinsignouthh.php?<?=$_SERVER['QUERY_STRING']?>" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" border="0" id="list" align="center">
		<tbody width="100%">
		<!-- start of dynamic rows -->	
		
		<?
		// start of numresults
		// returns number of results in search
		if (isset($type))
		{
					
							
			// create a list of device types
			$sqltypes = "SELECT * FROM troubador_device.handheld_type";
			
			$typesarray = array();
			if ($type != 'any')
			{
				$typesarray[] = $type;
			
			}
			else
			{
				$resulttypes = mysql_query($sqltypes, $connect);
				
				while ($fetchtypes = mysql_fetch_assoc($resulttypes))
				{
					$typesarray[] = $fetchtypes['type'];
				}
				
			}
			
			$numcount = 0;
			for ($icount=0; $icount<sizeof($typesarray); $icount++)
			{
				
				$typesvalue = $typesarray[$icount];
				$typesdescription = $typesarray['description'];
				// open the sql query
				$sqlhh = "SELECT h.Id AS Id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, h.MB AS MB, "
				. " h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Phone AS Phone, h.VoiceMailPassword AS VoiceMailPassword, h.Notes AS Notes, "
				. " h.Status AS Status, h.userid AS userid, u.username AS username, h.timestamp AS timestamp, h.bootrom AS bootrom, "
				. " h.loc_id AS loc_id, loc.name AS loc_name, h.is_secure AS is_secure, "
				. " h.is_corp AS is_corp, h.is_otasl AS is_otasl, h.CPR AS CPR, loc.name AS loc_name "
				. " FROM troubador_device.handhelds AS h "
				. " LEFT JOIN users AS u ON u.Id=h.userid "
				. " LEFT JOIN location AS loc ON loc.id = h.loc_id "
				. " WHERE (1=1) AND (h.userid <> 248) AND h.type='$typesvalue' " ;
				
					 
				 if (isset($handheld_location))
				 {
				  if (strlen($handheld_location) > 0)
				  {		  
				   if (!($handheld_location == 'any'))
					{
					
						$sqlhh .= "	AND h.loc_id=$handheld_location ";
						
					}
				  }
				 }
				 // available_only
				 if (strlen($hh_available_only)>0)
				 {
				   
						//$sqlhh .= "	AND h.Status='AVAILABLE' ";
						$sqlhh .= "	AND h.userid = 0 ";
						
					
				 }
				 else
				 {
					//$sqlhh .= " AND h.Status = 'SIGNED OUT' ";
					
					//$sqlhh .= "	AND h.userid <> 0 ";
				 
				 }
				 
				 // secure
				 if (strlen($hh_is_secure)>0)
				 {
				   
						
						$sqlhh .= "	AND h.is_secure = 0 ";
						
					
				 }
				 else
				 {
					
					$sqlhh = $sqlhh ;
				 
				 }
				 
				 
				 
				 // corporate
				 
				 if (strlen($hh_is_corp)>0)
				 {
				   
						$sqlhh .= "	AND h.is_corp = 1 ";
						
					
				 }
				 else
				 {
										
					$sqlhh = $sqlhh ; 
				 
				 }
				 
				 
				 // assigned_num
				 if (isset($assigned_num))
				 {
				  if (strlen($assigned_num) > 0)
				  {		  
				   if (!($assigned_num == 'any'))
					{
					
						$sqlhh .= "	AND h.AssignedNumber=$assigned_num ";
						
					}
				  }
				 }
				 
				 // revision_num
				 if (isset($revision_num))
				 {
				  if (strlen($revision_num) > 0)
				  {		  
				   if (!($revision_num == 'any'))
					{
					
						$sqlhh .= "	AND h.RevisionNumber=$revision_num ";
						
					}
				  }
				 }
				 
				 // PIN
				 if (isset($pin))
				 {
				  if (strlen($pin) > 0)
				  {		  
				   if (!($pin == ''))
					{
					
						$sqlhh .= "	AND h.PIN LIKE '$pin%' ";
						
					}
				  }
				 }
				 
				 // MEID
						 if (isset($meid))
						 {
						  if (strlen($meid) > 0)
						  {		  
						   if (!($meid == ''))
							{
							
								$sqlhh .= "	AND h.IMEI LIKE '$meid%' ";
								
							}
						  }
						 }
				 
				 // IMEI
				 if (isset($imei))
				 {
				  if (strlen($imei) > 0)
				  {		  
				   if (!($imei == ''))
					{
					
						$sqlhh .= "	AND h.IMEI LIKE '$imei%' ";
						
					}
				  }
				 }
				 
				 // bootrom_version
				 if (isset($bootrom_verion))
				 {
				  if (strlen($bootrom_version) > 0)
				  {		  
				   if (!($bootrom_version == ''))
					{
					
						$sqlhh .= "	AND h.bootrom LIKE '$bootrom_version%' ";
						
					}
				  }
				 }
				 
				 // CPR
				 if (isset($cpr))
				 {
				  if (strlen($cpr) > 0)
				  {		  
				   if (!($cpr == ''))
					{
					
						$sqlhh .= "	AND h.CPR LIKE '$cpr%' ";
						
					}
				  }
				 }
				 
				  // userid
				 if (isset($userid))
				 {
				  if (strlen($userid) > 0)
				  {		  
				   if (!($userid == 'any'))
					{
					
						$sqlhh .= "	AND h.userid LIKE '$userid%' ";
						
					}
				  }
				 }
				 
				
				$sqlnum = $sqlhh;
				
				
			
				// close out the query 
				 $sqlhh .= " ORDER BY h.type ";
				 
				 $sqlhh .= " , h.AssignedNumber DESC";
				
				
				 
				 // qty
				if (strlen($_SESSION['qty']>0))
				{		
				  //$sqlhh = $sqlhh . " LIMIT 0, " . $_SESSION['qty']*50 ;
					
				}
				else
				{
					$sqlhh = $sqlhh;
				}
				
			
				
				$resulthh = mysql_query($sqlhh, $connect);
				$resultnum = mysql_query($sqlnum, $connect);
				$num_results = mysql_num_rows($resultnum);
				$numcount += $num_results;
			}	
		}
		// end of numresults
		if ($numcount ==0)
		{
			echo " Your query returned no results ";
		}
		else if ($numcount > 900)
		{
			echo " Your query returned " . $numcount . " results ";
			echo "<br>";
			echo " Please narrow your filters ";
			die();
			
		}
		else 
		{
			echo " Your query returned " . $numcount . " results ";
		}
		if (isset($type))
		{
					
							
							// create a list of device types
							$sqltypes = "SELECT * FROM troubador_device.handheld_type";
							
							$typesarray = array();
							if ($type != 'any')
							{
								$typesarray[] = $type;
							
							}
							else
							{
								$resulttypes = mysql_query($sqltypes, $connect);
								
								while ($fetchtypes = mysql_fetch_assoc($resulttypes))
								{
									$typesarray[] = $fetchtypes['type'];
								}
								
							}
							
							$numcount = 0;
							for ($icount=0; $icount<sizeof($typesarray); $icount++)
							{
								
								$typesvalue = $typesarray[$icount];
								$typesdescription = $typesarray['description'];
								// open the sql query
								$sqlhh = "SELECT h.Id AS Id, h.type AS type, h.AssignedNumber AS AssignedNumber, h.RevisionNumber AS RevisionNumber, h.MB AS MB, "
								. " h.PIN AS PIN, h.ESN AS ESN, h.IMEI AS IMEI, h.Phone AS Phone, h.VoiceMailPassword AS VoiceMailPassword, h.Notes AS Notes, "
								. " h.Status AS Status, h.userid AS userid, u.username AS username, h.timestamp AS timestamp, h.bootrom AS bootrom, "
								. " h.loc_id AS loc_id, loc.name AS loc_name, h.is_secure AS is_secure, "
								. " h.is_corp AS is_corp, h.is_otasl AS is_otasl, h.CPR AS CPR, loc.name AS loc_name "
								. " FROM troubador_device.handhelds AS h "
								. " LEFT JOIN users AS u ON u.Id=h.userid "
								. " LEFT JOIN location AS loc ON loc.id = h.loc_id "
								. " WHERE (1=1) AND (h.userid <> 248) AND h.type='$typesvalue' " ;
								
									 
								 if (isset($handheld_location))
								 {
								  if (strlen($handheld_location) > 0)
								  {		  
								   if (!($handheld_location == 'any'))
									{
									
										$sqlhh .= "	AND h.loc_id=$handheld_location ";
										
									}
								  }
								 }
								 // available_only
								 if (strlen($hh_available_only)>0)
								 {
								   
										//$sqlhh .= "	AND h.Status='AVAILABLE' ";
										$sqlhh .= "	AND h.userid = 0 ";
										
									
								 }
								 else
								 {
									//$sqlhh .= " AND h.Status = 'SIGNED OUT' ";
									
									//$sqlhh .= "	AND h.userid <> 0 ";
								 
								 }
								// secure
								if (strlen($hh_is_secure)>0)
								{


								$sqlhh .= "	AND h.is_secure = 0 ";


								}
								else
								{

								$sqlhh = $sqlhh ;

								}
								 
								// corporate

								if (strlen($hh_is_corp)>0)
								{

								$sqlhh .= "	AND h.is_corp = 1 ";


								}
								else
								{

								$sqlhh = $sqlhh ; 

								}
								 
								 // assigned_num
								 if (isset($assigned_num))
								 {
								  if (strlen($assigned_num) > 0)
								  {		  
								   if (!($assigned_num == 'any'))
									{
									
										$sqlhh .= "	AND h.AssignedNumber=$assigned_num ";
										
									}
								  }
								 }
								 
								 // revision_num
								 if (isset($revision_num))
								 {
								  if (strlen($revision_num) > 0)
								  {		  
								   if (!($revision_num == 'any'))
									{
									
										$sqlhh .= "	AND h.RevisionNumber=$revision_num ";
										
									}
								  }
								 }
								 
								 // PIN
								 if (isset($pin))
								 {
								  if (strlen($pin) > 0)
								  {		  
								   if (!($pin == ''))
									{
									
										$sqlhh .= "	AND h.PIN LIKE '$pin%' ";
										
									}
								  }
								 }
								 
								 // MEID
								 if (isset($meid))
								 {
								  if (strlen($meid) > 0)
								  {		  
								   if (!($meid == ''))
									{
									
										$sqlhh .= "	AND h.IMEI LIKE '$meid%' ";
										
									}
								  }
								 }
								 
								 // IMEI
								 if (isset($imei))
								 {
								  if (strlen($imei) > 0)
								  {		  
								   if (!($imei == ''))
									{
									
										$sqlhh .= "	AND h.IMEI LIKE '$imei%' ";
										
									}
								  }
								 }
								 
								 // bootrom_version
								 if (isset($bootrom_verion))
								 {
								  if (strlen($bootrom_version) > 0)
								  {		  
								   if (!($bootrom_version == ''))
									{
									
										$sqlhh .= "	AND h.bootrom LIKE '$bootrom_version%' ";
										
									}
								  }
								 }
								 
								 // CPR
								 if (isset($cpr))
								 {
								  if (strlen($cpr) > 0)
								  {		  
								   if (!($cpr == ''))
									{
									
										$sqlhh .= "	AND h.CPR LIKE '$cpr%' ";
										
									}
								  }
								 }
								 
								  // userid
								 if (isset($userid))
								 {
								  if (strlen($userid) > 0)
								  {		  
								   if (!($userid == 'any'))
									{
									
										$sqlhh .= "	AND h.userid LIKE '$userid%' ";
										
									}
								  }
								 }
								 
							    
								$sqlnum = $sqlhh;
								
								
							
								// close out the query 
								 $sqlhh .= " ORDER BY h.type ";
								 
								 $sqlhh .= " , h.AssignedNumber DESC";
								
								
								 
								 // qty
								if (strlen($_SESSION['qty']>0))
								{		
								  //$sqlhh = $sqlhh . " LIMIT 0, " . $_SESSION['qty']*50 ;
									
								}
								else
								{
									$sqlhh = $sqlhh;
								}
                                
							
								
								$resulthh = mysql_query($sqlhh, $connect);
								$resultnum = mysql_query($sqlnum, $connect);
								$num_results = mysql_num_rows($resultnum);
								$resultscounter = 0;
								
								$query_string = 
								"type=" . $typesvalue 
								. "&handheld_location=" . $handheld_location 
								. "&assigned_num=" . $assigned_num 
								. "&revision_num=" . $revision_num
								. "&pin=" . $pin
								. "&imei=" . $imei
								. "&bootrom_version=" . $bootrom_version
								. "&cpr=" . $cpr
								. "&userid=" . $userid;
								
								$numcount += $num_results;
								
								//echo $sqlhh;
								
								//echo "<br />";
                                if ($num_results>0)
								{
									
									?>
									<tr>
									<th><input value="Sign In/Sign Out" name="B1" tabindex="16" type="submit"></th>
									<th><span class="ok" id="signout_signin_returned_value" ></span></th>	
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									
									</tr>
									<tr class="thetoprow">
									<th class="bigok"><strong><? echo $typesvalue; ?> </strong></th>
									<th class="bigok"><? echo $typesdescription; ?> </th>
									<th></th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									</tr>
								
									<tr>
									<th><a href=""><strong>Select</strong></a></th>
									<?if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<th class="asc"><a href="imsearchhh.php?sort=asg&dir=desc">Asg</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Rev#</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">PIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<th class="col_imei"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">IMEI</a></th>'; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<th class="col_bootrom"><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Bootrom</a></th>'; } ?>
									<? if($_SESSION['hh_settings']['hh_show_cpr']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">CPR</a></th>'; } ?>
									<? if($_SESSION['hh_settings']['hh_show_user']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">User</a></th>';}?>
									
									<th><a href="<?=$_SERVER['PHP_SELF']?>">Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></th>
									<? if ($_SESSION['hh_settings']['hh_show_location']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Location</a></th>' ; } ?>
									<? if ($_SESSION['hh_settings']['hh_show_notes']) { echo '<th><a href="index.php?step=list&#38;event=admin&#38;sort=last_login&#38;dir=desc">Notes</a></th>'; } ?>
									<th><a href="<?=$_SERVER['PHP_SELF']?>">Actions</a></th>
									</tr>
									<?
									
									while ($fetch = mysql_fetch_assoc($resulthh))
									{
									$resultscounter++;
									?>
									<tr <? if ($fetch['userid']!=0) { echo 'class="not-available"'; } else { echo 'class="available"'; } ?> >	
									<td>
									
									
									<input type="checkbox" name="select_for_sign_out[]" id="select_for_sign_out[]" class="checkbox" tabindex="10" value="<?=$fetch['Id']?>" />
									</td>
									<? if ($_SESSION['hh_settings']['hh_show_assigned_num']) { echo '<td>' . $fetch['AssignedNumber'] . '</td>' ; } ?>

									<? if ($_SESSION['hh_settings']['hh_show_revision_num']) { echo '<td>' . $fetch['RevisionNumber'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_pin']) { echo '<td>' .  $fetch['PIN'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_imei']) { echo '<td>' . $fetch['IMEI'] . '</td>'; } ?>
										
									<? if ($_SESSION['hh_settings']['hh_show_bootrom']) { echo '<td>' . $fetch['bootrom'] . '</td>'; } ?>
									
									<? if ($_SESSION['hh_settings']['hh_show_cpr']) { echo '<td>' . $fetch['CPR'] . '</td>' ; } ?>
									
									<td><?	if (strlen($fetch['username']) > 0) { echo $fetch['username']; } else { echo "AVAILABLE"; }  ?></td>
									
									
						
									<td><? if ($fetch['userid']!=0) { echo '<img src="iconimages/not_available.gif" alt="Not Available" title="Not Available">'; } else { echo '<img src="iconimages/available.gif" alt="Available" title="Available">';} ?>
									<? if (!$fetch['is_secure']) { echo '<img src="iconimages/not_secure.png" alt="Insecure" title="Insecure">'; } else { echo '<img src="iconimages/secure.png" alt="Secure" title="Secure">';} ?>
									<? if (!$fetch['is_corp']) { echo '<img src="iconimages/not_corporate.png" alt="Testing" title="Testing">'; } else { echo '<img src="iconimages/corporate.png" alt="Corporate" title="Corporate">';} ?>

									</td>
									
									
							
									<td><?
									if ($_SESSION['hh_settings']['hh_show_location']) 
									{		
									echo $fetch['loc_name'];
									}
									?></td>
									<? if ($_SESSION['hh_settings']['hh_show_notes']) { echo '<td>' . $fetch['Notes'] . '</td>'; } ?>
									<td><a href="edit-hh.php?handheld_id=<?=$fetch['Id']?>&<?=$query_string?>">
									<img src="iconimages/action_edit.png" alt="edit" title="edit"></a>
									<input id="handheld_id" type="hidden" value="<?=$fetch['Id']?>">
									 <a href="#" onclick="openhistorybox(<?=$fetch['Id']?>, 1)">
									<img src="iconimages/action_history.png" alt="history" title="history"/></a>
									</td>
									</tr>
									<?
									}
								}
						}
				
		}
			?>
		<!-- end of dynamic rows -->
		</tbody>
		</table>
		</form>
              
	  <?



?>
