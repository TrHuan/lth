<?php
defined( 'ABSPATH' ) || exit;

/* @var $wqm_type string */
/* @var $wqm_margin string */
/* @var $wqm_correction_level string */
/* @var $wqm_label string */
/* @var $wqm_logo_id int */
/* @var $wqm_logo_width string */
/* @var $wqm_logo_height string */
/* @var $wqm_bgcolor array */
/* @var $wqm_fgcolor array */

if ( empty( $wqm_margin ) ) {
	$wqm_margin = 10;
}

$wqm_logo_path_url = '';
if ( ! empty( $wqm_logo_id ) ) {
	$wqm_logo_path_url = wp_get_attachment_image_url( $wqm_logo_id, array( 100, 100 ) );
}

//todo: выводить у пресетов их размеры или все что на них навесили
?>

<table class="form-table" role="presentation">
    <tbody>
    <tr class="field-type">
        <th><label for="field-type"><?php _e( 'Type', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <select name="wqm_type" id="field-type">
                <option value="vcard" <?php echo selected( 'vcard', $wqm_type ) ?>>vCard v3</option>
                <option value="mecard" <?php echo selected( 'mecard', $wqm_type ) ?>>MeCard</option>
            </select>
            <span class="description"><?php _e( 'Select contact information QR code format', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
            <span class="description"><?php _e( 'MeCard has encoding issues and support less fields', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-margin">
        <th><label for="field-margin"><?php _e( 'Margin', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <input type="text" name="wqm_margin" id="field-margin" class="regular-text" placeholder="10"
                   value="<?php echo WQM_Common::clear_digits( esc_attr( $wqm_margin ) ); ?>">
            <span class="description"><?php _e( 'Specify border size around QR code in px', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-correction-level">
        <th>
            <label for="field-correction-level"><?php _e( 'Correction level', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label>
        </th>
        <td>
            <select name="wqm_correction_level" id="field-correction-level">
                <option value="LOW" <?php echo selected( 'LOW', $wqm_correction_level ) ?>>
					<?php _e( 'Level L – up to 7% damage', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>
                </option>
                <option value="MEDIUM" <?php echo selected( 'MEDIUM', $wqm_correction_level ) ?>>
					<?php _e( 'Level M – up to 15% damage', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>
                </option>
                <option value="QUARTILE" <?php echo selected( 'QUARTILE', $wqm_correction_level ) ?>>
					<?php _e( 'Level Q – up to 25% damage', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>
                </option>
                <option value="HIGH" <?php echo selected( 'HIGH', $wqm_correction_level ) ?>>
					<?php _e( 'Level H – up to 30% damage', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>
                </option>
            </select>
            <span class="description"><?php _e( 'There are different amounts of “backup” data depending on how much damage the QR code is expected to suffer in its intended environment.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-label">
        <th><label for="field-label"><?php _e( 'Label', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <input type="text" name="wqm_label" id="field-label" class="regular-text"
                   value="<?php esc_attr_e( $wqm_label ); ?>">
            <span class="description"><?php _e( 'Optional text label below QR code.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-logo">
        <th><label for="field-logo"><?php _e( 'Logo', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <input id="field-logo" name="wqm_logo_id" type="hidden" value="<?php echo $wqm_logo_id; ?>">
            <img src="<?php echo $wqm_logo_path_url; ?>" id="wqm-picsrc" alt=""/>
            <button type="button" id="wqm_logo_path_upload" class="button button-primary button-large"
                    style="<?php echo ! empty( $wqm_logo_id ) ? 'display:none;' : '' ?>">
				<?php _e( 'Select logo image', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></button>
            <button type="button" id="wqm_logo_path_delete" class="button button-add-media button-large"
                    style="<?php echo ! empty( $wqm_logo_id ) ? '' : 'display:none;' ?>">
				<?php _e( 'Delete logo image', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></button>
            <span class="description"><?php _e( 'Optional logo image at center of QR code.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-label-size">
        <th><label for="field-label-size"><?php _e( 'Logo size', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <div class="logo-sizes">
                <input type="text" name="wqm_logo_width" id="field-logo-size-width"
                       placeholder="<?php _e( 'width', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>"
                       value="<?php esc_attr_e( $wqm_logo_width ); ?>">
                <input type="text" name="wqm_logo_height" id="field-logo-size-height"
                       placeholder="<?php _e( 'height', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>"
                       value="<?php esc_attr_e( $wqm_logo_height ); ?>">
            </div>
            <span class="description"><?php _e( 'Set logo image size in pixels or percents.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-label-bgcolor">
        <th><label for="field-label-bgcolor"><?php _e( 'Background color', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <div class="field-bgcolors">
                <input type="text" name="wqm_bgcolor" id="field-bgcolor" class="wqm-color-picker" data-alpha-enabled="true" value="<?php esc_attr_e( $wqm_bgcolor ); ?>">
            </div>
            <span class="description"><?php _e( 'Set qrcode background color in RGBA format.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="field-label-fgcolor">
        <th><label for="field-label-fgcolor"><?php _e( 'Text & code color', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></label></th>
        <td>
            <div class="field-fgcolors">
                <input type="text" name="wqm_fgcolor" id="field-fgcolor" class="wqm-color-picker" data-alpha-enabled="false" value="<?php esc_attr_e( $wqm_fgcolor ); ?>">
            </div>
            <span class="description"><?php _e( 'Set qrcode background color in RGB format.', WQM_Common::PLUGIN_SYSTEM_NAME ) ?></span>
        </td>
    </tr>
    <tr class="warn-message" <?php echo ( ! empty( $wqm_fgcolor ) or ! empty( $wqm_bgcolor ) ) ? '' : 'style="display:none;"' ?>>
        <th></th>
        <td>
            <div class="please-warn"><p>Please! Make sure that you colored qr-code can be read by scanner!!</p></div>
        </td>
    </tr>
    </tbody>
</table>

<script>
    jQuery(document).ready(function () {
        jQuery('#wqm_logo_path_delete').click(function () {
            jQuery('#field-logo').val('');
            jQuery('#wqm-picsrc').prop('src', '');
            jQuery('#field-logo-size-width').val('');
            jQuery('#field-logo-size-height').val('');
            jQuery('#wqm_logo_path_upload').show();
            jQuery('#wqm_logo_path_delete').hide();
        });

        jQuery('.field-bgcolors, .field-fgcolors').click(function () {
            jQuery('.warn-message').show();
        });

        jQuery('#wqm_logo_path_upload').click(function () {
            var frame = new wp.media.view.MediaFrame.Select({
                title: '<?php _e( 'Select logo image', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>',
                multiple: false,
                library: {
                    order: 'ASC',
                    orderby: 'title',
                    type: 'image',
                    search: null,
                    uploadedTo: null
                },
                button: {
                    text: '<?php _e( 'Select logo image', WQM_Common::PLUGIN_SYSTEM_NAME ) ?>'
                }
            });
            // Open the modal.
            frame.open();
            frame.on('select', function () {
                var mediaFrameProps = frame.state().get('selection').first().toJSON();
                console.log(mediaFrameProps);
                jQuery('#field-logo').val(mediaFrameProps.id);
                jQuery('#wqm-picsrc').prop('src', mediaFrameProps.url);
                jQuery('#wqm_logo_path_upload').hide();
                jQuery('#wqm_logo_path_delete').show();
                return false;
            });
        }); // End on click
    });
</script>