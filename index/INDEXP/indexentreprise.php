    <!--script-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<!--script-->

<!-- info sur l'entreprise -->
<div class="containertexteentreprise">
    <div class="societe">
        <div class="titreentreprise"><i class="fas fa-suitcase"></i> La société</div>
        <div class="texteentreprise1">Droptaphoto est basé à Lille (59). S-PHOTO est une startup lilloise innovante, éditant des solutions digitales, alliant l’innovation technologique et l’événementiel. Elle a été fondée en 2008 par 2 associés déjà gérants de 2 sociétés spécialisées dans le développement web et le marketing depuis 10 ans. Etant deux photographes qui ne pouvait pas etre sur 3 événements a la fois, ils ont eu l'idée de creer un système de borne ou les invités pouvaient ce prendre en photo sans avoir le besoin d'un photographe sur le site de l'événement. </div>
    </div>
    <div><img class="imageentrerpise" src="img/entreprise.png"></div>
</div>
<div class="containertexteentreprise">
    <div><img class="imageentrerpise2" src="img/ref.png"></div>
    <div class="valeurs">
        <div class="titreentreprise"><i class="fab fa-envira"></i> Nos valeurs sociétales</div>
        <div class="texteentreprise2">Nos clients doivent avoir une confiance dans nos produits mais aussi dans l’entreprise qui les propose. Nous nous efforçons d’apporter le meilleur service client possible, et apportons pour nous même une grande importance aux valeurs sociétales et environnementales. Nous avons à ce titre entrepris une démarche RSE (Responsabilité Sociétale des Entreprises), traduite par des actions en interne auprès de nos équipes et partenaires, mais également par des actions extérieures. Par exemple, nous intervenons ponctuellement pour des opérations bénévoles pour accompagner des causes méritantes et avons lancé une campagne de sensibilisation auprès de la consommation de papier. Nous nous engageons à faire planter 1 arbre pour chaque animation vendue.</div>
    </div>
</div>
<!-- info sur l'entreprise -->

<br>
<br>


    <!---------------------pop up et remonté haut du site----------------------->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.onscroll = function(ev) {
                document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" : "cInvisible";
            };
        });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script>
        $(function() {
            $("#cRetour").click(function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
            });
        });
    </script>
    <!---------------------pop up et remonté haut du site----------------------->
</body>

</html>