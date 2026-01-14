<?php
/**
 * Email Addresses
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/email-addresses.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails
 * @version 5.6.0
 */
/*
__("Davčna številka", "naturesfinest");
__( "Podatki za dostavo", "naturesfinest" ); Shipping address
__( "Podatki kupca", "naturesfinest" ); Billing address
*/
__("Tax number", "nutrisslim-suiteV2");
$theme_color = '#1fb25a';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div style="background-color:transparent;">
    <div class="block-grid two-up"
        style="Margin: 0 auto; min-width: 320px; max-width: 620px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #fff; padding-bottom:26px;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:#fff;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:620px"><tr class="layout-full-width" style="background-color:#fff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="310" style="background-color:#fff;width:310px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 30px; padding-top:40px; padding-bottom:20px;"><![endif]-->
            <div class="col num6" style="max-width: 320px; min-width: 310px; display: table-cell; vertical-align: top;">
                <div style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:0px; padding-right: 10px; padding-left: 30px; text-align: left;">
                        <!--<![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; font-family: sans-serif"><![endif]-->
                        <div
                            style="color:<?= $theme_color; ?>;font-family:'Oswald', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;line-height:150%;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                            <div
                                style="line-height: 18px; font-family: 'Oswald', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 12px; color: <?= $theme_color; ?>;">
                                <p style="line-height: 24px; font-size: 12px; text-align: left; margin: 0;"><span
                                        style="font-size: 14px;"><strong><?php echo __('Customer details', 'nutrisslim-suiteV2')?>:</strong></span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; font-family: 'Trebuchet MS', Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:'Oxygen', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                            <div
                                style="font-size: 12px; line-height: 18px; color: #555555; font-family: 'Oxygen', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;">
                                <p style="font-size: 14px; line-height: 19px; margin: 0;">

                                    <?php
                                    global $translation_language;
                                    $billingAddress = $order->get_address();
                                    // HPOS-safe reads
                                    $billingVatID         = trim((string) $order->get_meta('_billing_vat_id'));
                                    $billing_house_number = trim((string) $order->get_meta('_billing_house_number'));

                                    // Fallback: extract number from address if gateway (e.g., PayPal) didn’t store custom meta
                                    if ($billing_house_number === '') {
                                        $src = trim(($billingAddress['address_1'] ?? '') . ' ' . ($billingAddress['address_2'] ?? ''));
                                        if (preg_match('/\b([0-9]+[A-Za-z\-\/]*)\b/u', $src, $m)) {
                                            $billing_house_number = $m[1];
                                        }
                                    }


                                    //$billingVatID = get_post_meta( $order->get_id(), '_billing_vat_id', true );

                                    $billing_state_name = '';
                                    $billing_country = $order->get_billing_country();
                                    $billing_state = $order->get_billing_state();
                                    if($billing_country && $billing_state){
                                        if(WC()->countries->get_states($billing_country)){
                                            $billing_state_name = WC()->countries->get_states($billing_country)[$billing_state];
                                        } else{
                                            $billing_state_name = $billing_state;
                                        }
                                    }

                                    //$billing_house_number = get_post_meta( $order->get_id(), '_billing_house_number', true );

                                    // shipping state/country used below
                                    $shipping_state_name = '';
                                    $shipping_country = $order->get_shipping_country();
                                    $shipping_state = $order->get_shipping_state();
                                    if($shipping_country && $shipping_state){
                                        if(WC()->countries->get_states($shipping_country)){
                                            $shipping_state_name = WC()->countries->get_states($shipping_country)[$shipping_state];
                                        } else{
                                            $shipping_state_name = $shipping_state;
                                        }
                                    }
                                    // HPOS-safe read
                                    $shipping_house_number = trim((string) $order->get_meta('_shipping_house_number'));

                                    // Fallback: try to parse from shipping street; if none, fall back to billing number
                                    if ($shipping_house_number === '') {
                                        $src = trim(($shippingAddress['address_1'] ?? '') . ' ' . ($shippingAddress['address_2'] ?? ''));
                                        if (preg_match('/\b([0-9]+[A-Za-z\-\/]*)\b/u', $src, $m)) {
                                            $shipping_house_number = $m[1];
                                        } elseif (!empty($billing_house_number)) {
                                            $shipping_house_number = $billing_house_number;
                                        }
                                    }


                                    ?>
                                    <?php if($billingAddress['company']){ ?>
                                    <strong><span
                                            style="font-size: 14px; line-height: 19px;"><?= $billingAddress['company']; ?></span></strong><br>
                                    <?php } else { ?>
                                    <strong><span
                                            style="font-size: 14px; line-height: 19px;"><?= $billingAddress['first_name']; ?>
                                            <?= $billingAddress['last_name']; ?></span></strong><br>
                                    <?php } ?>

                                    <?php if($billingVatID){ ?>
                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= apply_filters( 'wpml_translate_single_string', 'Davčna številka', 'naturesfinest', 'Davčna številka', $translation_language ) . ': ' . $billingVatID; ?>
                                    </span><br>
                                    <?php } ?>

                                    <?php if($billingAddress['company']){ ?>
                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= $billingAddress['first_name']; ?> <?= $billingAddress['last_name']; ?>
                                    </span><br>
                                    <?php } ?>

                                    <?php 
                                    /**
                                     * FORCEFUL FIX FOR BILLING ADDRESS
                                     * Removes any occurrence of the house number in address_1/address_2,
                                     * then re-inserts it exactly once.
                                     */

                                    // 1) Copy original address fields
                                    $address1 = trim($billingAddress['address_1']);
                                    $address2 = trim($billingAddress['address_2']);

                                    // 2) Remove the house number from address_1 / address_2 if it’s there
                                    if (!empty($billing_house_number)) {
                                        $pattern = '/\b' . preg_quote($billing_house_number, '/') . '\b/i';
                                        $address1 = preg_replace($pattern, '', $address1);
                                        $address2 = preg_replace($pattern, '', $address2);

                                        // Clean up leftover spaces
                                        $address1 = preg_replace('/\s+/', ' ', trim($address1));
                                        $address2 = preg_replace('/\s+/', ' ', trim($address2));
                                    }

                                    // 3) Now add the house number exactly once according to language preference
                                    if (!empty($billing_house_number)) {
                                        if($order_language == 'en'){
                                            // House number in front
                                            $formatted_billing_address = $billing_house_number;
                                            if (!empty($address1)) {
                                                $formatted_billing_address .= ' ' . $address1;
                                            }
                                            if (!empty($address2)) {
                                                $formatted_billing_address .= ' ' . $address2;
                                            }
                                        } else {
                                            // House number at the end
                                            $formatted_billing_address = $address1;
                                            if (!empty($address2)) {
                                                $formatted_billing_address .= ' ' . $address2;
                                            }
                                            $formatted_billing_address .= ' ' . $billing_house_number;
                                        }
                                    } else {
                                        // If no house number at all, just combine address_1 and address_2
                                        $formatted_billing_address = $address1;
                                        if (!empty($address2)) {
                                            $formatted_billing_address .= ' ' . $address2;
                                        }
                                    }
                                    ?>
                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $formatted_billing_address; ?>
                                    </span><br>

                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= $billingAddress['postcode']; ?> <?= $billingAddress['city']; ?>
                                    </span><br>

                                    <?php if ($billing_state_name) { ?>
                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= $billing_state_name; ?>
                                    </span><br>
                                    <?php } ?>

                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= $billingAddress['country']; ?>
                                    </span><br>

                                    <span
                                        style="font-size: 14px; line-height: 19px;">
                                        <?= $billingAddress['phone']; ?>
                                    </span>

                                </p>
                                <p style="font-size: 14px; line-height: 19px; margin: 0;">
                                    <span style="font-size: 14px;">
                                        <a href="mailto:<?= $billingAddress['email']; ?>"
                                            style="color:#555555; text-decoration:none;">
                                            <?= $billingAddress['email']; ?>
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td><td align="center" width="310" style="background-color:#fff;width:310px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 30px; padding-top:40px; padding-bottom:20px;"><![endif]-->
            <div class="col num6" style="max-width: 320px; min-width: 310px; display: table-cell; vertical-align: top;">
                <div style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <?php
$orderID = $order->get_order_number();
?>
                    <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:0px; padding-right: 10px; padding-left: 30px; text-align: left;">
                        <!--<![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; font-family: sans-serif"><![endif]-->
                        <div
                            style="color:<?= $theme_color; ?>;font-family:'Oswald', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;line-height:150%;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                            <div
                                style="line-height: 18px; font-family: 'Oswald', 'Lucida Sans Unicode', 'Lucida Grande', sans-serif; font-size: 12px; color: <?= $theme_color; ?>;">
                                <p style="line-height: 19px; font-size: 12px; text-align: left; margin: 0;">
                                    <span style="font-size: 14px;">
                                        <strong>
                                            <?php echo __('Shipping details', 'nutrisslim-suiteV2')?>:
                                        </strong>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top: 0px; padding-bottom: 0px; font-family: 'Trebuchet MS', Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:'Oxygen', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;line-height:150%;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;">
                            <div
                                style="font-size: 12px; line-height: 18px; color: #555555; font-family: 'Oxygen', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;">

                                <p style="font-size: 14px; line-height: 19px; margin: 0;">
                                    <?php 
$shippingAddress = $order->get_address('shipping');
if($shippingAddress['company']){
?>
                                    <strong><span
                                            style="font-size: 14px; line-height: 19px;">
                                            <?= $shippingAddress['company']; ?>
                                        </span></strong><br>
                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $shippingAddress['first_name']; ?> <?= $shippingAddress['last_name']; ?>
                                    </span><br>
                                    <?php
} else{
?>
                                    <strong><span
                                            style="font-size: 14px; line-height: 19px;">
                                            <?= $shippingAddress['first_name']; ?> <?= $shippingAddress['last_name']; ?>
                                        </span></strong><br>
                                    <?php
}
?>

                                    <?php 
                                    /**
                                     * FORCEFUL FIX FOR SHIPPING ADDRESS
                                     * Removes any occurrence of the house number in address_1/address_2,
                                     * then re-inserts it exactly once.
                                     */

                                    // 1) Copy original address fields
                                    $address1 = trim($shippingAddress['address_1']);
                                    $address2 = trim($shippingAddress['address_2']);

                                    // 2) Remove the house number if present
                                    if (!empty($shipping_house_number)) {
                                        $pattern = '/\b' . preg_quote($shipping_house_number, '/') . '\b/i';
                                        $address1 = preg_replace($pattern, '', $address1);
                                        $address2 = preg_replace($pattern, '', $address2);

                                        // Clean up leftover spaces
                                        $address1 = preg_replace('/\s+/', ' ', trim($address1));
                                        $address2 = preg_replace('/\s+/', ' ', trim($address2));
                                    }

                                    // 3) Re-insert the house number exactly once
                                    if (!empty($shipping_house_number)) {
                                        if($order_language == 'en'){
                                            // House number in front
                                            $formatted_shipping_address = $shipping_house_number;
                                            if (!empty($address1)) {
                                                $formatted_shipping_address .= ' ' . $address1;
                                            }
                                            if (!empty($address2)) {
                                                $formatted_shipping_address .= ' ' . $address2;
                                            }
                                        } else {
                                            // House number at the end
                                            $formatted_shipping_address = $address1;
                                            if (!empty($address2)) {
                                                $formatted_shipping_address .= ' ' . $address2;
                                            }
                                            $formatted_shipping_address .= ' ' . $shipping_house_number;
                                        }
                                    } else {
                                        // If no house number at all, just combine address_1 and address_2
                                        $formatted_shipping_address = $address1;
                                        if (!empty($address2)) {
                                            $formatted_shipping_address .= ' ' . $address2;
                                        }
                                    }
                                    ?>
                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $formatted_shipping_address; ?>
                                    </span><br>

                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $shippingAddress['postcode']; ?> <?= $shippingAddress['city']; ?>
                                    </span><br>

                                    <?php if ($shipping_state_name) { ?>
                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $shipping_state_name; ?>
                                    </span><br>
                                    <?php } ?>

                                    <span style="font-size: 14px; line-height: 19px;">
                                        <?= $shippingAddress['country']; ?>
                                    </span><br>
                                </p>

                            </div>
                            <?php 
	if($order_language == 'en'){ ?>
                            <div
                                style="padding-top: 10px; font-size: 12px; line-height: 18px; color: #555555; font-family: 'Oxygen', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;">
                                <strong><span style="font-size: 12px; line-height: 19px;">Is the delivery address
                                        correct?</span></strong><br>
                                <span style="font-size: 12px; line-height: 19px;">
                                    If not, send us the correct one to: support@nutrisslim.uk
                                </span>
                                <?php } ?>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <?php

?>
                    <!--<![endif]-->
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
    </div>
</div>
