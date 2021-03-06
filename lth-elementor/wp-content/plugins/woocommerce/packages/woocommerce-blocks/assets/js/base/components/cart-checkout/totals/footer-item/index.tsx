/**
 * External dependencies
 */
import { __ } from '@wordpress/i18n';
import { createInterpolateElement } from '@wordpress/element';
import FormattedMonetaryAmount from '@woocommerce/base-components/formatted-monetary-amount';
import {
	__experimentalApplyCheckoutFilter,
	TotalsItem,
} from '@woocommerce/blocks-checkout';
import { useStoreCart } from '@woocommerce/base-context/hooks';
import { getSetting } from '@woocommerce/settings';
import { CartResponseTotals, Currency } from '@woocommerce/types';
import { LooselyMustHave } from '@woocommerce/type-defs/utils';

/**
 * Internal dependencies
 */
import './style.scss';

export interface TotalsFooterItemProps {
	/**
	 * The currency object with which to display the item
	 */
	currency: Currency;
	/**
	 * An object containing the total price and the total tax
	 *
	 * It accepts the entire `CartResponseTotals` to be passed, for
	 * convenience, but will use only these two properties.
	 */
	values: LooselyMustHave< CartResponseTotals, 'total_price' | 'total_tax' >;
}

/**
 * The total at the bottom of the cart
 *
 * Can show how much of the total is in taxes if the settings
 * `taxesEnabled` and `displayCartPricesIncludingTax` are both
 * enabled.
 */
const TotalsFooterItem = ( {
	currency,
	values,
}: TotalsFooterItemProps ): JSX.Element => {
	const SHOW_TAXES =
		getSetting< boolean >( 'taxesEnabled', true ) &&
		getSetting< boolean >( 'displayCartPricesIncludingTax', false );

	const { total_price: totalPrice, total_tax: totalTax } = values;

	// Prepare props to pass to the __experimentalApplyCheckoutFilter filter.
	// We need to pluck out receiveCart.
	// eslint-disable-next-line no-unused-vars
	const { receiveCart, ...cart } = useStoreCart();
	const label = __experimentalApplyCheckoutFilter( {
		filterName: 'totalLabel',
		defaultValue: __( 'Total', 'woo-gutenberg-products-block' ),
		extensions: cart.extensions,
		arg: { cart },
	} );

	const parsedTaxValue = parseInt( totalTax, 10 );

	return (
		<TotalsItem
			className="wc-block-components-totals-footer-item"
			currency={ currency }
			label={ label }
			value={ parseInt( totalPrice, 10 ) }
			description={
				SHOW_TAXES &&
				parsedTaxValue !== 0 && (
					<p className="wc-block-components-totals-footer-item-tax">
						{ createInterpolateElement(
							__(
								'Including <TaxAmount/> in taxes',
								'woo-gutenberg-products-block'
							),
							{
								TaxAmount: (
									<FormattedMonetaryAmount
										className="wc-block-components-totals-footer-item-tax-value"
										currency={ currency }
										value={ parsedTaxValue }
									/>
								),
							}
						) }
					</p>
				)
			}
		/>
	);
};

export default TotalsFooterItem;
