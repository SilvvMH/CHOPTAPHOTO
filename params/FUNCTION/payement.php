<form class="payment">

	<body>
		<div class="panel panel-default credit-card-box">
			<div class="panel-heading display-table">
				<div class="display-tr">
					<h3 class="panel-title display-td">Détail du payement</h3>
					<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
				</div>
			</div>
		</div>
		<br>
		<label for="cardNumber">Numéro de carte</label>
		<input type="text" size="10" class="form-control" name="cardNumber" placeholder="0000-0000-0000-0000" autocomplete="cc-number" required autofocus />
		<label for="cardExpir">Expiration</label>
		<input type="text" size="5" class="form-control" name="cardExpiry" placeholder="MM / AA" autocomplete="cc-exp" required />
		<label for="cardCVC">Code CV</label>
		<input type="text" size="3" class="form-control" name="cardCVC" placeholder="CVC" autocomplete="cc-csc" required />
		<br>
		<button class="blueButton" style="float:right;border-radius: 15px;" type="submit">Confirmez le payement</button>
		<p>&emsp;&emsp;&emsp;&emsp;&emsp;</p>
		<a href="index.php?page=facture&idResa="."><button class="blueButton" style="float:right;border-radius: 15px;" type="submit">Voir la facture</button></a>
		<br><br>
</form>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
</body>