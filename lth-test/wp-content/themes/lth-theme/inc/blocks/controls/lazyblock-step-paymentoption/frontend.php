<?php

/**
 * @block-slug  :   lth-step-paymentoption
 * @block-output:   lth_step_paymentoption_output
 * @block-attributes: get from attributes.php
 */

// filter for Frontend output.
add_filter('lazyblock/lth-step-paymentoption/frontend_callback', 'lth_step_paymentoption_output_fe', 10, 2);

if (!function_exists('lth_step_paymentoption_output_fe')) :
    /**
     * Test Render Callback
     *
     * @param string $output - block output.
     * @param array  $attributes - block attributes.
     */
    function lth_step_paymentoption_output_fe($output, $attributes) {
        ob_start();
        
    $contact = get_field('contact', 'option');

    if ($attributes['form']) {
        $contact_form = $attributes['form'];
    } else {
        $contact_form = $contact['contact_form'];
    }
?>
    <article class="lth-step-paymentoption">
        <div class="module module_paymentoption">
            <?php if ($attributes['title'] || $attributes['description']) : ?>
                <div class="module_header title-box title-align-<?php echo $attributes['title_align']; ?>">
                    <?php if ($attributes['title']) : ?>
                        <h2 class="title">
                            <?php if ($attributes['title_url']) : ?>
                                <a href="<?php echo esc_url($attributes['title_url']); ?>" title="">
                                <?php else : ?>
                                    <span>
                                    <?php endif; ?>
                                    <?php echo wpautop(esc_html($attributes['title'])); ?>
                                    <?php if ($attributes['title_url']) : ?>
                                </a>
                            <?php else : ?>
                                </span>
                            <?php endif; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($attributes['description']) : ?>
                        <div class="infor">
                            <?php echo wpautop(esc_html($attributes['description'])); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="module_content">
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div style="height: 0; visibility: hidden">
                            <p></p>
                            <select id="item-options">
                                <option value="" price=""></option>
                            </select>
                            <select style="visibility: hidden" id="quantitySelect"></select>
                        </div>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $attributes['client_id']; ?>&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
                <script>
                    function initPayPalButton() {
                        var shipping = 0;
                        var itemOptions = document.querySelector("#smart-button-container #item-options");
                        var quantity = parseInt();
                        var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
                        if (!isNaN(quantity)) {
                            quantitySelect.style.visibility = "visible";
                        }
                        var orderDescription = '';
                        if(orderDescription === '') {
                            orderDescription = 'Item';
                        }
                        paypal.Buttons({
                            style: {
                                shape: 'rect',
                                color: 'gold',
                                layout: 'vertical',
                                label: 'paypal',
                                
                            },
                            createOrder: function(data, actions) {
                                var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
                                var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
                                var tax = (0 === 0 || false) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
                                if(quantitySelect.options.length > 0) {
                                    quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
                                } else {
                                    quantity = 1;
                                }

                                tax *= quantity;
                                tax = Math.round(tax * 100) / 100;
                                var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
                                priceTotal = Math.round(priceTotal * 100) / 100;
                                var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

                                return actions.order.create({
                                    purchase_units: [{
                                        description: orderDescription,
                                        amount: {
                                            currency_code: 'USD',
                                            value: priceTotal,
                                            breakdown: {
                                                item_total: {
                                                    currency_code: 'USD',
                                                    value: itemTotalValue,
                                                },
                                                shipping: {
                                                    currency_code: 'USD',
                                                    value: shipping,
                                                },
                                                tax_total: {
                                                    currency_code: 'USD',
                                                    value: tax,
                                                }
                                            }
                                        },
                                        items: [{
                                            name: selectedItemDescription,
                                            unit_amount: {
                                                currency_code: 'USD',
                                                value: selectedItemPrice,
                                            },
                                            quantity: quantity
                                        }]
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(orderData) {
                                
                                // Full available details
                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                // Show a success message within this page, e.g.
                                const element = document.getElementById('paypal-button-container');
                                element.innerHTML = '';
                                element.innerHTML = '<h3>Thank you for your payment!</h3>';

                                // Or go to another URL:  actions.redirect('thank_you.html');

                                });
                            },
                            onError: function(err) {
                                console.log(err);
                            },
                        }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                </script>
            </div>
        </div>
    </article>

<?php
        return ob_get_clean();
    }
endif;
?>