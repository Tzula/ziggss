<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<script>
function validate(){
	var agree1 = document.getElementById("agreement");
	var agree2 = document.getElementById("rocagree");
	if (agree1.checked && agree2.checked){
		return true;
	}else{
		alert("You can create account after agree to GAMETEASER.com's User Agreement");
		return false;
	}
}
</script>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">

			<div id="sectionHeader"><span><h1>Create yourself an account... it's free!</h1></span>
			
			</div>
			
			<div style="width:100%" align="center">
													<div class="social-login facebook jfbcLogin pull-left">
        												<a id="sc_fblogin" href="javascript:void(0)" onclick="jfbc.login.provider('facebook');">
            											<img src="/media/sourcecoast/images/provider/facebook/icon_label.png" alt="Login With Facebook" title="Login With Facebook"></a>
           											</div>
           											<!--  
           											<div class="social-login google scGoogleLogin pull-left">
        												<a id="sc_gologin" href="javascript:void(0)" onclick="jfbc.login.provider('google');">
            											<img src="/media/sourcecoast/images/provider/google/icon_label.png" alt="Login With Google" title="Login With Google"></a>
            										</div>
            										-->
            										<div class="social-login twitter scTwitterLogin pull-left">
        												<a id="sc_twlogin" href="javascript:void(0)" onclick="jfbc.login.provider('twitter');">
            											<img src="/media/sourcecoast/images/provider/twitter/icon_label.png" alt="Login With Twitter" title="Login With Twitter"></a>
            										</div>
            										<!-- 
            										<div class="social-login amazon scAmazonLogin pull-left">
        												<a id="sc_amazonlogin" href="javascript:void(0)" onclick="jfbc.login.provider('amazon');">
            											<img src="/media/sourcecoast/images/provider/amazon/icon_label.png" alt="Login With Amazon" title="Login With Amazon"></a>
            										</div>
            										 -->
            										<div class="social-login instagram scInstagramLogin pull-left">
        												<a id="sc_instagramlogin" href="javascript:void(0)" onclick="jfbc.login.provider('instagram');">
            											<img src="/media/sourcecoast/images/provider/instagram/icon_label.png" alt="Login With Instagram" title="Login With Instagram"></a>
           											</div>
           											<div style="clear: both;"></div>
           											
           											<br/>
												</div>
			
			<!-- <div style="color:red;" align="center"><strong>NOTE: @yahoo.com and @aol.com email addresses will most likely experience delays as long as 2 hours in receiving our activation emails.  Please do not register using a @yahoo.com or @aol.com email address if you are expecting to activate your account immediately for beta key or other promotional giveaways.</strong></div> -->

			<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form commonform" enctype="multipart/form-data" onsubmit="return validate();">

			<?php echo JHtml::_('form.token');?>
			<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="registration.register" />
							
				
				<div class="row">
					<label for="jform[username]">Choose a username<span class="req">*</span></label>
					<p>
					<input type="text" name="jform[username]" id="jform_username" value="" class="text" size="24" required="" aria-required="true">
					<br><span>4-20 characters, no spaces and must be unique</span></p>
					<span class="clear"></span>
				</div>

				<div class="row">
					<label for="jform[password1]">Password<span class="req">*</span></label>
					<p>
					<input type="password" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="password" size="18" maxlength="75" required="" aria-required="true">&nbsp;
					<input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="password" size="18" maxlength="75" required="" aria-required="true">
					
					<br><span>6-20 characters, at least 1 letter and 1 number, no spaces, and enter it twice</span></p>
					<span class="clear"></span>
				</div>

				
				
				


				<div class="row break">
					<label for="jform[email1]">Email Address<span class="req">*</span></label>
					<p>
					<input type="email" name="jform[email1]" class="text" id="jform_email1" value="" maxlength="75" size="27" required="" aria-required="true">&nbsp;
					<input type="email" name="jform[email2]" class="text" id="jform_email2" value="" maxlength="75" size="27" required="" aria-required="true">
					<br><span>Must be a valid address to complete registration, and enter it twice</span></p>
					<span class="clear"></span>
				</div>
				
				<div class="row break">
					<label for="first">Full Name<span class="req">*</span></label>
					<p><input type="text" name="jform[name]" id="jform_name" value="" class="text" size="25" maxlength="50" required="" aria-required="true"></p>
					<span class="clear"></span>
				</div>

				<!--
				<div class="row">
					<label for="bdaymonth">Birthday &amp; Gender<span class="req">*</span><br><span class="ext">Legal reasons only</span></label>
					<p>
						<select name="bdaymonth">
							
								<option value="1" selected="">Jan</option>
							
								<option value="2">Feb</option>
							
								<option value="3">Mar</option>
							
								<option value="4">Apr</option>
							
								<option value="5">May</option>
							
								<option value="6">Jun</option>
							
								<option value="7">Jul</option>
							
								<option value="8">Aug</option>
							
								<option value="9">Sep</option>
							
								<option value="10">Oct</option>
							
								<option value="11">Nov</option>
							
								<option value="12">Dec</option>
							
						</select>&nbsp;<select name="bdayday">
							
								<option value="1" selected="">1</option>
							
								<option value="2">2</option>
							
								<option value="3">3</option>
							
								<option value="4">4</option>
							
								<option value="5">5</option>
							
								<option value="6">6</option>
							
								<option value="7">7</option>
							
								<option value="8">8</option>
							
								<option value="9">9</option>
							
								<option value="10">10</option>
							
								<option value="11">11</option>
							
								<option value="12">12</option>
							
								<option value="13">13</option>
							
								<option value="14">14</option>
							
								<option value="15">15</option>
							
								<option value="16">16</option>
							
								<option value="17">17</option>
							
								<option value="18">18</option>
							
								<option value="19">19</option>
							
								<option value="20">20</option>
							
								<option value="21">21</option>
							
								<option value="22">22</option>
							
								<option value="23">23</option>
							
								<option value="24">24</option>
							
								<option value="25">25</option>
							
								<option value="26">26</option>
							
								<option value="27">27</option>
							
								<option value="28">28</option>
							
								<option value="29">29</option>
							
								<option value="30">30</option>
							
								<option value="31">31</option>
							
						</select>&nbsp;<select name="bdayyear">
							
								<option value="2015">2015</option>
							
								<option value="2014">2014</option>
							
								<option value="2013">2013</option>
							
								<option value="2012">2012</option>
							
								<option value="2011">2011</option>
							
								<option value="2010">2010</option>
							
								<option value="2009">2009</option>
							
								<option value="2008">2008</option>
							
								<option value="2007">2007</option>
							
								<option value="2006">2006</option>
							
								<option value="2005">2005</option>
							
								<option value="2004">2004</option>
							
								<option value="2003">2003</option>
							
								<option value="2002">2002</option>
							
								<option value="2001">2001</option>
							
								<option value="2000">2000</option>
							
								<option value="1999">1999</option>
							
								<option value="1998">1998</option>
							
								<option value="1997">1997</option>
							
								<option value="1996">1996</option>
							
								<option value="1995">1995</option>
							
								<option value="1994">1994</option>
							
								<option value="1993">1993</option>
							
								<option value="1992">1992</option>
							
								<option value="1991">1991</option>
							
								<option value="1990">1990</option>
							
								<option value="1989">1989</option>
							
								<option value="1988">1988</option>
							
								<option value="1987">1987</option>
							
								<option value="1986">1986</option>
							
								<option value="1985">1985</option>
							
								<option value="1984">1984</option>
							
								<option value="1983">1983</option>
							
								<option value="1982">1982</option>
							
								<option value="1981">1981</option>
							
								<option value="1980" selected="">1980</option>
							
								<option value="1979">1979</option>
							
								<option value="1978">1978</option>
							
								<option value="1977">1977</option>
							
								<option value="1976">1976</option>
							
								<option value="1975">1975</option>
							
								<option value="1974">1974</option>
							
								<option value="1973">1973</option>
							
								<option value="1972">1972</option>
							
								<option value="1971">1971</option>
							
								<option value="1970">1970</option>
							
								<option value="1969">1969</option>
							
								<option value="1968">1968</option>
							
								<option value="1967">1967</option>
							
								<option value="1966">1966</option>
							
								<option value="1965">1965</option>
							
								<option value="1964">1964</option>
							
								<option value="1963">1963</option>
							
								<option value="1962">1962</option>
							
								<option value="1961">1961</option>
							
								<option value="1960">1960</option>
							
								<option value="1959">1959</option>
							
								<option value="1958">1958</option>
							
								<option value="1957">1957</option>
							
								<option value="1956">1956</option>
							
								<option value="1955">1955</option>
							
								<option value="1954">1954</option>
							
								<option value="1953">1953</option>
							
								<option value="1952">1952</option>
							
								<option value="1951">1951</option>
							
								<option value="1950">1950</option>
							
								<option value="1949">1949</option>
							
								<option value="1948">1948</option>
							
								<option value="1947">1947</option>
							
								<option value="1946">1946</option>
							
								<option value="1945">1945</option>
							
								<option value="1944">1944</option>
							
								<option value="1943">1943</option>
							
								<option value="1942">1942</option>
							
								<option value="1941">1941</option>
							
								<option value="1940">1940</option>
							
								<option value="1939">1939</option>
							
								<option value="1938">1938</option>
							
								<option value="1937">1937</option>
							
								<option value="1936">1936</option>
							
								<option value="1935">1935</option>
							
								<option value="1934">1934</option>
							
								<option value="1933">1933</option>
							
								<option value="1932">1932</option>
							
								<option value="1931">1931</option>
							
								<option value="1930">1930</option>
							
								<option value="1929">1929</option>
							
								<option value="1928">1928</option>
							
								<option value="1927">1927</option>
							
								<option value="1926">1926</option>
							
								<option value="1925">1925</option>
							
								<option value="1924">1924</option>
							
								<option value="1923">1923</option>
							
								<option value="1922">1922</option>
							
								<option value="1921">1921</option>
							
								<option value="1920">1920</option>
							
								<option value="1919">1919</option>
							
								<option value="1918">1918</option>
							
								<option value="1917">1917</option>
							
								<option value="1916">1916</option>
							
						</select>&nbsp;<select name="gender">
							<option value="Male" selected="">Male</option>
							<option value="Female">Female</option>
						</select>
						<br><span>You need to be over 13 years old to be a member of our site</span>
					</p>
					<span class="clear"></span>
				</div>
				
				<div class="row">
					<label for="city">City<span class="req">*</span></label>
					<p><input type="TEXT" class="text" name="city" value="" size="30" maxlength="75"></p>
					<span class="clear"></span>
				</div>

				<div class="row">
					<label for="State">State/Province<span class="req">*</span></label>
					<p></p><div id="thisRow">
							<select name="State">
								<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select>
						</div><p></p>
						<span class="clear"></span>
				</div>

				<div class="row">
					<label for="Country">Country<span class="req">*</span></label>
					<p><select name="Country" onchange="PopulateState()">
							
								<option value="4">Afghanistan</option>
							
								<option value="5">Albania</option>
							
								<option value="6">Algeria</option>
							
								<option value="7">American Samoa</option>
							
								<option value="8">Andorra</option>
							
								<option value="10">Angola</option>
							
								<option value="11">Anguilla</option>
							
								<option value="12">Antigua and Barbuda</option>
							
								<option value="9">Argentina</option>
							
								<option value="13">Armenia</option>
							
								<option value="14">Aruba</option>
							
								<option value="15">Ascension Island</option>
							
								<option value="16">Australia</option>
							
								<option value="17">Austria</option>
							
								<option value="18">Azerbaijan</option>
							
								<option value="19">Bahamas</option>
							
								<option value="20">Bahrain</option>
							
								<option value="21">Bangladesh</option>
							
								<option value="22">Barbados</option>
							
								<option value="23">Belarus</option>
							
								<option value="24">Belgium</option>
							
								<option value="25">Belize</option>
							
								<option value="26">Benin</option>
							
								<option value="27">Bermuda</option>
							
								<option value="28">Bhutan</option>
							
								<option value="29">Bolivia</option>
							
								<option value="30">Bosnia and Herzegovina</option>
							
								<option value="31">Botswana</option>
							
								<option value="32">Brazil</option>
							
								<option value="33">British Indian Ocean Territory</option>
							
								<option value="34">Brunei Darussalam</option>
							
								<option value="35">Bulgaria</option>
							
								<option value="36">Burkina Faso</option>
							
								<option value="37">Burundi</option>
							
								<option value="38">Cambodia</option>
							
								<option value="39">Cameroon</option>
							
								<option value="2">Canada</option>
							
								<option value="40">Cape Verde</option>
							
								<option value="41">Cayman Islands</option>
							
								<option value="42">Central African Republic</option>
							
								<option value="43">Chad</option>
							
								<option value="45">Chile</option>
							
								<option value="44">China</option>
							
								<option value="46">Christmas Island</option>
							
								<option value="47">Cocos (Keeling) Islands</option>
							
								<option value="48">Colombia</option>
							
								<option value="49">Comoros</option>
							
								<option value="50">Congo</option>
							
								<option value="51">Cook Islands</option>
							
								<option value="52">Costa Rica</option>
							
								<option value="53">Cote D Ivoire</option>
							
								<option value="54">Croatia</option>
							
								<option value="55">Cuba</option>
							
								<option value="56">Cyprus</option>
							
								<option value="57">Czech Republic</option>
							
								<option value="58">Denmark</option>
							
								<option value="59">Djibouti</option>
							
								<option value="60">Dominican Republic</option>
							
								<option value="63">Ecuador</option>
							
								<option value="61">Egypt</option>
							
								<option value="62">El Salvador</option>
							
								<option value="64">Equatorial Guinea</option>
							
								<option value="65">Eritrea</option>
							
								<option value="66">Estonia</option>
							
								<option value="67">Ethiopia</option>
							
								<option value="68">Falkland Islands (Malvinas)</option>
							
								<option value="69">Faroe Islands</option>
							
								<option value="70">Federated States of Micronesia</option>
							
								<option value="71">Fiji</option>
							
								<option value="72">Finland</option>
							
								<option value="73">France</option>
							
								<option value="74">French Guiana</option>
							
								<option value="75">French Polynesia</option>
							
								<option value="76">Gabon</option>
							
								<option value="77">Gambia</option>
							
								<option value="79">Georgia</option>
							
								<option value="80">Germany</option>
							
								<option value="81">Ghana</option>
							
								<option value="82">Gibraltar</option>
							
								<option value="83">Greece</option>
							
								<option value="84">Greenland</option>
							
								<option value="85">Grenada</option>
							
								<option value="86">Guadeloupe</option>
							
								<option value="87">Guam</option>
							
								<option value="88">Guatemala</option>
							
								<option value="89">Guernsey</option>
							
								<option value="90">Guinea</option>
							
								<option value="91">Guinea-Bissau</option>
							
								<option value="92">Guyana</option>
							
								<option value="93">Haiti</option>
							
								<option value="94">Holy See (Vatican City State)</option>
							
								<option value="95">Honduras</option>
							
								<option value="96">Hong Kong</option>
							
								<option value="97">Hungary</option>
							
								<option value="98">Iceland</option>
							
								<option value="99">India</option>
							
								<option value="100">Indonesia</option>
							
								<option value="101">Iran</option>
							
								<option value="102">Iraq</option>
							
								<option value="103">Ireland</option>
							
								<option value="104">Israel</option>
							
								<option value="105">Italy</option>
							
								<option value="106">Jamaica</option>
							
								<option value="108">Japan</option>
							
								<option value="107">Jarvis Island</option>
							
								<option value="109">Jordan</option>
							
								<option value="110">Kazakhstan</option>
							
								<option value="111">Kenya</option>
							
								<option value="112">Kiribati</option>
							
								<option value="113">Korea (Peoples Republic of)</option>
							
								<option value="114">Korea (Republic of)</option>
							
								<option value="115">Kuwait</option>
							
								<option value="116">Laos</option>
							
								<option value="117">Latvia</option>
							
								<option value="118">Lebanon</option>
							
								<option value="119">Lesotho</option>
							
								<option value="120">Liberia</option>
							
								<option value="121">Liechtenstein</option>
							
								<option value="122">Lithuania</option>
							
								<option value="123">Luxembourg</option>
							
								<option value="124">Macau</option>
							
								<option value="125">Macedonia</option>
							
								<option value="126">Madagascar</option>
							
								<option value="127">Malawi</option>
							
								<option value="128">Malaysia</option>
							
								<option value="129">Maldives</option>
							
								<option value="130">Mali</option>
							
								<option value="131">Malta</option>
							
								<option value="132">Marshall Islands</option>
							
								<option value="133">Martinique</option>
							
								<option value="134">Mauritius</option>
							
								<option value="135">Mayotte</option>
							
								<option value="3">Mexico</option>
							
								<option value="136">Moldavia</option>
							
								<option value="137">Monaco</option>
							
								<option value="138">Mongolia</option>
							
								<option value="139">Montenegro</option>
							
								<option value="140">Montserrat</option>
							
								<option value="141">Morocco</option>
							
								<option value="142">Mozambique</option>
							
								<option value="143">Myanmar</option>
							
								<option value="144">Namibia</option>
							
								<option value="145">Nauru</option>
							
								<option value="146">Nepal</option>
							
								<option value="147">Netherlands</option>
							
								<option value="148">Netherlands Antilles</option>
							
								<option value="149">New Caledonia</option>
							
								<option value="150">New Zealand</option>
							
								<option value="151">Nicaragua</option>
							
								<option value="152">Niger</option>
							
								<option value="153">Nigeria</option>
							
								<option value="154">Niue</option>
							
								<option value="155">Norfolk Island</option>
							
								<option value="157">Northern Mariana Islands</option>
							
								<option value="158">Norway</option>
							
								<option value="159">Oman</option>
							
								<option value="160">Pakistan</option>
							
								<option value="161">Palau</option>
							
								<option value="78">Palestinian Territory Occupied</option>
							
								<option value="162">Panama</option>
							
								<option value="163">Papua New Guinea</option>
							
								<option value="164">Paraguay</option>
							
								<option value="165">Peru</option>
							
								<option value="166">Philippines</option>
							
								<option value="167">Pitcairn</option>
							
								<option value="168">Poland</option>
							
								<option value="169">Portugal</option>
							
								<option value="170">Puerto Rico</option>
							
								<option value="171">Qatar</option>
							
								<option value="172">Reunion</option>
							
								<option value="173">Romania</option>
							
								<option value="174">Russian Federation</option>
							
								<option value="175">Rwanda</option>
							
								<option value="176">Saint Vincent and the Grenadines</option>
							
								<option value="177">San Marino</option>
							
								<option value="178">Sao Tome and Principe</option>
							
								<option value="179">Saudi Arabia</option>
							
								<option value="180">Senegal</option>
							
								<option value="181">Serbia</option>
							
								<option value="182">Seychelles</option>
							
								<option value="183">Sierra Leone</option>
							
								<option value="184">Singapore</option>
							
								<option value="187">Slovakia</option>
							
								<option value="186">Slovenia</option>
							
								<option value="188">Solomon Islands</option>
							
								<option value="189">Somalia</option>
							
								<option value="190">South Africa</option>
							
								<option value="191">South Georgia and the Sount Sandwich Islands</option>
							
								<option value="193">Spain</option>
							
								<option value="185">Sri Lanka</option>
							
								<option value="194">St. Helena Acension and Tristan Da Cunha</option>
							
								<option value="195">St. Kitts and Nevis</option>
							
								<option value="196">St. Lucia</option>
							
								<option value="197">Sudan</option>
							
								<option value="198">Suriname</option>
							
								<option value="199">Svalbard and Jan Mayen</option>
							
								<option value="200">Swaziland</option>
							
								<option value="201">Sweden</option>
							
								<option value="202">Switzerland</option>
							
								<option value="203">Syrian Arab Republic</option>
							
								<option value="206">Taiwan</option>
							
								<option value="204">Tajikistan</option>
							
								<option value="205">Tanzania</option>
							
								<option value="207">Thailand</option>
							
								<option value="208">Togo</option>
							
								<option value="209">Tokelau</option>
							
								<option value="210">Tonga</option>
							
								<option value="211">Trinidad and Tobago</option>
							
								<option value="213">Tunisia</option>
							
								<option value="214">Turkey</option>
							
								<option value="215">Turkmenistan</option>
							
								<option value="216">Turks and Caicos Islands</option>
							
								<option value="217">Tuvalu</option>
							
								<option value="218">Uganda</option>
							
								<option value="219">Ukraine</option>
							
								<option value="220">United Arab Emirates</option>
							
								<option value="221">United Kingdom</option>
							
								<option value="1" selected="">United States</option>
							
								<option value="222">Uruguay</option>
							
								<option value="223">Uzbekistan</option>
							
								<option value="224">Vanuatu</option>
							
								<option value="225">Venezuela</option>
							
								<option value="226">Vietnam</option>
							
								<option value="227">Virgin Islands (UK)</option>
							
								<option value="228">Virgin Islands (US)</option>
							
								<option value="229">Wallis and Futanu Islands</option>
							
								<option value="231">Western Sahara</option>
							
								<option value="232">Western Somoa</option>
							
								<option value="233">Yemen</option>
							
								<option value="234">Yugoslavia</option>
							
								<option value="235">Zaire</option>
							
								<option value="236">Zambia</option>
							
								<option value="237">Zimbabwe</option>
							
						</select></p>
						<span class="clear"></span>
				</div>

				<div class="row">
					<label for="timeZoneId">Timezone</label>
					<p><select name="timeZoneId">
						
							<option value="1">(GMT -12:00) Eniwetok, Kwajalein</option>
						
							<option value="2">(GMT -11:00) Midway Is, Samoa</option>
						
							<option value="3">(GMT -10:00) Hawaii</option>
						
							<option value="4">(GMT -10:00) Alaska</option>
						
							<option value="5">(GMT -08:00) Pacific Time (US &amp; Canada); Tijuana</option>
						
							<option value="6">(GMT -07:00) Chihuahua, La Paz, Mazatlan</option>
						
							<option value="7">(GMT -07:00) Mountain Time (US &amp; Canada)</option>
						
							<option value="8">(GMT -07:00) Arizona</option>
						
							<option value="9">(GMT -06:00) Central Time (US &amp; Canada)</option>
						
							<option value="10">(GMT -06:00) Mexico City, Tegucigalpa</option>
						
							<option value="11">(GMT -06:00) Saskatchewan</option>
						
							<option value="12">(GMT -06:00) Central America</option>
						
							<option value="13" selected="">(GMT -05:00) Eastern Time (US &amp; Canada)</option>
						
							<option value="14">(GMT -05:00) Indiana (East)</option>
						
							<option value="15">(GMT -05:00) Bogota, Lima, Quito</option>
						
							<option value="16">(GMT -04:00) Atlantic Time (Canada)</option>
						
							<option value="17">(GMT -04:00) Caracas, La Paz</option>
						
							<option value="18">(GMT -04:00) Santiago</option>
						
							<option value="19">(GMT -03:30) Newfoundland</option>
						
							<option value="20">(GMT -03:00) Buenos Aires, Georgetown</option>
						
							<option value="21">(GMT -03:00) Brasilia</option>
						
							<option value="22">(GMT -03:00) Greenland</option>
						
							<option value="23">(GMT -02:00) Mid-Atlantic</option>
						
							<option value="24">(GMT -01:00) Azores</option>
						
							<option value="25">(GMT -01:00) Cape Verde Is</option>
						
							<option value="26">(GMT 0:00) Casablanca, Monrovia</option>
						
							<option value="27">(GMT 0:00) Greenwich Mean Time: Dublin, Edinburgh, Lisbon, London</option>
						
							<option value="28">(GMT +01:00) Amsterdam, CopenHagen, Madrid, Paris, Vilnius</option>
						
							<option value="29">(GMT +01:00) West Central Africa</option>
						
							<option value="30">(GMT +01:00) Belgrade, Sarajevo, Skopje, Sofija, Zagreb</option>
						
							<option value="31">(GMT +01:00) Bratislava, Budapest, Ljubljana, Prague, Warsaw</option>
						
							<option value="32">(GMT +01:00) Brussels, Berlin, Bern, Rome, Stockholm, Vienna</option>
						
							<option value="33">(GMT +02:00) Cairo</option>
						
							<option value="34">(GMT +02:00) Harare, Pretoria</option>
						
							<option value="35">(GMT +02:00) Israel</option>
						
							<option value="36">(GMT +02:00) Bucharest</option>
						
							<option value="37">(GMT +02:00) Helsinki, Riga, Tallinn</option>
						
							<option value="38">(GMT +02:00) Athens, Istanbul, Minsk</option>
						
							<option value="39">(GMT +03:00) Kuwait, Riyadh</option>
						
							<option value="40">(GMT +03:00) Nairobi</option>
						
							<option value="41">(GMT +03:00) Baghdad</option>
						
							<option value="42">(GMT +03:00) Moscow, St. Petersburg, Volgograd</option>
						
							<option value="43">(GMT +03:30) Tehran</option>
						
							<option value="44">(GMT +04:00) Abu Dhabi, Muscat</option>
						
							<option value="45">(GMT +04:00) Baku, Tbilisi</option>
						
							<option value="46">(GMT +04:00) Kabul</option>
						
							<option value="47">(GMT +05:00) Islamabad, Karachi, Tashkent</option>
						
							<option value="48">(GMT +05:00) Ekaterinburg</option>
						
							<option value="49">(GMT +05:30) Bombay, Calcutta, Madras, New Delhi</option>
						
							<option value="50">(GMT +05:45) Kathmandu</option>
						
							<option value="51">(GMT +06:00) Almaty, Dhaka</option>
						
							<option value="52">(GMT +06:00) Columbo</option>
						
							<option value="53">(GMT +06:00) Almaty, Novosibirsk</option>
						
							<option value="54">(GMT +06:30) Rangoon</option>
						
							<option value="55">(GMT +07:00) Bangkok, Hanoi, Jakarta</option>
						
							<option value="56">(GMT +07:00) Krasnoyarsk</option>
						
							<option value="57">(GMT +08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
						
							<option value="58">(GMT +08:00) Perth</option>
						
							<option value="59">(GMT +08:00) Singapore</option>
						
							<option value="60">(GMT +08:00) Taipei</option>
						
							<option value="61">(GMT +08:00) Irkutsk, Ulaan Bataar</option>
						
							<option value="62">(GMT +09:00) Osako, Sapporo, Tokyo</option>
						
							<option value="63">(GMT +09:00) Seoul</option>
						
							<option value="64">(GMT +09:00) Yakutsk</option>
						
							<option value="65">(GMT +09:30) Darwin</option>
						
							<option value="66">(GMT +09:30) Adelaide</option>
						
							<option value="67">(GMT +10:00) Canberra, Melbourne, Sydney</option>
						
							<option value="68">(GMT +10:00) Brisbane</option>
						
							<option value="69">(GMT +10:00) Guam, Port Moresby</option>
						
							<option value="70">(GMT +10:00) Hobart</option>
						
							<option value="71">(GMT +10:00) Vladivostok</option>
						
							<option value="72">(GMT +11:00) Magadan, Solomon Is, New Caledonia</option>
						
							<option value="73">(GMT +12:00) Fiji, Kamchatka, Marshall Is</option>
						
							<option value="74">(GMT +12:00) Auckland, Wellington</option>
						
							<option value="75">(GMT +13:00) Nuku'alofa</option>
						
					</select></p>
					<span class="clear"></span>
				</div>				
				-->
								
				<div class="row break">
					<label for="agreement">GAMETEASER.com User Agreement</label>
					<p></p><div class="agreement">
<p><strong>GAMETEASER.COM MESSAGE BOARD TERMS AND CONDITIONS OF USE</strong><br>
GAMETEASER.COM message boards provide members an opportunity to submit, post, express, display, transmit and exchange information, ideas, messages, opinions, content and other material. Our message boards are provided for the noncommercial use of our members. Your use of our message boards is specifically governed by these terms and conditions. You automatically agree to these terms when you register, access or use our message board.
</p>

<p><strong>Posted Materials</strong><br>
GAMETEASER.COM's authors, owners or operators are not responsible and assumes no liability for any ideas, opinions, content, information, messages, transmissions or other materials posted to our message boards. GAMETEASER.COM does not represent, endorse, warrant or vouch for any posted materials or the validity, accuracy, completeness, reliability, timeliness or usefulness of any content in any way. Any opinions or similar statements expressed in posted materials are not necessarily those of the GAMETEASER.COM's authors, owners or operators or their related entities and no representations or warranties are made by them regarding such opinions or statements. GAMETEASER.COM's authors, owner or operators and their related entities shall not be liable for any posted materials.
</p>

<p><strong>Public Communications</strong><br>
GAMETEASER.COM message boards are public and the materials you post are not kept confidential. You acknowledge that the materials you post are intended for public and not private communications and that you have no expectation of privacy with regard to any materials that you post.  You acknowledge that search engine spiders including but not limited to Google and Yahoo "crawl" our website and archive this information without our request as it is public information.
</p>

<p>All GAMETEASER.COM members select a unique screen name during registration that is used as their public identity on the system and on our message boards. You should be careful not to include any personal information in your screen name. If you voluntarily disclose personal information in your screen name or in any of the materials you post, that information can be collected and used by others. Please use discretion when choosing your screen name and posting materials. Your disclosure of personal information is at your own risk.</p>

<p><strong>Privacy</strong><br>
Protecting the privacy and anonymity of our members is important. You acknowledge that GAMETEASER.COM authors, owners or operators may disclose information held about you only if (1) you authorize us to do so; (2) we must do so in order to resolve technical problems with our system; (3) a complaint or legal action arises as the result of any materials posted by you; (4) required by law or necessary to comply with a judicial proceeding, court order, or legal process served on us; (5) such disclosure is necessary to protect our rights, property or interests or the rights, property or interests of others; or (6) we believe in the good-faith that such action is necessary to act in an emergency to protect the safety of our members or the public. For more information, please see our Privacy Policy and Terms of Use.
</p>

<p><strong>Prohibited Acts</strong><br>
</p><ul>You agree not to post any of the following types of materials:
<li>Materials that are defamatory, libelous, knowingly false or inaccurate, obscene, pornographic, indecent, abusive, vulgar, bigoted, racially offensive, hateful, harassing, profane, sexually oriented, threatening, offensive or invasive of personal privacy;</li>
<li>Materials that infringe any intellectual property or other right of any person or entity, including but not limited to, trademarks, copyrights, moral rights, trade secrets, patents, confidentiality restrictions, privacy rights or proprietary rights;</li>
<li>Materials that falsify or delete author attributions, legal notices or other proprietary designations;</li>
<li>Materials that advertise, market, or otherwise solicit funds or the sale of goods or services or that is for commercial purposes or intended to promote or generate revenue for any business enterprise or commercial activity;</li>
<li>Materials that knowingly contain any harmful components that may cause damage to any computer related system or that may interfere with the use of our system;</li>
<li>Materials that violate any law, constitute, encourage or advocate conduct that would be considered a criminal offense, illegal activity or give rise to civil liability, or discuss illegal activities with the intent to commit them;</li>
<li>Materials that do not generally pertain or relate to the designated topics or subtopics of the message board to which they are posted or that constitute chain letters, pyramid schemes, or similar solicitations.</li>
</ul><p></p>

<p><strong>Indemnification</strong><br>
You remain solely responsible for all materials you post. By posting materials, you agree to indemnify and hold GAMETEASER.COM's authors, owners and operators harmless with respect to and against any and all claims, demands, liabilities, costs or expenses, including reasonable attorneys' fees, resulting from materials you post or your breach of these terms.
</p>

<p><strong>Moderation</strong><br>
Posted materials are not reviewed, screened or approved for compliance with these terms by GAMETEASER.COM's authors, owners or operators. GAMETEASER.COM's authors, owners or operators do not review or confirm the validity, accuracy, completeness, reliability, timeliness or usefulness of any posted materials in any way. GAMETEASER.COM's authors, owners or operators do not actively monitor the content of and is not responsible for any posted materials. GAMETEASER.COM's authors, owners or operators have no obligation to screen, monitor, edit or remove any posted materials, but may do so at its sole discretion. Although GAMETEASER.COM's authors, owners or operators may from time to time monitor or review our message boards, we assume no ongoing obligation or duty to monitor or review by doing so.
</p>

<p><strong>Removal and Access Privileges</strong><br>
GAMETEASER.COM's authors, owners or operators may remove or modify any posted materials that violate these terms in any way. GAMETEASER.COM's authors, owners or operators reserve the right to remove or modify posted materials at any time and for any reason although we have no duty to do so. GAMETEASER.COM's authors, owners or operators reserve the right to deny any member or user access to our message boards, without notice and at our sole discretion.
</p>

<p>Anyone who feels that posted materials violate these terms, are actionable or are objectionable is encouraged to contact us immediately by sending an email message to a message board administrator. We will not respond to your message and we reserve the right to take or refrain from taking any or all steps available to us once we receive any such message. We will make every effort to remove posted materials within a reasonable time frame if we determine that removal is necessary.</p>

<p><strong>Ownership of Data</strong><br>
You agree that GAMETEASER.COM is the owner of the data you enter into our website - this includes your membbership account, posts, comments and any other information you post to our website.  YOUR MEMBERSHIP ACCOUNT WILL NOT BE DELETED as this is our data and part of our overall site access history.  You can edit your account to remove any information that you don't wish to be in your account, however the main user record will never be deleted upon request.
</p>

<p><strong>Outside Links</strong><br>
GAMETEASER.COM's authors, owners or operators does not review links that may be embedded in posted materials and is not responsible for the privacy practices or the content of any linked materials, whether or not they are affiliated with CF4ems authors, owners or operators. GAMETEASER.COM's authors, owners or operators do not control or endorse such linked sites. You are solely responsible for your use of such links.
</p>

<p><strong>Licensing to Use</strong><br>
By posting any materials which constitute or include creative submissions, ideas, notes, concepts, comments, suggestions, feedback, information or other similar materials (collectively "creative materials") relating to CF4ems authors, owners or operators, our services or our system, you automatically (a) acknowledge that such creative materials shall be deemed, and shall remain, the property of GAMETEASER.COM's authors, owners and operators (b) represent and warrant that you are authorized to grant all rights in such creative materials and (c) represent and warrant that all "moral rights" in those materials have been waived with respect to the posted materials. Your disclosure, submission, offer of or posting of any creative materials shall constitute an immediate assignment to GAMETEASER.COM's authors, owners and operators of all worldwide rights, titles, and interests in all copyrights and other intellectual property rights in such materials. GAMETEASER.COM's authors, owners or operators may use, copy, reproduce, edit, modify, adapt, publish, translate, publicly perform and display, create derivative works from and distribute the creative materials or incorporate the creative materials into any form, medium, or technology now known or later developed, including our services or system, and will own exclusively all such rights, titles, and interest and shall not be limited in any way in its use, commercial or otherwise, of such materials.
</p>

<p>With regard to any and all materials posted by you, including creative materials, GAMETEASER.COM's authors, owners or operators are and shall be under no obligation to: (a) maintain any of your posted materials in confidence; (b) to pay to you or any user any compensation for any posted materials; or (3) to respond to any of your or any other members posted materials.</p>

<p><strong>Digital Millennium Copyright Act (DMCA)</strong><br>
GAMETEASER.COM's authors, owners and operators comply with the provisions of the Digital Millennium Copyright Act of 1998, 17 U.S.C. Sec. 512. CF4ems authors, owners and operators will promptly remove posted materials in the event a copyright owner provides proper notification to us alleging that the posted materials constitute infringement. If your postings are removed under this procedure, we will notify you and provide the opportunity for response as provided under the Act. The Digital Millennium Copyright Act is available at the Copyright Office's web site http://lcweb.loc.gov/copyright/.
</p>

<p>To reach our representative for notice of claims of copyright infringement or other similar claims, please contact a message board administrator.</p>

<p><strong>Reliance on Information about Companies</strong><br>
WARNING: Information on message boards may not be reliable, particularly for investment purposes. Posted materials may not be true, valid, accurate, correct, complete or timely and could potentially include misinformation, technical or factual inaccuracies, false statements or other errors. You should not solely rely on posted materials to make investment decisions. Your reliance on information contained in posted materials is at your own risk.
</p>

<p><strong>Disclaimer of Warranties</strong><br>
GAMETEASER.COM's authors, owners or operators do not warrant, represent or endorse any posted material in any way. Your use of our message boards is at your own risk. Posted materials could include misinformation, technical or factual inaccuracies, false statements or other errors. GAMETEASER.COM's authors, owners and operators do not warrant that the functioning of message boards will be uninterrupted or error-free, that defects will be corrected, or that a message boards or the servers that make the message boards available are free of viruses or other harmful components. GAMETEASER.COM's authors, owners or operators do not warrant or make any representations regarding the use or the results of the use of any posted materials in terms of their truthfulness, validity, accuracy, correctness, completeness, timeliness, reliability, or otherwise.
</p>

<p>GAMETEASER.COM AUTHORS, OWNERS NOR ITS OPERATORS MAKE NO REPRESENTATION, GUARANTEE OR WARRANTY, EXPRESS OR IMPLIED, RELATED TO THE MESSAGE BOARDS OR ANY POSTED MATERIALS MADE AVAILABLE THROUGH THE MESSAGE BOARDS. THE MESSAGE BOARDS AND THE POSTED MATERIALS MADE AVAILABLE THROUGH THE MESSAGE BOARDS MAY CONTAIN ERRORS AND/OR BUGS AND MAY PRODUCE UNEXPECTED RESULTS. THE MESSAGE BOARDS AND THE POSTED MATERIALS MADE AVAILABLE THROUGH THE MESSAGE BOARDS ARE PROVIDED Ã¯Â¿Â½AS IS.Ã¯Â¿Â½</p>

<p>ANY AND ALL EXPRESS OR IMPLIED CONDITIONS, REPRESENTATIONS AND WARRANTIES, INCLUDING, WITHOUT LIMITATION, ANY IMPLIED WARRANTY OF MERCHANTABILITY, SATISFACTORY QUALITY, FITNESS FOR A PARTICULAR PURPOSE OR NON-INFRINGEMENT ARE DISCLAIMED, EXCEPT TO THE EXTENT THAT SUCH DISCLAIMERS ARE HELD TO BE LEGALLY INVALID. APPLICABLE LAW MAY NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES, INCLUDING IMPLIED WARRANTIES, SO THE ABOVE EXCLUSION MAY NOT APPLY TO YOU.</p>

<p><strong>Limitation of Liability</strong><br>
YOU EXPRESSLY ACKNOWLEDGE, UNDERSTAND AND AGREE THAT CF4EMS AUTHORS, OWNERS AND OPERATORS SHALL NOT BE LIABLE FOR ANY GENERAL, SPECIAL, CONSEQUENTIAL, DIRECT, INDIRECT, INCIDENTAL, EXEMPLARY OR PUNITIVE DAMAGES (INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE, DATA, INFORMATION, BUSINESS INTERRUPTION OR OTHER INTANGIBLE LOSSES) WHATSOEVER ARISING OUT OF THIS AGREEMENT OR THE USE OR INABILITY TO USE THE MESSAGE BOARDS OR ANY POSTED MATERIALS MADE AVAILAVBLE THROUGH THE MESSAGE BOARDS, INCLUDING THE CONDUCT OF ANY THIRD PARTY, HOWEVER CAUSED, ON ANY THEORY OF LIABILITY, INCLUDING NEGLIGENCE, AND WHETHER OR NOT CF4EMS AUTHORS, OWNERS OR OPERATORS HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. THESE LIMITATIONS SHALL APPLY NOTWITHSTANDING ANY FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY. APPLICABLE LAW MAY NOT ALLOW LIMITATION OR EXCLUSION OF LIABILITY FOR CERTAIN DAMAGES, SO THE ABOVE LIMITATIONS MAY NOT APPLY TO YOU.
</p>

<p>In no event shall GAMETEASER.COM's authors, owners or operatorsÃ¯Â¿Â½ total liability to you for all damages, losses, and causes of action, including but not limited to negligence, arising out of or in connection with your use of any message board exceed the amount paid by you, if any, for accessing the message board or U.S. $25.00, whichever is greater. In no event shall liability to you exceed the amount paid by you for any GAMETEASER.COM's subscription fees. The limitations, exclusions and disclaimers set forth above shall apply and be enforceable to the maximum extent allowed by applicable law, even if any remedy fails its essential purpose.</p>

<p><strong>Modification</strong><br>
GAMETEASER.COM's authors, owners or operators may revise these terms without notice. If you continue to use our message boards after such changes have been made, you automatically accept those changes. </p>
					</div>
					<div class="checkagree"><input id="agreement" type="checkbox" name="agreement" value="Yes" checked="checked"> I agree to GAMETEASER.com's User Agreement</div>

					<p></p>
					<span class="clear"></span>
				</div>
				
				<div class="row break">
					<label for="agreement">GAMETEASER.com Rules of Conduct</label>
					<p></p><div class="agreement">
<p><strong>Terms of Use</strong><br>
GAMETEASER.COM (a Web site operated wholly by Cyber Creations Inc.) provides this site as a resource for the GAMETEASER community. Forum posts can be deleted and users may be banned from this site, without prior warning or explanation, at the sole discretion of Cyber Creations Inc.</p>
<p>You must be <u>at least 13 years</u> of age to use this Web site.  Persons under the age of 13 <strong>MUST</strong> obtain a parent's or guardian's permission prior to using this Web site.</p>
<p><strong>Forums / Chat / Messaging Rules</strong><br>
We have not set out to limit people's freedom of speech or discussion. These rules simply strive to keep the boards on topic, productive and inclusive for all members. Accidental violation of minor rules will not result in strict penalties. We want our users to enjoy our boards and feel that these rules will ensure that everyone can equally.</p>
<p><strong>Minor Infractions</strong><br>
Committing Minor Infractions at GAMETEASER.com will result in a first warning, followed by temporary bans. If the issue becomes chronic, a permanent ban will be considered.</p>
	<p class="note">* For purposes of our rules, we will work under a 3 strikes policy. A first offense results in a warning. A second offence results in a 1 to 14 day ban and a third offence results in a lengthy and possibly permanent ban. Warnings and bans remain active for these purposes for 6 months.  Note that severe offenses may receive stronger action, even on first or second offenses.</p>
<ul>
	<li>Religion and Politics
		<ul>
			<li>GAMETEASER.com is a site to discuss massively multiplayer online roleplay gaming.  While users are  encouraged and permitted to use our Off-Topic forum to discuss real life and non-GAMETEASER gaming, threads concerning sensitive subjects such as religion, politics, or ethics may be locked or deleted if determined out of hand by the GAMETEASER.com moderator staff.</li>
		</ul>
	</li>
	<li>Language Policy
		<ul>
			<li>GAMETEASER.com wishes to create the friendliest atmosphere possible in our forums and on our site. As such, excessive use of strong language will not be tolerated. Ex: The odd "bad word" is fine. A profanity laced rant, on the other hand, is not. Discretion will rest with the moderators.</li>
		</ul>
	</li>
	<li>Topic Hijacking
		<ul>
			<li>Posting comments within a thread which severely disrupts the original conversation is prohibited at GAMETEASER.com.<br>
			<em>Example: Asking whether a game has PvP in a thread about crafting materials found in a new expansion is Topic Hijacking.</em></li>
		</ul>
	</li>
	<li>Flaming and Personal Attacks
		<ul>
			<li>GAMETEASER.com does not tolerate personal attacks on other posters.  Please keep your arguments and posts on topic, and argue the ideas and topics of the thread instead of insulting other users.<br>
			<em>Example: Telling someone that you disagree with their argument is tolerated, while calling someone inappropriate names is not.</em></li>
		</ul>
	</li>
	<li>Game Attacks
		<ul>
			<li>Unsubstantiated comments about specific or general games will be penalized in nearly the same way attacks against people will. The exception is that you can say mean things about games provided you back it up with reasons.<br>
			<em>Example: "Game X sucks." is not a legitimate comment. "Game X sucks, because..." is acceptable.</em></li>
		</ul>
	</li>
	<li>Spamming "Post Report" Tool
		<ul>
			<li>We encourage users to report posts that they feel violate these rules, but if you spam or abuse the report tool, penalties will apply.<br>
			<em>Example: Reporting a post we do not take action is not against the rules. Reporting the same post dozens of times, is.</em></li>
		</ul>
	</li>
	<li>Using the Post Report Tool as a Method of Contacting the Moderators
		<ul>
			<li>The post report tool is not intended to be used as a way for users to communicate with Moderators. If you have an issue with a warning or ban, please email <a href="mailTo:community@GAMETEASER.com">community@GAMETEASER.com</a>.</li>
		</ul>
	</li>
	<li>Referral Links
		<ul>
			<li>GAMETEASER.com does not support its members posting links for which they are entitled to reward. This constitutes advertising on the forums. If you wish to purchase advertising with us, please contact admin@GAMETEASER.com.</li>
		</ul>
	</li>
	<li>Trolling
		<ul>
			<li>Posting excessive negative comments or baiting others to respond in a negative manner is considered trolling on the GAMETEASER.com forums.<br>
			<em>For example: If there is one game that you did not enjoy, voicing your opinion is encouraged. Posting this opinion in every thread concerning that game to the point that it disrupts all other conversation is not tolerated.</em></li>
		</ul>
	</li>
	<li>Copyright and Press Material
		<ul>
			<li>Reposting material in its entirety from other sources is against our rules. Quotations from things such as news articles are fine, provided it is cited and (if possible) linked to. We ask others to respect our content and ask our readers do the same for other people's content.</li>
		</ul>
	</li>
	<li>NDAs
		<ul>
			<li>GAMETEASER.com does not permit users to post information on games still under an NDA.  For more information about your specific game's NDA, please visit their official website.</li>
		</ul>
	</li>
	<li>Off-Topic Posting
		<ul>
			<li>Posting in boards that clearly have nothing to do with your topic is not tolerated. Typically, posts of this nature will be moved to the appropriate board.<br>
			<em>Example: A post in the EverQuest II boards about how much you love World of WarCraft is off topic.</em></li>
		</ul>
	</li>
	<li>Virtual Trading
		<ul>
			<li>GAMETEASER.com does not allow the purchase, sale, or trade of in-game assets, accounts, or powerleveling services.</li>
		</ul>
	</li>
	<li>Individual Forum Rules
		<ul>
			<li>Some GAMETEASER.com forums have individual rule sets Ã¢â‚¬â€œ please check the forum description and any stickied topics for more detailed information.</li>
		</ul>
	</li>
</ul>
<p><strong>Medium Infractions</strong><br>
At the discretion of the moderator and/or the Community Manager, the following infractions will be classed as either minor or major infractions and appropriate penalties will be applied.</p>
		<ul>
			<li>Inappropriate Signatures
				<ul>
					<li>Signatures may not contain material that breaches GAMETEASER.com Rules of Conduct.</li>
				</ul>
			</li>
			<li>Spamming
				<ul>
					<li>Posting the same or similar messages over and over again for the sole purpose of disrupting a board's activity is against the rules.</li>
				</ul>
			</li>
			<li>Advertisements
				<ul>
					<li>GAMETEASER.com does not allow users to advertise products or companies in our forums. If you want to advertise, contact support@GAMETEASER.com.</li>
				</ul>
			</li>
			<li>Resurrecting Locked or Deleted Threads
				<ul>
					<li>If a thread has previously been deleted or locked by a moderator, it is against our rules to start another thread on the same topic. This rule applies if a participant in a locked or deleted thread re-starts the thread, a warning and 1 day ban will be issued. If this happens twice, the member will be permanently banned, no exceptions.</li>
				</ul>
			</li>
			<li>Unofficial Servers
				<ul>
					<li>Discussing or advertising unofficial servers or emulators for MMOs is not permitted on the GAMETEASER.com forums.  These servers are against the Terms of Service of the original game, and violate the intellectual propriety rights of the game's publisher and developer.</li>
				</ul>
			</li>
			<li>3rd Party Programs
				<ul>
					<li>GAMETEASER.com does not allow forum discussion concerning programs that go against a game's EULA. This includes, but is not limited to, third party programs to automate gameplay or gain an unfair advantage over other players.  Please check with your specific game's EULA for more details on what is or isn't allowed.</li>
				</ul>
			</li>
		</ul>
<p><strong>Major Infractions</strong><br>
Committing Major Infractions at GAMETEASER.com will result in an immediate and permanent ban from the site with no pervious warnings or infractions. The is no room for leniency or discussion</p>
		<ul>
			<li>Hateful Content
				<ul>
					<li>Hateful content includes, but is not limited to, discriminating comments about: race, ethnicity (what country someone is from), religion, age, gender, sexuality, socioeconomic status and political beliefs.  GAMETEASER.com holds complete and total discretion to decide what is hateful.</li>
				</ul>
			</li>
			<li>Pornographic Images
				<ul>
					<li>GAMETEASER.com has subscribers of all ages and beliefs. Posting any pornographic images, content or links, no matter what the medium, will not be tolerated. At the discretion of the moderators and community manager, this rule will also be extended to include images of an erotic nature.</li>
				</ul>
			</li>
			<li>Illegal Activities
				<ul>
					<li>Either committing or the discussion of committing illegal activities at GAMETEASER.com will not be tolerated. Illegal activities include, but are not limited to: illegal drugs, fraud, violence, hacking, software piracy and sexual harassment. As appropriate, illegal activities will be reported to the relevant law enforcement agency.</li>
				</ul>
			</li>
			<li>Multiple Accounts
				<ul>
					<li>If the staff of GAMETEASER.com discovers that a user is creating and/or using multiple accounts, that user, and all accounts, both past and present, will be banned from GAMETEASER.com.</li>
				</ul>
			</li>
			<li>Posting Other's Personal Information Without Consent
				<ul>
					<li>It is against our rules to post the personal information of other people without their consent. This includes, but is not limited to, email correspondence, contact information, photographs, financial information and social security numbers. It is to the moderator's discretion to decide whether or not the line has been crossed.</li>
				</ul>
			</li>
		</ul>
					</div>
					<div class="checkagree"><input type="checkbox" id="rocagree" name="rocagree" value="Yes" checked="checked"> I agree to GAMETEASER.com's User Agreement</div>

					<p></p>
					<span class="clear"></span>
				</div>

				<div class="finish break row">
					<input type="submit" class="submit" name="submit" value="Create Account">
				</div>
				

			</form>
			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
