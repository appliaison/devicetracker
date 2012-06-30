		<input type="checkbox" name="sim_available_only"  id="sim_available_only" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="5"/><label>Available Only</label>
		</span>
		
		<input type="checkbox" name="sim_conference_call"  id="sim_conference_call" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?>tabindex="6"/><label>Con Call (CON)</label>
		</div>

	
	<!-- end of available-->
	<!-- start of conference call -->

		
		<input type="checkbox" name="sim_international_call" id="sim_international_call" class="checkbox"
		<?
		if ( ($_REQUEST['sim_conference_call'] =="on") or ($_SESSION['sim_conference_call']) )
		{
			echo 'checked="checked"';
			$_SESSION['sim_conference_call'] = $_REQUEST['sim_conference_call'];
		}
		?> tabindex="7"/> <label>Intl Call (INT)</label>
		
		
		


		<input type="checkbox" name="sim_call_forwarding"  id="sim_call_forwarding" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="8"/><label>Call Fwding (FWD)</label>
	
		

	<!-- end of conference call-->
	
	<!-- start of international call -->

	
		<input type="checkbox" name="sim_call_barring"  id="sim_call_barring" class="checkbox"
		<?
		if ( ($_REQUEST['sim_international_call'] =="on") or ($_SESSION['sim_international_call']) )
		{
			echo 'checked="checked"';
			$_SESSION['sim_international_call'] = $_REQUEST['sim_international_call'];
		}
		?> tabindex="9" /><label>Call Barring (BARR)</label>
		
	
		<input type="checkbox" name="sim_call_waiting"  id="sim_call_waiting" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="10"/><label>Call Waiting (WAIT)</label>
		

	<!-- end of international call-->
	<!-- start of call forwarding -->

	
		<input type="checkbox" name="sim_voicemail"  id="sim_voicemail" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_forwarding'] =="on") or ($_SESSION['sim_call_forwarding']) ) 
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_forwarding'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="11"/><label>Voice Mail (VMAIL)</label>
	
		<input type="checkbox" name="sim_telenav"  id="sim_telenav" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="12"/><label>Telenav (TELENAV)</label>

		

	<!-- end of call forwarding-->
	<!-- start of call barring -->

	
		<input type="checkbox" name="sim_als"  id="sim_als" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="13"/><label>ALS (ALS)</label>
	
		
		<input type="checkbox" name="sim_modem"  id="sim_modem" class="checkbox" 
		<? if (($_REQUEST['sim_available_only'] =="on") or ($_SESSION['sim_available_only']) )
		{ 
			echo 'checked="checked"'; 
			$_SESSION['sim_available_only'] = $_REQUEST['sim_available_only'];
		} 
	
		?> tabindex="14"/><label>Modem (MODEM)</label>
	
	
	<!-- end of call barring-->
	<!-- start of call waiting -->
	
		<input type="checkbox" name="sim_plmn"  id="sim_plmn" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="15"/><label>PLMN (PLMN)</label>

		<!-- start of voicemail -->
		
		<input type="checkbox" name="sim_myfaves"  id="sim_myfaves" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="16"/><label>MyFaves (MYFAVES)</label>

	
	
	<!-- end of call waiting-->
	<!-- start of voicemail -->
	
		<input type="checkbox" name="sim_sms"  id="sim_sms" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="17" /><label>SMS (SMS)</label>
	
	<!-- end of call waiting -->
	
	
	<!-- start of voicemail -->
		
		<input type="checkbox" name="sim_voice_only"  id="sim_voice_only" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="18"/><label>Voice (VOICE)</label>

	
	<!-- start of data only, corp -->
	
		<input type="checkbox" name="sim_data_only"  id="sim_data_only" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="19"/>
	<label>Data Only (DATA)</label>
	
	
	<input type="checkbox" name="sim_corporate"  id="sim_corporate" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="20"/>
	<label>Corporate (CORP)</label>
	
	<!-- end of data only, corp -->
	<!-- start of data only, corp -->
	
		<input type="checkbox" name="sim_wispr"  id="sim_wispr" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_waiting'] =="on") or ($_SESSION['sim_call_waiting']) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_waiting'] = $_REQUEST['sim_call_waiting'];
	}
	?> tabindex="21" />
	<label>WISPr (WISPr)</label>
	
	
	<input type="checkbox" name="sim_personx"  id="sim_personx" class="checkbox" 
	<?
	if ( ($_REQUEST['sim_call_barring'] =="on") or ($_SESSION['sim_call_barring'] ) )
	{
		echo 'checked="checked"';
		$_SESSION['sim_call_barring'] = $_REQUEST['sim_call_barring'];
	}
	?> tabindex="22"/><label>Talk to person X (X)</label>
	
	<!-- end of data only, corp -->