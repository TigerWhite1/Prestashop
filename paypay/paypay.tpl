<p class="payment_module">
<!-- <div class="row">
	<div class="col-xs-12 col-md-6">
		<p class="payment_module paypal">
			<a href="javascript:void(0)" onclick="$('#paypal_payment_form').submit();" title="Payez avec PayPal">
				<img src="/prestashop/modules/paypal/views/img/logos/FR_logo_paypal_moyens_paiement_fr.jpg" alt="Payez par carte ou par compte PayPal" height="48px">
				Payez par carte ou par compte PayPal
			</a>
		</p>
	</div>
</div>
</p>
--><div class="row">
<div class="col-xs-12 col-md-6">
	<p class="payment_module paypal">
		<a href="javascript:void(0)" id='paypay' title="Payez avec PayPal">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/PayPal_2014_logo.svg/128px-PayPal_2014_logo.svg.png" alt="Payez par carte ou par compte PayPal" height="48px">
			Payez via paypay
		</a>
		<form id='paypay_payment' action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<!-- 			/* Indication du montant HT du panier ou TTC si la TVA n'est pas détaillée */
-->			<input name="amount" type="hidden" value="100" />
<!-- 			/* Indication de la devise */
-->			<input name="currency_code" type="hidden" value="EUR" />
<!-- 			/* Indication du montant des frais de port */
-->			<input name="shipping" type="hidden" value="0" />
<!-- 			/* Indication du montant de la TVA (ou 0.00) */
-->			<input name="tax" type="hidden" value="2.50" />
<!-- 			/* Indication de l'URL de retour automatique */
-->			<input name="return" type="hidden" value="http://vps266637.ovh.net/prestashop/" />
<!-- 			/* Indication de l'URL de retour si annulation du paiement */
-->			<input name="cancel_return" type="hidden" value="http://vps266637.ovh.net/prestashop/" />
<!-- 			/* Indication de l'URL de retour pour contrôler le paiement */
-->			<input name="notify_url" type="hidden" value="http://vps266637.ovh.net/prestashop/modules/paypay/ipn.php" />
<!-- 			/* Indication du type d'action */
-->			<input name="cmd" type="hidden" value="_xclick" />
<!-- 			/* Indication de l'adresse e-mail test du vendeur (a remplacer par l'e-mail de votre compte Paypal en production) */
-->			<input name="business" type="hidden" value="thomas.dugue-facilitator@epitech.eu" />
<!-- 			/* Indication du libellé de la commande qui apparaitra sur Paypal */
-->			<input name="item_name" type="hidden" value="Le texte que vous voulez" />
<!-- 			/* Indication permettant à l'acheteur de laisser un message lors du paiement */
-->			<input name="no_note" type="hidden" value="1" />
<!-- 			/* Indication de la langue */
-->			<input name="lc" type="hidden" value="US" />
<!-- 			/* Indication du type de paiement */
-->			<input name="bn" type="hidden" value="PP-BuyNowBF" />
<!-- 			/* Indication du numéro de la commande (très important) */
-->			<input name="custom" type="hidden" value="12345678" />
</form>

</p>
</div>
</div>
</p>