
		<!--script-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<!--script-->


<!--------------------- Bouton de redirection bas du site --------------------->
<div class="boutondubas flex-mob-col">
	<div>
		<p class="Apropos">A PROPOS</p>
		<p>Votre devis gratuit et un conseillé<br> disponible pour toutes demandes de votre part.</p><br>
		<p class="Apropos">NEWSLETTER</p>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="E-mail" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">M'inscrire</button>
		</form>
	</div>
	<div class="gauche flex-mob-col">
		<ol>
			<h6 class="titreboutonbasdusite">Nous contacter</h6>
			<a class="footerfont" href=""><p><i class="fas fa-phone-volume"></i> Service client</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-at"></i> Service communication</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-cogs"></i> Conditions de vente</p></a>
		</ol>
	</div>
	<div class="centre flex-mob-col">
		<ol>
			<h6 class="titreboutonbasdusite">l'agence</h6>
			<a class="footerfont" href=""><p><i class="fas fa-location-arrow"></i> Lille</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-location-arrow"></i> Linselles</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-location-arrow"></i> Calais</p></a>
		</ol>
	</div>
	<div class="droite flex-mob-col">
		<ol>
			<h6 class="titreboutonbasdusite">Qui nous sommes</h6>
			<a class="footerfont" href="index.php?page=indexentreprise"><p><i class="fas fa-briefcase"></i> L'entreprise</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-balance-scale"></i> Chiffre d'affaire</p></a>
			<a class="footerfont" href=""><p><i class="fas fa-align-center"></i> Mentions légales</p></a>
		</ol>
	</div>
	</div>

<!--------------------- Bouton de redirection bas du site --------------------->

<!--------------------- Copyright --------------------->
<div class="rights flex-mob-col">
	<!-- rights -->
	<p>Copyright &copy; All rights reserved | By ChopTaPhoto <i class="ico fas fa-heart"></i>.</p>
	<p class="iconsresseaux"><i class="fab fa-facebook"></i> <i class="fab fa-instagram"></i> <i class="fab fa-google"></i></p>
	<!-- rights -->
</div>
<!--------------------- End of Copyright --------------------->


<!----------------ancre haut du site----------------------->
<div><a id="cRetour" class="cInvisible" href="#haut"></a></div>		
<!----------------ancre haut du site----------------------->

<!--------------------- script ----------------------->

<script>
document.addEventListener('DOMContentLoaded', function() {window.onscroll = function(ev) {document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";};});
</script>
	
<script>
$(function(){$("#cRetour").click(function(){$("html, body").animate({scrollTop: 0},"slow");});});
</script>

<!--------------------- script ----------------------->