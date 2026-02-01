<?php
/**
 * Edit account form - FEYMA ENHANCED
 *
 * @package WooCommerce\Templates
 * @version 9.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' );
?>

<div class="edit-account-wrapper">
	<!-- Header -->
	<div class="edit-account-header">
		<div class="account-icon">
			<i class="bi bi-person-circle"></i>
		</div>
		<h2>Detalles de la Cuenta</h2>
		<p class="account-subtitle">Actualizá tu información personal y contraseña</p>
	</div>

	<!-- Form -->
	<form class="woocommerce-EditAccountForm edit-account-form" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

		<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

		<div class="account-form-fields">
			<!-- Información Personal -->
			<div class="form-section">
				<h3 class="form-section-title">
					<i class="bi bi-person"></i> Información Personal
				</h3>

				<div class="form-row-group">
					<div class="form-row">
						<label for="account_first_name">Nombre <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" aria-required="true" />
					</div>

					<div class="form-row">
						<label for="account_last_name">Apellidos <span class="required">*</span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" aria-required="true" />
					</div>
				</div>

				<div class="form-row">
					<label for="account_display_name">Nombre visible <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" aria-required="true" />
					<span class="field-description">Así se verá como se mostrará tu nombre en la sección de tu cuenta y en las valoraciones</span>
				</div>

				<div class="form-row">
					<label for="account_email">Dirección de correo electrónico <span class="required">*</span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" aria-required="true" />
				</div>

				<?php do_action( 'woocommerce_edit_account_form_fields' ); ?>
			</div>

			<!-- Cambio de Contraseña -->
			<div class="form-section">
				<h3 class="form-section-title">
					<i class="bi bi-key"></i> Cambio de contraseña
				</h3>

				<div class="form-row">
					<label for="password_current">Contraseña actual (déjalo en blanco para no cambiarla)</label>
					<div class="password-field">
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
						<button type="button" class="show-password-toggle" onclick="togglePassword('password_current')">
							<i class="bi bi-eye-slash"></i>
						</button>
					</div>
				</div>

				<div class="form-row">
					<label for="password_1">Nueva contraseña (déjalo en blanco para no cambiarla)</label>
					<div class="password-field">
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
						<button type="button" class="show-password-toggle" onclick="togglePassword('password_1')">
							<i class="bi bi-eye-slash"></i>
						</button>
					</div>
				</div>

				<div class="form-row">
					<label for="password_2">Confirmar nueva contraseña (déjalo en blanco para no cambiarla)</label>
					<div class="password-field">
						<input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
						<button type="button" class="show-password-toggle" onclick="togglePassword('password_2')">
							<i class="bi bi-eye-slash"></i>
						</button>
					</div>
				</div>
			</div>
		</div>

		<?php do_action( 'woocommerce_edit_account_form' ); ?>

		<div class="form-actions">
			<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
			<button type="submit" class="btn btn-primary-feyma btn-lg" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>">
				<i class="bi bi-check-circle"></i>
				Guardar cambios
			</button>
			<input type="hidden" name="action" value="save_account_details" />
		</div>

		<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
	</form>
</div>

<script>
function togglePassword(fieldId) {
	const field = document.getElementById(fieldId);
	const button = field.nextElementSibling;
	const icon = button.querySelector('i');

	if (field.type === 'password') {
		field.type = 'text';
		icon.classList.remove('bi-eye-slash');
		icon.classList.add('bi-eye');
	} else {
		field.type = 'password';
		icon.classList.remove('bi-eye');
		icon.classList.add('bi-eye-slash');
	}
}
</script>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
