<form class="payment">

    <body>
        <div class="panel panel-default credit-card-box">
            <div class="panel-heading display-table">
                <div class="display-tr">
                    <h3 class="panel-title display-td">Détail du paiement</h3>
                    <img class="img-responsive pull-right" src="../../img/payement.jpg">
                </div>
            </div>
        </div>
        <br>
        <input maxlength="12" size="12" id="input-field" type="text" name="number" placeholder="Numéro de carte" />
        <input type="text" size="5" class="form-control" name="cardExpiry" placeholder="MM / AA" autocomplete="cc-exp" required />
        <input type="text" size="3" class="form-control" name="cardCVC" placeholder="CVV" autocomplete="cc-csc" required />
        <br>
        <button class="blueButton" style="float:right;border-radius: 15px;" type="submit"><a href="">Confirmez le paiement</a></button>
        <!-- <script type="text/javascript">
            alert('Compte déjà existant');
            document.location.href = 'index.php?page=inscription';
        </script> -->
        <p><br><br><br><br><br><br></p>
        <br><br>
</form>

<!-- <a href="index/INDEXP/facturation.cs"><button class="blueButton" style="float:right;border-radius: 15px;" type="submit">Voir la facture</button></a>
<script type="text/c#">
using System;
using System.Linq;
using System.Text;
using System.Net;
using SautinSoft.Document;

namespace generate_pdf_to_html
{
    class Program
    {
        static void Main(string[] args)
        {
            DocumentCore dc = new DocumentCore();
            dc.Content.End.Insert("hello World", new CharacterFormat());
            dc.Save("MonPDF.pdf");

            System.Diagnostics.Process.Start(new System.Diagnostics.ProcessStartInfo("MonPDF.pdf") { UseShellExecute = true });
        }
    }
}
</script> -->
<br>
<br>
<br>
<br>
<br>
<br>
</body>