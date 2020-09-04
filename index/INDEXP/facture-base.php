<?php
    $id_resa = $_GET['idResa'];
?>
<style type="text/css">
	table {
		width: 100%;
		color: #717375;
		font-family: helvetica;
		line-height: 5mm;
		border-collapse: collapse;
	}
	h2  { margin: 0; padding: 0; }
	p { margin: 5px; }

	.border th {
		border: 1px solid #000;
		color: white;
		background: #000;
		padding: 5px;
		font-weight: normal;
		font-size: 14px;
		text-align: center; }
	.border td {
		border: 1px solid #CFD1D2;
		padding: 5px 10px;
		text-align: center;
	}
	.no-border {
		border-right: 1px solid #CFD1D2;
		border-left: none;
		border-top: none;
		border-bottom: none;
	}
	.space { padding-top: 250px; }

	.10p { width: 10%; } .15p { width: 15%; }
	.25p { width: 25%; } .50p { width: 50%; }
	.60p { width: 60%; } .75p { width: 75%; }
</style>

<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

	<page_footer>
		<hr />
		<p>Fait a Paris, le <?php echo date("d/m/y"); ?></p>
		<p>Signature du particulier, suivie de la mension manuscrite "bon pour accord".</p>
		<p>&nbsp;</p>
	</page_footer>

	<table style="vertical-align: top;">
		<tr>
			<td class="75p">
				<strong><?php echo $user['firstname']." ".$user['lastname']; ?></strong><br />
				<?php echo nl2br($user['address']); ?><br />
				<strong>SIRET:</strong> <?php echo $user['siret']; ?><br />
				<?php echo $user['email']; ?>
			</td>
			<td class="25p">
				<strong><?php echo $client['firstname']." ".$client['lastname']; ?></strong><br />
				<?php echo nl2br($client['address']); ?><br />
			</td>
		</tr>
	</table>

	<table style="margin-top: 50px;">
		<tr>
			<td class="50p"><h2>Devis n°14</h2></td>
			<td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y"); ?></td>
		</tr>
		<tr>
			<td style="padding-top: 15px;" colspan="2"><strong>Objectif:</strong> <?php echo $project['name']; ?></td>
		</tr>
	</table>

	<table style="margin-top: 30px;" class="border">
		<thead>
			<tr>
				<th class="60p">Description</th>
				<th class="10p">Quantité</th>
				<th class="15p">Prix Unitaire</th>
				<th class="15p">Montant</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($tasks as $task): ?>
			<tr>
				<td><?php echo $task['description']; ?></td>
				<td><?php echo $task['quantity']; ?></td>
				<td><?php echo $task['price']; ?> &euro;</td>
				<td><?php
						$price_tva = $task['price']*1.2;
						echo $price_tva;
					?>
				&euro;</td>

				<?php
					$total += $task['price'];
					$total_tva += $price_tva;
				?>
			</tr>
			<?php endforeach ?>

			<tr>
				<td class="space"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td colspan="2" class="no-border"></td>
				<td style="text-align: center;" rowspan="3"><strong>Total:</strong></td>
				<td>HT : <?php echo $total; ?> &euro;</td>
			</tr>
			<tr>
				<td colspan="2" class="no-border"></td>
				<td>TVA : <?php echo ($total_tva - $total); ?> &euro;</td>
			</tr>
			<tr>
				<td colspan="2" class="no-border"></td>
				<td>TTC : <?php echo $total_tva; ?> &euro;</td>
			</tr>
		</tbody>
	</table>

</page>