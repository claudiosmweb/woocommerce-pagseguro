<?php
/**
 * Transparent checkout form.
 *
 * @author  Claudio_Sanches
 * @package WooCommerce_PagSeguro/Templates
 * @version 2.12.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<fieldset id="pagseguro-payment-form" class="<?php echo 'storefront' === basename( get_template_directory() ) ? 'woocommerce-pagseguro-form-storefront' : ''; ?>" data-cart_total="<?php echo esc_attr( number_format( $cart_total, 2, '.', '' ) ); ?>">

	<ul id="pagseguro-payment-methods">
		<?php if ( 'yes' === $tc_credit ) : ?>
		<li><label><input id="pagseguro-payment-method-credit-card" type="radio" name="pagseguro_payment_method" value="credit-card" <?php checked( true, ( 'yes' === $tc_credit ), true ); ?> /> <?php esc_html_e( 'Credit Card', 'woocommerce-pagseguro' ); ?></label></li>
		<?php endif; ?>

		<?php if ( 'yes' === $tc_transfer ) : ?>
		<li><label><input id="pagseguro-payment-method-bank-transfer" type="radio" name="pagseguro_payment_method" value="bank-transfer" <?php checked( true, ( 'no' === $tc_credit && 'yes' === $tc_transfer ), true ); ?> /> <?php esc_html_e( 'Bank Transfer', 'woocommerce-pagseguro' ); ?></label></li>
		<?php endif; ?>

		<?php if ( 'yes' === $tc_ticket ) : ?>
		<li><label><input id="pagseguro-payment-method-banking-ticket" type="radio" name="pagseguro_payment_method" value="banking-ticket" <?php checked( true, ( 'no' === $tc_credit && 'no' === $tc_transfer && 'yes' === $tc_ticket ), true ); ?> /> <?php esc_html_e( 'Banking Ticket', 'woocommerce-pagseguro' ); ?></label></li>
		<?php endif; ?>
	</ul>
	<div class="clear"></div>

	<?php if ( 'yes' === $tc_credit ) : ?>
		<div id="pagseguro-credit-card-form" class="pagseguro-method-form">
			<p id="pagseguro-card-holder-name-field" class="form-row form-row-first">
				<label for="pagseguro-card-holder-name"><?php esc_html_e( 'Card Holder Name', 'woocommerce-pagseguro' ); ?> <small>(<?php esc_html_e( 'as recorded on the card', 'woocommerce-pagseguro' ); ?>)</small> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-name" name="pagseguro_card_holder_name" class="input-text" type="text" autocomplete="off" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<p id="pagseguro-card-number-field" class="form-row form-row-last">
				<label for="pagseguro-card-number"><?php esc_html_e( 'Card Number', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-number" class="input-text wc-credit-card-form-card-number" type="tel" maxlength="20" autocomplete="off" placeholder="&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-expiry-field" class="form-row form-row-first">
				<label for="pagseguro-card-expiry"><?php esc_html_e( 'Expiry (MM/YYYY)', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-expiry" class="input-text wc-credit-card-form-card-expiry" type="tel" autocomplete="off" placeholder="<?php esc_html_e( 'MM / YYYY', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<p id="pagseguro-card-cvc-field" class="form-row form-row-last">
				<label for="pagseguro-card-cvc"><?php esc_html_e( 'Security Code', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-cvc" class="input-text wc-credit-card-form-card-cvc" type="tel" autocomplete="off" placeholder="<?php esc_html_e( 'CVC', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-installments-field" class="form-row form-row-first">
				<label for="pagseguro-card-installments"><?php esc_html_e( 'Installments', 'woocommerce-pagseguro' ); ?> <small>(<?php esc_html_e( 'the minimum value of the installment is R$ 5,00', 'woocommerce-pagseguro' ); ?>)</small> <span class="required">*</span></label>
				<select id="pagseguro-card-installments" name="pagseguro_card_installments" style="font-size: 1.5em; padding: 4px; width: 100%;" disabled="disabled">
					<option value="0">--</option>
				</select>
			</p>
			<p id="pagseguro-card-holder-cpf-field" class="form-row form-row-last">
				<label for="pagseguro-card-holder-cpf"><?php esc_html_e( 'Card Holder CPF', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-cpf" name="pagseguro_card_holder_cpf" class="input-text wecfb-cpf-field" type="tel" autocomplete="off" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
			<p id="pagseguro-card-holder-birth-date-field" class="form-row form-row-first">
				<label for="pagseguro-card-holder-birth-date"><?php esc_html_e( 'Card Holder Birth Date', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-birth-date" name="pagseguro_card_holder_birth_date" class="input-text" type="tel" autocomplete="off" placeholder="<?php esc_html_e( 'DD / MM / YYYY', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<p id="pagseguro-card-holder-phone-field" class="form-row form-row-last">
				<label for="pagseguro-card-holder-phone"><?php esc_html_e( 'Card Holder Phone', 'woocommerce-pagseguro' ); ?> <span class="required">*</span></label>
				<input id="pagseguro-card-holder-phone" name="pagseguro_card_holder_phone" class="input-text" type="tel" autocomplete="off" placeholder="<?php esc_html_e( '(xx) xxxx-xxxx', 'woocommerce-pagseguro' ); ?>" style="font-size: 1.5em; padding: 8px;" />
			</p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' === $tc_transfer ) : ?>
		<div id="pagseguro-bank-transfer-form" class="pagseguro-method-form">
			<p><?php esc_html_e( 'Select your bank:', 'woocommerce-pagseguro' ); ?></p>
			<ul>
				<li><label><input type="radio" name="pagseguro_bank_transfer" value="bancodobrasil" /><i id="pagseguro-icon-bancodobrasil"></i><span><?php esc_html_e( 'Banco do Brasil', 'woocommerce-pagseguro' ); ?></span></label></li>
				<li><label><input type="radio" name="pagseguro_bank_transfer" value="bradesco" /><i id="pagseguro-icon-bradesco"></i><span><?php esc_html_e( 'Banco Bradesco', 'woocommerce-pagseguro' ); ?></span></label></li>
			</ul>
			<p><?php esc_html_e( '* After clicking "Proceed to payment" you will have access to the link that will take you to your bank\'s website, so you can make the payment in total security.', 'woocommerce-pagseguro' ); ?></p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<?php if ( 'yes' === $tc_ticket ) : ?>
		<div id="pagseguro-banking-ticket-form" class="pagseguro-method-form">
			<p>
				<i id="pagseguro-icon-ticket"></i>
				<?php esc_html_e( 'The order will be confirmed only after the payment approval.', 'woocommerce-pagseguro' ); ?>
				<?php if ( 'yes' === $tc_ticket_message ) : ?>
					<br />
					<strong><?php esc_html_e( 'Tax', 'woocommerce-pagseguro' ); ?>:</strong> <?php esc_html_e( 'R$ 1,00 (rate applied to cover management risk costs of the payment method).', 'woocommerce-pagseguro' ); ?>
				<?php endif; ?>
			</p>
			<p><?php esc_html_e( '* After clicking "Proceed to payment" you will have access to banking ticket which you can print and pay in your internet banking or in a lottery retailer.', 'woocommerce-pagseguro' ); ?></p>
			<div class="clear"></div>
		</div>
	<?php endif; ?>

	<p><?php esc_htmlesc_html_e( 'This purchase is being made in Brazil', 'woocommerce-pagseguro' ); ?> <img src="<?php echo esc_url( $flag ); ?>" alt="<?php esc_attresc_html_e( 'Brazilian flag', 'woocommerce-pagseguro' ); ?>" style="display: inline; float: none; vertical-align: middle; border: none;" /></p>

</fieldset>
