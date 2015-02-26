<div class="modal user-info">
	<h1>Before we can begin</h1>
	<div class="modal-close" data-toggle=".user-info"></div>
	<form method="post" action>
		<p>I'm going to need a little information from you</p>
		<div class="custom-select">
			<select name="age">
				<option disabled selected value="0">Your age</option>
				<option value="1">12 - 17</option>
				<option value="2">18 - 24</option>
				<option value="3">25 - 34</option>
				<option value="4">35 - 44</option>
				<option value="5">45 - 54</option>
				<option value="6">55 - 64</option>
				<option value="7">65 - 74</option>
			</select>
		</div>
		<div class="custom-select">
			<select name="sex">
				<option disabled selected value="0">Your sex</option>
				<option value="1">Female</option>
				<option value="2">Male</option>
				<option value="3">Other</option>
				<option value="4">Prefer to not say</option>
			</select>
		</div>
		<div class="custom-select">
			<select name="usage">
				<option disabled selected value="0">Social media usage</option>
				<option value="1">Multiple minutes in an hour</option>
				<option value="2">A few minutes an hour</option>
				<option value="3">Once an hour</option>
				<option value="4">Every few hours in a day</option>
				<option value="5">Less than every few hours in a day</option>
				<option value="6">Never</option>
			</select>
		</div>

		<p class="error"></p>
		<button type="submit">Submit</button>
	</form>
</div>