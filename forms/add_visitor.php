<?php session_start();



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');



$tripID = $_GET['inc'];

include('../roles/sales_roles.php');

	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<style type="text/css">

		body{font:12px/1.2 Verdana, Arial, san-serrif; padding:0 10px;}

		a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}

		h2{font-size:13px; margin:15px 0 0 0;}

	.washana {

	color: #C03;

}

#currency2{

	width:100px;

	}

	

	#servedby{

		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

		}

    </style>

    </style>

<title>add_visitor</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>



        <!--Validation End-->

     <script>   $(document).ready(function(){



		

			$("#MyForm").validationEngine();

			$(".example5").colorbox();



			

			//character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

$('#pptdetails').keyup(function(){

    this.value = this.value.toUpperCase();

});

//end character cases

		});

        </script>

        

      



</head>



<body><form id="MyForm"  name="MyForm" class="formular" method="post" action="add_visitor_exec.php?inc=<?php echo $tripID?>">

<table align="center" width="600px" border="0"  cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="6" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add  Visitor  Details</td>

      </tr>

      <tr>

        <td width="197" height="35" align="left" bgcolor="#FFFFFF">Full Name<br />

          <input name="fname" type="text"  class="validate[required,custom[onlyLetterSp]] text-input" id="fname" value="" size="30" /></td>

        <td height="35" colspan="2" align="left" bgcolor="#FFFFFF">Passport/ID Details<br />

        <input name="pptdetails" type="text"  class="validate[optional] text-input" id="pptdetails" value="" size="30" /></td>

        <td width="190" align="left" bgcolor="#FFFFFF">Insurance Details<br />

        <input name="insurance" type="text"  class="text-input" id="insurance" value="" size="30" /></td>

        <td width="190" align="left" bgcolor="#FFFFFF">Home Address: <br />

          <input name="haddress" type="text"  class=" text-input" id="haddress" value="" size="30" />          </td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Nationality: <br />

          <select  style="height:auto" name="nationality" id="nationality" class=" text-input" >

            <option selected="selected" value="unknown">Unknown</option>

            <option value="afghan">Afghan</option>

            <option value="albanian">Albanian</option>

            <option value="algerian">Algerian</option>

            <option value="american">American</option>

            <option value="andorran">Andorran</option>

            <option value="angolan">Angolan</option>

            <option value="antiguans">Antiguans</option>

            <option value="argentinean">Argentinean</option>

            <option value="armenian">Armenian</option>

            <option value="australian">Australian</option>

            <option value="austrian">Austrian</option>

            <option value="azerbaijani">Azerbaijani</option>

            <option value="bahamian">Bahamian</option>

            <option value="bahraini">Bahraini</option>

            <option value="bangladeshi">Bangladeshi</option>

            <option value="barbadian">Barbadian</option>

            <option value="barbudans">Barbudans</option>

            <option value="batswana">Batswana</option>

            <option value="belarusian">Belarusian</option>

            <option value="belgian">Belgian</option>

            <option value="belizean">Belizean</option>

            <option value="beninese">Beninese</option>

            <option value="bhutanese">Bhutanese</option>

            <option value="bolivian">Bolivian</option>

            <option value="bosnian">Bosnian</option>

            <option value="brazilian">Brazilian</option>

            <option value="british">British</option>

            <option value="bruneian">Bruneian</option>

            <option value="bulgarian">Bulgarian</option>

            <option value="burkinabe">Burkinabe</option>

            <option value="burmese">Burmese</option>

            <option value="burundian">Burundian</option>

            <option value="cambodian">Cambodian</option>

            <option value="cameroonian">Cameroonian</option>

            <option value="canadian">Canadian</option>

            <option value="cape verdean">Cape Verdean</option>

            <option value="central african">Central African</option>

            <option value="chadian">Chadian</option>

            <option value="chilean">Chilean</option>

            <option value="chinese">Chinese</option>

            <option value="colombian">Colombian</option>

            <option value="comoran">Comoran</option>

            <option value="congolese">Congolese</option>

            <option value="costa rican">Costa Rican</option>

            <option value="croatian">Croatian</option>

            <option value="cuban">Cuban</option>

            <option value="cypriot">Cypriot</option>

            <option value="czech">Czech</option>

            <option value="danish">Danish</option>

            <option value="djibouti">Djibouti</option>

            <option value="dominican">Dominican</option>

            <option value="dutch">Dutch</option>

            <option value="east timorese">East Timorese</option>

            <option value="ecuadorean">Ecuadorean</option>

            <option value="egyptian">Egyptian</option>

            <option value="emirian">Emirian</option>

            <option value="equatorial guinean">Equatorial Guinean</option>

            <option value="eritrean">Eritrean</option>

            <option value="estonian">Estonian</option>

            <option value="ethiopian">Ethiopian</option>

            <option value="fijian">Fijian</option>

            <option value="filipino">Filipino</option>

            <option value="finnish">Finnish</option>

            <option value="french">French</option>

            <option value="gabonese">Gabonese</option>

            <option value="gambian">Gambian</option>

            <option value="georgian">Georgian</option>

            <option value="german">German</option>

            <option value="ghanaian">Ghanaian</option>

            <option value="greek">Greek</option>

            <option value="grenadian">Grenadian</option>

            <option value="guatemalan">Guatemalan</option>

            <option value="guinea-bissauan">Guinea-Bissauan</option>

            <option value="guinean">Guinean</option>

            <option value="guyanese">Guyanese</option>

            <option value="haitian">Haitian</option>

            <option value="herzegovinian">Herzegovinian</option>

            <option value="honduran">Honduran</option>

            <option value="hungarian">Hungarian</option>

            <option value="icelander">Icelander</option>

            <option value="indian">Indian</option>

            <option value="indonesian">Indonesian</option>

            <option value="iranian">Iranian</option>

            <option value="iraqi">Iraqi</option>

            <option value="irish">Irish</option>

            <option value="israeli">Israeli</option>

            <option value="italian">Italian</option>

            <option value="ivorian">Ivorian</option>

            <option value="jamaican">Jamaican</option>

            <option value="japanese">Japanese</option>

            <option value="jordanian">Jordanian</option>

            <option value="kazakhstani">Kazakhstani</option>

            <option value="kenyan" >Kenyan</option>

            <option value="kittian and nevisian">Kittian and Nevisian</option>

            <option value="kuwaiti">Kuwaiti</option>

            <option value="kyrgyz">Kyrgyz</option>

            <option value="laotian">Laotian</option>

            <option value="latvian">Latvian</option>

            <option value="lebanese">Lebanese</option>

            <option value="liberian">Liberian</option>

            <option value="libyan">Libyan</option>

            <option value="liechtensteiner">Liechtensteiner</option>

            <option value="lithuanian">Lithuanian</option>

            <option value="luxembourger">Luxembourger</option>

            <option value="macedonian">Macedonian</option>

            <option value="malagasy">Malagasy</option>

            <option value="malawian">Malawian</option>

            <option value="malaysian">Malaysian</option>

            <option value="maldivan">Maldivan</option>

            <option value="malian">Malian</option>

            <option value="maltese">Maltese</option>

            <option value="marshallese">Marshallese</option>

            <option value="mauritanian">Mauritanian</option>

            <option value="mauritian">Mauritian</option>

            <option value="mexican">Mexican</option>

            <option value="micronesian">Micronesian</option>

            <option value="moldovan">Moldovan</option>

            <option value="monacan">Monacan</option>

            <option value="mongolian">Mongolian</option>

            <option value="moroccan">Moroccan</option>

            <option value="mosotho">Mosotho</option>

            <option value="motswana">Motswana</option>

            <option value="mozambican">Mozambican</option>

            <option value="namibian">Namibian</option>

            <option value="nauruan">Nauruan</option>

            <option value="nepalese">Nepalese</option>

            <option value="new zealander">New Zealander</option>

            <option value="ni-vanuatu">Ni-Vanuatu</option>

            <option value="nicaraguan">Nicaraguan</option>

            <option value="nigerien">Nigerien</option>

            <option value="north korean">North Korean</option>

            <option value="northern irish">Northern Irish</option>

            <option value="norwegian">Norwegian</option>

            <option value="omani">Omani</option>

            <option value="pakistani">Pakistani</option>

            <option value="palauan">Palauan</option>

            <option value="panamanian">Panamanian</option>

            <option value="papua new guinean">Papua New Guinean</option>

            <option value="paraguayan">Paraguayan</option>

            <option value="peruvian">Peruvian</option>

            <option value="polish">Polish</option>

            <option value="portuguese">Portuguese</option>

            <option value="qatari">Qatari</option>

            <option value="romanian">Romanian</option>

            <option value="russian">Russian</option>

            <option value="rwandan">Rwandan</option>

            <option value="saint lucian">Saint Lucian</option>

            <option value="salvadoran">Salvadoran</option>

            <option value="samoan">Samoan</option>

            <option value="san marinese">San Marinese</option>

            <option value="sao tomean">Sao Tomean</option>

            <option value="saudi">Saudi</option>

            <option value="scottish">Scottish</option>

            <option value="senegalese">Senegalese</option>

            <option value="serbian">Serbian</option>

            <option value="seychellois">Seychellois</option>

            <option value="sierra leonean">Sierra Leonean</option>

            <option value="singaporean">Singaporean</option>

            <option value="slovakian">Slovakian</option>

            <option value="slovenian">Slovenian</option>

            <option value="solomon islander">Solomon Islander</option>

            <option value="somali">Somali</option>

            <option value="south african">South African</option>

            <option value="south korean">South Korean</option>

            <option value="spanish">Spanish</option>

            <option value="sri lankan">Sri Lankan</option>

            <option value="sudanese">Sudanese</option>

            <option value="surinamer">Surinamer</option>

            <option value="swazi">Swazi</option>

            <option value="swedish">Swedish</option>

            <option value="swiss">Swiss</option>

            <option value="syrian">Syrian</option>

            <option value="taiwanese">Taiwanese</option>

            <option value="tajik">Tajik</option>

            <option value="tanzanian">Tanzanian</option>

            <option value="thai">Thai</option>

            <option value="togolese">Togolese</option>

            <option value="tongan">Tongan</option>

            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>

            <option value="tunisian">Tunisian</option>

            <option value="turkish">Turkish</option>

            <option value="tuvaluan">Tuvaluan</option>

            <option value="ugandan">Ugandan</option>

            <option value="ukrainian">Ukrainian</option>

            <option value="uruguayan">Uruguayan</option>

            <option value="uzbekistani">Uzbekistani</option>

            <option value="venezuelan">Venezuelan</option>

            <option value="vietnamese">Vietnamese</option>

            <option value="welsh">Welsh</option>

            <option value="yemenite">Yemenite</option>

            <option value="zambian">Zambian</option>

            <option value="zimbabwean">Zimbabwean</option>

        </select></td>

        <td width="60"  height="35" align="left" bgcolor="#FFFFFF">Age(yrs)<br />

        <input name="age" type="text"  class="validate[optional,custom[number]] text-input" id="age" value="" size="5" /></td>

        <td width="114" align="left" bgcolor="#FFFFFF">Room Type<br />

<!--  the script for room checkin-->

<script  type="text/javascript" >
function checkroom(val)
{

    if(val=="Double"||val=="Twin"){

	 document.getElementById('v2name').style.display='block';
	 document.getElementById('v2ppdetails').style.display='block';
	 document.getElementById('v2address').style.display='block';
	 document.getElementById('v2insurance').style.display='block';
	 document.getElementById('v2nationality').style.display='block';
	 document.getElementById('v2age').style.display='block';

	 document.getElementById('v3name').style.display='block';
     document.getElementById('v3ppdetails').style.display='block';
     document.getElementById('v3address').style.display='block';
	 document.getElementById('v3insurance').style.display='block';
	 document.getElementById('v3nationality').style.display='block';
     document.getElementById('v3age').style.display='block';
	
	
	document.getElementById('v4name').style.display='none';
    document.getElementById('v4ppdetails').style.display='none';
    document.getElementById('v4address').style.display='none';
	document.getElementById('v4insurance').style.display='none';
	document.getElementById('v4nationality').style.display='none';
	document.getElementById('v4age').style.display='none';


	}

    else if(val=="Triple"){

	document.getElementById('v2name').style.display='block';
    document.getElementById('v2ppdetails').style.display='block';
    document.getElementById('v2address').style.display='block';
	document.getElementById('v2insurance').style.display='block';
	document.getElementById('v2nationality').style.display='block';
	document.getElementById('v2age').style.display='block';

    document.getElementById('v3name').style.display='block';
    document.getElementById('v3ppdetails').style.display='block';
    document.getElementById('v3address').style.display='block';
	document.getElementById('v3insurance').style.display='block';
	document.getElementById('v3nationality').style.display='block';
	document.getElementById('v3age').style.display='block';
	
	document.getElementById('v4name').style.display='block';
    document.getElementById('v4ppdetails').style.display='block';
    document.getElementById('v4address').style.display='block';
	document.getElementById('v4insurance').style.display='block';
	document.getElementById('v4nationality').style.display='block';
	document.getElementById('v4age').style.display='block';

	}
	
	else if(val=="Family"){

	document.getElementById('v2name').style.display='block';
    document.getElementById('v2ppdetails').style.display='block';
    document.getElementById('v2address').style.display='block';
	document.getElementById('v2insurance').style.display='block';
	document.getElementById('v2nationality').style.display='block';
	document.getElementById('v2age').style.display='block';

    document.getElementById('v3name').style.display='block';
    document.getElementById('v3ppdetails').style.display='block';
    document.getElementById('v3address').style.display='block';
	document.getElementById('v3insurance').style.display='block';
	document.getElementById('v3nationality').style.display='block';
	document.getElementById('v3age').style.display='block';
	
	
	document.getElementById('v4name').style.display='block';
    document.getElementById('v4ppdetails').style.display='block';
    document.getElementById('v4address').style.display='block';
	document.getElementById('v4insurance').style.display='block';
	document.getElementById('v4nationality').style.display='block';
	document.getElementById('v4age').style.display='block';

	}
   
   else{

	document.getElementById('v2name').style.display='block';
    document.getElementById('v2ppdetails').style.display='block';
    document.getElementById('v2address').style.display='block';
	document.getElementById('v2insurance').style.display='block';
	document.getElementById('v2nationality').style.display='block';
	document.getElementById('v2age').style.display='block';
	
	document.getElementById('v3name').style.display='none';
    document.getElementById('v3ppdetails').style.display='none';
    document.getElementById('v3address').style.display='none';
	document.getElementById('v3insurance').style.display='none';
	document.getElementById('v3nationality').style.display='none';
    document.getElementById('v3age').style.display='none';
	
	document.getElementById('v4name').style.display='none';
    document.getElementById('v4ppdetails').style.display='none';
    document.getElementById('v4address').style.display='none';
	document.getElementById('v4insurance').style.display='none';
	document.getElementById('v4nationality').style.display='none';
	document.getElementById('v4age').style.display='none';

 }

	 

}</script>

          <select name="room" id="room"  style="height:auto" class="validate[optional] text-input"  onchange='checkroom(this.value)'>

            <option value="">-- Room Type --</option>

            <option value="Single">Single</option>

            <option value="Double">Double</option>

            <option value="Twin">Twin</option>

            <option value="Triple">Triple</option>
            
            <option value="Family">Family</option>

        </select></td>

        <td align="left" bgcolor="#FFFFFF"><span id="v2name" style='display:none'>V2. Names

        <input name="v2_name" type="text"  class="validate[optional, custom[onlyLetterSp]] text-input" id="v2_name" value="" size="30" data-prompt-position="relative"/></span></td>

        <td align="left" bgcolor="#FFFFFF"><span id="v2ppdetails" style='display:none'>V2. PP/ID Details<br />

        <input name="v2_pptdetails" type="text"  class="validate[optional] text-input" id="v2_pptdetails" value="" size="30" /></span></td>

      </tr>

 

<tr >

        <td  height="35"  bgcolor="#FFFFFF"><span id="v2insurance" style='display:none'>V2. Insurance Details<br />

        <input name="v2_insurance" type="text"  class="text-input" id="v2_insurance" value="" size="30" /></span></td>

        <td colspan="2" align="left" bgcolor="#FFFFFF"><span id="v2address" style='display:none'>V2. Home Address: <br />

        <input name="v2_haddress" type="text"  class=" text-input" id="v2_haddress" value="" size="30" /></span></td>

        <td align="left" bgcolor="#FFFFFF"><span id="v2nationality" style='display:none'>V2.  Nationality: <br />

          <select style="height:auto" name="v2_nationality" id="v2_nationality" class=" text-input" >

            

            <option selected="selected" value="unknown">Unknown</option>

            <option value="afghan">Afghan</option>

            <option value="albanian">Albanian</option>

            <option value="algerian">Algerian</option>

            <option value="american">American</option>

            <option value="andorran">Andorran</option>

            <option value="angolan">Angolan</option>

            <option value="antiguans">Antiguans</option>

            <option value="argentinean">Argentinean</option>

            <option value="armenian">Armenian</option>

            <option value="australian">Australian</option>

            <option value="austrian">Austrian</option>

            <option value="azerbaijani">Azerbaijani</option>

            <option value="bahamian">Bahamian</option>

            <option value="bahraini">Bahraini</option>

            <option value="bangladeshi">Bangladeshi</option>

            <option value="barbadian">Barbadian</option>

            <option value="barbudans">Barbudans</option>

            <option value="batswana">Batswana</option>

            <option value="belarusian">Belarusian</option>

            <option value="belgian">Belgian</option>

            <option value="belizean">Belizean</option>

            <option value="beninese">Beninese</option>

            <option value="bhutanese">Bhutanese</option>

            <option value="bolivian">Bolivian</option>

            <option value="bosnian">Bosnian</option>

            <option value="brazilian">Brazilian</option>

            <option value="british">British</option>

            <option value="bruneian">Bruneian</option>

            <option value="bulgarian">Bulgarian</option>

            <option value="burkinabe">Burkinabe</option>

            <option value="burmese">Burmese</option>

            <option value="burundian">Burundian</option>

            <option value="cambodian">Cambodian</option>

            <option value="cameroonian">Cameroonian</option>

            <option value="canadian">Canadian</option>

            <option value="cape verdean">Cape Verdean</option>

            <option value="central african">Central African</option>

            <option value="chadian">Chadian</option>

            <option value="chilean">Chilean</option>

            <option value="chinese">Chinese</option>

            <option value="colombian">Colombian</option>

            <option value="comoran">Comoran</option>

            <option value="congolese">Congolese</option>

            <option value="costa rican">Costa Rican</option>

            <option value="croatian">Croatian</option>

            <option value="cuban">Cuban</option>

            <option value="cypriot">Cypriot</option>

            <option value="czech">Czech</option>

            <option value="danish">Danish</option>

            <option value="djibouti">Djibouti</option>

            <option value="dominican">Dominican</option>

            <option value="dutch">Dutch</option>

            <option value="east timorese">East Timorese</option>

            <option value="ecuadorean">Ecuadorean</option>

            <option value="egyptian">Egyptian</option>

            <option value="emirian">Emirian</option>

            <option value="equatorial guinean">Equatorial Guinean</option>

            <option value="eritrean">Eritrean</option>

            <option value="estonian">Estonian</option>

            <option value="ethiopian">Ethiopian</option>

            <option value="fijian">Fijian</option>

            <option value="filipino">Filipino</option>

            <option value="finnish">Finnish</option>

            <option value="french">French</option>

            <option value="gabonese">Gabonese</option>

            <option value="gambian">Gambian</option>

            <option value="georgian">Georgian</option>

            <option value="german">German</option>

            <option value="ghanaian">Ghanaian</option>

            <option value="greek">Greek</option>

            <option value="grenadian">Grenadian</option>

            <option value="guatemalan">Guatemalan</option>

            <option value="guinea-bissauan">Guinea-Bissauan</option>

            <option value="guinean">Guinean</option>

            <option value="guyanese">Guyanese</option>

            <option value="haitian">Haitian</option>

            <option value="herzegovinian">Herzegovinian</option>

            <option value="honduran">Honduran</option>

            <option value="hungarian">Hungarian</option>

            <option value="icelander">Icelander</option>

            <option value="indian">Indian</option>

            <option value="indonesian">Indonesian</option>

            <option value="iranian">Iranian</option>

            <option value="iraqi">Iraqi</option>

            <option value="irish">Irish</option>

            <option value="israeli">Israeli</option>

            <option value="italian">Italian</option>

            <option value="ivorian">Ivorian</option>

            <option value="jamaican">Jamaican</option>

            <option value="japanese">Japanese</option>

            <option value="jordanian">Jordanian</option>

            <option value="kazakhstani">Kazakhstani</option>

            <option value="kenyan">Kenyan</option>

            <option value="kittian and nevisian">Kittian and Nevisian</option>

            <option value="kuwaiti">Kuwaiti</option>

            <option value="kyrgyz">Kyrgyz</option>

            <option value="laotian">Laotian</option>

            <option value="latvian">Latvian</option>

            <option value="lebanese">Lebanese</option>

            <option value="liberian">Liberian</option>

            <option value="libyan">Libyan</option>

            <option value="liechtensteiner">Liechtensteiner</option>

            <option value="lithuanian">Lithuanian</option>

            <option value="luxembourger">Luxembourger</option>

            <option value="macedonian">Macedonian</option>

            <option value="malagasy">Malagasy</option>

            <option value="malawian">Malawian</option>

            <option value="malaysian">Malaysian</option>

            <option value="maldivan">Maldivan</option>

            <option value="malian">Malian</option>

            <option value="maltese">Maltese</option>

            <option value="marshallese">Marshallese</option>

            <option value="mauritanian">Mauritanian</option>

            <option value="mauritian">Mauritian</option>

            <option value="mexican">Mexican</option>

            <option value="micronesian">Micronesian</option>

            <option value="moldovan">Moldovan</option>

            <option value="monacan">Monacan</option>

            <option value="mongolian">Mongolian</option>

            <option value="moroccan">Moroccan</option>

            <option value="mosotho">Mosotho</option>

            <option value="motswana">Motswana</option>

            <option value="mozambican">Mozambican</option>

            <option value="namibian">Namibian</option>

            <option value="nauruan">Nauruan</option>

            <option value="nepalese">Nepalese</option>

            <option value="new zealander">New Zealander</option>

            <option value="ni-vanuatu">Ni-Vanuatu</option>

            <option value="nicaraguan">Nicaraguan</option>

            <option value="nigerien">Nigerien</option>

            <option value="north korean">North Korean</option>

            <option value="northern irish">Northern Irish</option>

            <option value="norwegian">Norwegian</option>

            <option value="omani">Omani</option>

            <option value="pakistani">Pakistani</option>

            <option value="palauan">Palauan</option>

            <option value="panamanian">Panamanian</option>

            <option value="papua new guinean">Papua New Guinean</option>

            <option value="paraguayan">Paraguayan</option>

            <option value="peruvian">Peruvian</option>

            <option value="polish">Polish</option>

            <option value="portuguese">Portuguese</option>

            <option value="qatari">Qatari</option>

            <option value="romanian">Romanian</option>

            <option value="russian">Russian</option>

            <option value="rwandan">Rwandan</option>

            <option value="saint lucian">Saint Lucian</option>

            <option value="salvadoran">Salvadoran</option>

            <option value="samoan">Samoan</option>

            <option value="san marinese">San Marinese</option>

            <option value="sao tomean">Sao Tomean</option>

            <option value="saudi">Saudi</option>

            <option value="scottish">Scottish</option>

            <option value="senegalese">Senegalese</option>

            <option value="serbian">Serbian</option>

            <option value="seychellois">Seychellois</option>

            <option value="sierra leonean">Sierra Leonean</option>

            <option value="singaporean">Singaporean</option>

            <option value="slovakian">Slovakian</option>

            <option value="slovenian">Slovenian</option>

            <option value="solomon islander">Solomon Islander</option>

            <option value="somali">Somali</option>

            <option value="south african">South African</option>

            <option value="south korean">South Korean</option>

            <option value="spanish">Spanish</option>

            <option value="sri lankan">Sri Lankan</option>

            <option value="sudanese">Sudanese</option>

            <option value="surinamer">Surinamer</option>

            <option value="swazi">Swazi</option>

            <option value="swedish">Swedish</option>

            <option value="swiss">Swiss</option>

            <option value="syrian">Syrian</option>

            <option value="taiwanese">Taiwanese</option>

            <option value="tajik">Tajik</option>

            <option value="tanzanian">Tanzanian</option>

            <option value="thai">Thai</option>

            <option value="togolese">Togolese</option>

            <option value="tongan">Tongan</option>

            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>

            <option value="tunisian">Tunisian</option>

            <option value="turkish">Turkish</option>

            <option value="tuvaluan">Tuvaluan</option>

            <option value="ugandan">Ugandan</option>

            <option value="ukrainian">Ukrainian</option>

            <option value="uruguayan">Uruguayan</option>

            <option value="uzbekistani">Uzbekistani</option>

            <option value="venezuelan">Venezuelan</option>

            <option value="vietnamese">Vietnamese</option>

            <option value="welsh">Welsh</option>

            <option value="yemenite">Yemenite</option>

            <option value="zambian">Zambian</option>

            <option value="zimbabwean">Zimbabwean</option>

        </select>

          </span>

      </td><td colspan="2" align="left" bgcolor="#FFFFFF"> 

          

    <span id="v2age" style='display:none'>v2 Age<br />

        <input name="v2_age" type="text"  class="validate[optional,custom[number]] text-input" id="v2_age" value="" size="5" />  </span>

      

  </td>

    </tr>

    <tr>

      <td  height="35"  bgcolor="#FFFFFF">

      <span id="v3name" style='display:none'>V3. Name <input name="v3_name" type="text"  class="validate[optional, custom[onlyLetterSp]] text-input" id="v3_name" value="" size="30" data-prompt-position="topLeft:-20" /></span></td>

        <td colspan="2" align="left" bgcolor="#FFFFFF"><span id="v3insurance" style='display:none'>V3. Insurance Details<br />

        <input name="v3_insurance" type="text"  class="text-input" id="v3_insurance" value="" size="30" /></span></td>

        <td align="left" bgcolor="#FFFFFF"><span id="v3address" style='display:none'>V3. Home Address: <br />

        <input name="v3_haddress" type="text"  class=" text-input" id="v3_haddress2" value="" size="30" />
        </span>

      </td><td colspan="2" align="left" bgcolor="#FFFFFF">

         <span id="v3nationality" style='display:none'>V3. Nationality: <br />

          <select style="height:auto" name="v3_nationality" id="v3_nationality" class=" text-input" >

            

            <option selected="selected" value="unknown">Unknown</option>

            <option value="afghan">Afghan</option>

            <option value="albanian">Albanian</option>

            <option value="algerian">Algerian</option>

            <option value="american">American</option>

            <option value="andorran">Andorran</option>

            <option value="angolan">Angolan</option>

            <option value="antiguans">Antiguans</option>

            <option value="argentinean">Argentinean</option>

            <option value="armenian">Armenian</option>

            <option value="australian">Australian</option>

            <option value="austrian">Austrian</option>

            <option value="azerbaijani">Azerbaijani</option>

            <option value="bahamian">Bahamian</option>

            <option value="bahraini">Bahraini</option>

            <option value="bangladeshi">Bangladeshi</option>

            <option value="barbadian">Barbadian</option>

            <option value="barbudans">Barbudans</option>

            <option value="batswana">Batswana</option>

            <option value="belarusian">Belarusian</option>

            <option value="belgian">Belgian</option>

            <option value="belizean">Belizean</option>

            <option value="beninese">Beninese</option>

            <option value="bhutanese">Bhutanese</option>

            <option value="bolivian">Bolivian</option>

            <option value="bosnian">Bosnian</option>

            <option value="brazilian">Brazilian</option>

            <option value="british">British</option>

            <option value="bruneian">Bruneian</option>

            <option value="bulgarian">Bulgarian</option>

            <option value="burkinabe">Burkinabe</option>

            <option value="burmese">Burmese</option>

            <option value="burundian">Burundian</option>

            <option value="cambodian">Cambodian</option>

            <option value="cameroonian">Cameroonian</option>

            <option value="canadian">Canadian</option>

            <option value="cape verdean">Cape Verdean</option>

            <option value="central african">Central African</option>

            <option value="chadian">Chadian</option>

            <option value="chilean">Chilean</option>

            <option value="chinese">Chinese</option>

            <option value="colombian">Colombian</option>

            <option value="comoran">Comoran</option>

            <option value="congolese">Congolese</option>

            <option value="costa rican">Costa Rican</option>

            <option value="croatian">Croatian</option>

            <option value="cuban">Cuban</option>

            <option value="cypriot">Cypriot</option>

            <option value="czech">Czech</option>

            <option value="danish">Danish</option>

            <option value="djibouti">Djibouti</option>

            <option value="dominican">Dominican</option>

            <option value="dutch">Dutch</option>

            <option value="east timorese">East Timorese</option>

            <option value="ecuadorean">Ecuadorean</option>

            <option value="egyptian">Egyptian</option>

            <option value="emirian">Emirian</option>

            <option value="equatorial guinean">Equatorial Guinean</option>

            <option value="eritrean">Eritrean</option>

            <option value="estonian">Estonian</option>

            <option value="ethiopian">Ethiopian</option>

            <option value="fijian">Fijian</option>

            <option value="filipino">Filipino</option>

            <option value="finnish">Finnish</option>

            <option value="french">French</option>

            <option value="gabonese">Gabonese</option>

            <option value="gambian">Gambian</option>

            <option value="georgian">Georgian</option>

            <option value="german">German</option>

            <option value="ghanaian">Ghanaian</option>

            <option value="greek">Greek</option>

            <option value="grenadian">Grenadian</option>

            <option value="guatemalan">Guatemalan</option>

            <option value="guinea-bissauan">Guinea-Bissauan</option>

            <option value="guinean">Guinean</option>

            <option value="guyanese">Guyanese</option>

            <option value="haitian">Haitian</option>

            <option value="herzegovinian">Herzegovinian</option>

            <option value="honduran">Honduran</option>

            <option value="hungarian">Hungarian</option>

            <option value="icelander">Icelander</option>

            <option value="indian">Indian</option>

            <option value="indonesian">Indonesian</option>

            <option value="iranian">Iranian</option>

            <option value="iraqi">Iraqi</option>

            <option value="irish">Irish</option>

            <option value="israeli">Israeli</option>

            <option value="italian">Italian</option>

            <option value="ivorian">Ivorian</option>

            <option value="jamaican">Jamaican</option>

            <option value="japanese">Japanese</option>

            <option value="jordanian">Jordanian</option>

            <option value="kazakhstani">Kazakhstani</option>

            <option value="kenyan" >Kenyan</option>

            <option value="kittian and nevisian">Kittian and Nevisian</option>

            <option value="kuwaiti">Kuwaiti</option>

            <option value="kyrgyz">Kyrgyz</option>

            <option value="laotian">Laotian</option>

            <option value="latvian">Latvian</option>

            <option value="lebanese">Lebanese</option>

            <option value="liberian">Liberian</option>

            <option value="libyan">Libyan</option>

            <option value="liechtensteiner">Liechtensteiner</option>

            <option value="lithuanian">Lithuanian</option>

            <option value="luxembourger">Luxembourger</option>

            <option value="macedonian">Macedonian</option>

            <option value="malagasy">Malagasy</option>

            <option value="malawian">Malawian</option>

            <option value="malaysian">Malaysian</option>

            <option value="maldivan">Maldivan</option>

            <option value="malian">Malian</option>

            <option value="maltese">Maltese</option>

            <option value="marshallese">Marshallese</option>

            <option value="mauritanian">Mauritanian</option>

            <option value="mauritian">Mauritian</option>

            <option value="mexican">Mexican</option>

            <option value="micronesian">Micronesian</option>

            <option value="moldovan">Moldovan</option>

            <option value="monacan">Monacan</option>

            <option value="mongolian">Mongolian</option>

            <option value="moroccan">Moroccan</option>

            <option value="mosotho">Mosotho</option>

            <option value="motswana">Motswana</option>

            <option value="mozambican">Mozambican</option>

            <option value="namibian">Namibian</option>

            <option value="nauruan">Nauruan</option>

            <option value="nepalese">Nepalese</option>

            <option value="new zealander">New Zealander</option>

            <option value="ni-vanuatu">Ni-Vanuatu</option>

            <option value="nicaraguan">Nicaraguan</option>

            <option value="nigerien">Nigerien</option>

            <option value="north korean">North Korean</option>

            <option value="northern irish">Northern Irish</option>

            <option value="norwegian">Norwegian</option>

            <option value="omani">Omani</option>

            <option value="pakistani">Pakistani</option>

            <option value="palauan">Palauan</option>

            <option value="panamanian">Panamanian</option>

            <option value="papua new guinean">Papua New Guinean</option>

            <option value="paraguayan">Paraguayan</option>

            <option value="peruvian">Peruvian</option>

            <option value="polish">Polish</option>

            <option value="portuguese">Portuguese</option>

            <option value="qatari">Qatari</option>

            <option value="romanian">Romanian</option>

            <option value="russian">Russian</option>

            <option value="rwandan">Rwandan</option>

            <option value="saint lucian">Saint Lucian</option>

            <option value="salvadoran">Salvadoran</option>

            <option value="samoan">Samoan</option>

            <option value="san marinese">San Marinese</option>

            <option value="sao tomean">Sao Tomean</option>

            <option value="saudi">Saudi</option>

            <option value="scottish">Scottish</option>

            <option value="senegalese">Senegalese</option>

            <option value="serbian">Serbian</option>

            <option value="seychellois">Seychellois</option>

            <option value="sierra leonean">Sierra Leonean</option>

            <option value="singaporean">Singaporean</option>

            <option value="slovakian">Slovakian</option>

            <option value="slovenian">Slovenian</option>

            <option value="solomon islander">Solomon Islander</option>

            <option value="somali">Somali</option>

            <option value="south african">South African</option>

            <option value="south korean">South Korean</option>

            <option value="spanish">Spanish</option>

            <option value="sri lankan">Sri Lankan</option>

            <option value="sudanese">Sudanese</option>

            <option value="surinamer">Surinamer</option>

            <option value="swazi">Swazi</option>

            <option value="swedish">Swedish</option>

            <option value="swiss">Swiss</option>

            <option value="syrian">Syrian</option>

            <option value="taiwanese">Taiwanese</option>

            <option value="tajik">Tajik</option>

            <option value="tanzanian">Tanzanian</option>

            <option value="thai">Thai</option>

            <option value="togolese">Togolese</option>

            <option value="tongan">Tongan</option>

            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>

            <option value="tunisian">Tunisian</option>

            <option value="turkish">Turkish</option>

            <option value="tuvaluan">Tuvaluan</option>

            <option value="ugandan">Ugandan</option>

            <option value="ukrainian">Ukrainian</option>

            <option value="uruguayan">Uruguayan</option>

            <option value="uzbekistani">Uzbekistani</option>

            <option value="venezuelan">Venezuelan</option>

            <option value="vietnamese">Vietnamese</option>

            <option value="welsh">Welsh</option>

            <option value="yemenite">Yemenite</option>

            <option value="zambian">Zambian</option>

            <option value="zimbabwean">Zimbabwean</option>

        </select>

          </span></td></tr>

      <tr>

        <td height="35" align="left"><span id="v3ppdetails" style='display:none'>V3 PP/ID Details<br />

<input name="v3_pptdetails" type="text" class="validate[optional] text-input" id="v3_pptdetails" value="" size="30" /></span> </td>

        <td height="35" colspan="2" align="left"><span id="v3age" style='display:none'>v3 Age<br />

        <input name="v3_age" type="text"  class="validate[optional,custom[number]] text-input" id="v3_age" value="" size="5" /></span></td>

        <td height="35" align="left" valign="middle"><span id="v4name" style='display:none'>V4. Name <input name="v4_name" type="text"  class="validate[optional, custom[onlyLetterSp]] text-input" id="v3_name" value="" size="30" data-prompt-position="topLeft:-20" /></span>
		</td>
        <td height="35" colspan="2" align="left" valign="middle"><span id="v4insurance" style='display:none'>V4. Insurance Details<br /><input name="v4_insurance" type="text"  class="text-input" id="v4_insurance" value="" size="30" /></span></td>
    </tr>
      <tr>
        <td height="35" align="left"><span id="v4address" style='display:none'>V4. Home Address: <br />

        <input name="v4_haddress" type="text"  class=" text-input" id="v4_haddress2" value="" size="30" />
        </span></td>
        <td height="35" colspan="2" align="left"> <span id="v4nationality" style='display:none'>V4. Nationality: <br />

          <select style="height:auto" name="v4_nationality" id="v4_nationality" class=" text-input" >

            

            <option selected="selected" value="unknown">Unknown</option>

            <option value="afghan">Afghan</option>

            <option value="albanian">Albanian</option>

            <option value="algerian">Algerian</option>

            <option value="american">American</option>

            <option value="andorran">Andorran</option>

            <option value="angolan">Angolan</option>

            <option value="antiguans">Antiguans</option>

            <option value="argentinean">Argentinean</option>

            <option value="armenian">Armenian</option>

            <option value="australian">Australian</option>

            <option value="austrian">Austrian</option>

            <option value="azerbaijani">Azerbaijani</option>

            <option value="bahamian">Bahamian</option>

            <option value="bahraini">Bahraini</option>

            <option value="bangladeshi">Bangladeshi</option>

            <option value="barbadian">Barbadian</option>

            <option value="barbudans">Barbudans</option>

            <option value="batswana">Batswana</option>

            <option value="belarusian">Belarusian</option>

            <option value="belgian">Belgian</option>

            <option value="belizean">Belizean</option>

            <option value="beninese">Beninese</option>

            <option value="bhutanese">Bhutanese</option>

            <option value="bolivian">Bolivian</option>

            <option value="bosnian">Bosnian</option>

            <option value="brazilian">Brazilian</option>

            <option value="british">British</option>

            <option value="bruneian">Bruneian</option>

            <option value="bulgarian">Bulgarian</option>

            <option value="burkinabe">Burkinabe</option>

            <option value="burmese">Burmese</option>

            <option value="burundian">Burundian</option>

            <option value="cambodian">Cambodian</option>

            <option value="cameroonian">Cameroonian</option>

            <option value="canadian">Canadian</option>

            <option value="cape verdean">Cape Verdean</option>

            <option value="central african">Central African</option>

            <option value="chadian">Chadian</option>

            <option value="chilean">Chilean</option>

            <option value="chinese">Chinese</option>

            <option value="colombian">Colombian</option>

            <option value="comoran">Comoran</option>

            <option value="congolese">Congolese</option>

            <option value="costa rican">Costa Rican</option>

            <option value="croatian">Croatian</option>

            <option value="cuban">Cuban</option>

            <option value="cypriot">Cypriot</option>

            <option value="czech">Czech</option>

            <option value="danish">Danish</option>

            <option value="djibouti">Djibouti</option>

            <option value="dominican">Dominican</option>

            <option value="dutch">Dutch</option>

            <option value="east timorese">East Timorese</option>

            <option value="ecuadorean">Ecuadorean</option>

            <option value="egyptian">Egyptian</option>

            <option value="emirian">Emirian</option>

            <option value="equatorial guinean">Equatorial Guinean</option>

            <option value="eritrean">Eritrean</option>

            <option value="estonian">Estonian</option>

            <option value="ethiopian">Ethiopian</option>

            <option value="fijian">Fijian</option>

            <option value="filipino">Filipino</option>

            <option value="finnish">Finnish</option>

            <option value="french">French</option>

            <option value="gabonese">Gabonese</option>

            <option value="gambian">Gambian</option>

            <option value="georgian">Georgian</option>

            <option value="german">German</option>

            <option value="ghanaian">Ghanaian</option>

            <option value="greek">Greek</option>

            <option value="grenadian">Grenadian</option>

            <option value="guatemalan">Guatemalan</option>

            <option value="guinea-bissauan">Guinea-Bissauan</option>

            <option value="guinean">Guinean</option>

            <option value="guyanese">Guyanese</option>

            <option value="haitian">Haitian</option>

            <option value="herzegovinian">Herzegovinian</option>

            <option value="honduran">Honduran</option>

            <option value="hungarian">Hungarian</option>

            <option value="icelander">Icelander</option>

            <option value="indian">Indian</option>

            <option value="indonesian">Indonesian</option>

            <option value="iranian">Iranian</option>

            <option value="iraqi">Iraqi</option>

            <option value="irish">Irish</option>

            <option value="israeli">Israeli</option>

            <option value="italian">Italian</option>

            <option value="ivorian">Ivorian</option>

            <option value="jamaican">Jamaican</option>

            <option value="japanese">Japanese</option>

            <option value="jordanian">Jordanian</option>

            <option value="kazakhstani">Kazakhstani</option>

            <option value="kenyan" >Kenyan</option>

            <option value="kittian and nevisian">Kittian and Nevisian</option>

            <option value="kuwaiti">Kuwaiti</option>

            <option value="kyrgyz">Kyrgyz</option>

            <option value="laotian">Laotian</option>

            <option value="latvian">Latvian</option>

            <option value="lebanese">Lebanese</option>

            <option value="liberian">Liberian</option>

            <option value="libyan">Libyan</option>

            <option value="liechtensteiner">Liechtensteiner</option>

            <option value="lithuanian">Lithuanian</option>

            <option value="luxembourger">Luxembourger</option>

            <option value="macedonian">Macedonian</option>

            <option value="malagasy">Malagasy</option>

            <option value="malawian">Malawian</option>

            <option value="malaysian">Malaysian</option>

            <option value="maldivan">Maldivan</option>

            <option value="malian">Malian</option>

            <option value="maltese">Maltese</option>

            <option value="marshallese">Marshallese</option>

            <option value="mauritanian">Mauritanian</option>

            <option value="mauritian">Mauritian</option>

            <option value="mexican">Mexican</option>

            <option value="micronesian">Micronesian</option>

            <option value="moldovan">Moldovan</option>

            <option value="monacan">Monacan</option>

            <option value="mongolian">Mongolian</option>

            <option value="moroccan">Moroccan</option>

            <option value="mosotho">Mosotho</option>

            <option value="motswana">Motswana</option>

            <option value="mozambican">Mozambican</option>

            <option value="namibian">Namibian</option>

            <option value="nauruan">Nauruan</option>

            <option value="nepalese">Nepalese</option>

            <option value="new zealander">New Zealander</option>

            <option value="ni-vanuatu">Ni-Vanuatu</option>

            <option value="nicaraguan">Nicaraguan</option>

            <option value="nigerien">Nigerien</option>

            <option value="north korean">North Korean</option>

            <option value="northern irish">Northern Irish</option>

            <option value="norwegian">Norwegian</option>

            <option value="omani">Omani</option>

            <option value="pakistani">Pakistani</option>

            <option value="palauan">Palauan</option>

            <option value="panamanian">Panamanian</option>

            <option value="papua new guinean">Papua New Guinean</option>

            <option value="paraguayan">Paraguayan</option>

            <option value="peruvian">Peruvian</option>

            <option value="polish">Polish</option>

            <option value="portuguese">Portuguese</option>

            <option value="qatari">Qatari</option>

            <option value="romanian">Romanian</option>

            <option value="russian">Russian</option>

            <option value="rwandan">Rwandan</option>

            <option value="saint lucian">Saint Lucian</option>

            <option value="salvadoran">Salvadoran</option>

            <option value="samoan">Samoan</option>

            <option value="san marinese">San Marinese</option>

            <option value="sao tomean">Sao Tomean</option>

            <option value="saudi">Saudi</option>

            <option value="scottish">Scottish</option>

            <option value="senegalese">Senegalese</option>

            <option value="serbian">Serbian</option>

            <option value="seychellois">Seychellois</option>

            <option value="sierra leonean">Sierra Leonean</option>

            <option value="singaporean">Singaporean</option>

            <option value="slovakian">Slovakian</option>

            <option value="slovenian">Slovenian</option>

            <option value="solomon islander">Solomon Islander</option>

            <option value="somali">Somali</option>

            <option value="south african">South African</option>

            <option value="south korean">South Korean</option>

            <option value="spanish">Spanish</option>

            <option value="sri lankan">Sri Lankan</option>

            <option value="sudanese">Sudanese</option>

            <option value="surinamer">Surinamer</option>

            <option value="swazi">Swazi</option>

            <option value="swedish">Swedish</option>

            <option value="swiss">Swiss</option>

            <option value="syrian">Syrian</option>

            <option value="taiwanese">Taiwanese</option>

            <option value="tajik">Tajik</option>

            <option value="tanzanian">Tanzanian</option>

            <option value="thai">Thai</option>

            <option value="togolese">Togolese</option>

            <option value="tongan">Tongan</option>

            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>

            <option value="tunisian">Tunisian</option>

            <option value="turkish">Turkish</option>

            <option value="tuvaluan">Tuvaluan</option>

            <option value="ugandan">Ugandan</option>

            <option value="ukrainian">Ukrainian</option>

            <option value="uruguayan">Uruguayan</option>

            <option value="uzbekistani">Uzbekistani</option>

            <option value="venezuelan">Venezuelan</option>

            <option value="vietnamese">Vietnamese</option>

            <option value="welsh">Welsh</option>

            <option value="yemenite">Yemenite</option>

            <option value="zambian">Zambian</option>

            <option value="zimbabwean">Zimbabwean</option>

        </select>

          </span></td>
        <td height="35" align="left"><span id="v4ppdetails" style='display:none'>V4 PP/ID Details<br />

<input name="v4_pptdetails" type="text" class="validate[optional] text-input" id="v4_pptdetails" value="" size="30" /></span></td>
        <td height="35" colspan="2" align="left"><span id="v4age" style='display:none'>V4 Age<br />

        <input name="v4_age" type="text"  class="validate[optional,custom[number]] text-input" id="v4_age" value="" size="5" /></span></td>
      </tr>
      <tr>
        <td height="35" align="left">&nbsp;</td>
        <td height="35" colspan="2" align="left">&nbsp;</td>
        <td height="35" align="left"><input type="submit" name="button" id="button" value="  Save " /></td>
        <td height="35" align="left">&nbsp;</td>
        <td height="35" align="left">&nbsp;</td>
      </tr>

      <tr id="servedby" class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="6" align="center" bgcolor="#333333">Served By: 

        <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>

</html>

