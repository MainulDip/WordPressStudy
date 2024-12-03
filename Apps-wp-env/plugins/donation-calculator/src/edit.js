import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { __experimentalNumberControl as NumberControl, PanelBody } from "@wordpress/components";
import { DOMAIN } from ".";

export default function Edit({ attributes, setAttributes }) {
	const blockProps = useBlockProps();
	const { price } = attributes;
	const exampleDonationAmount = 1000;
	const trees = Math.floor(exampleDonationAmount / price);

	return (
		<div {...blockProps}>

			<InspectorControls>
				<PanelBody title={__("Calculator settings", DOMAIN)}>
					<NumberControl
						label={__('Set the price for one tree', DOMAIN)}
						help={__('The value will be used for calculations.', DOMAIN)}
						value={price}
						min={1}
						onChange={(value) => setAttributes({ price: Number(value) })}
					/>
				</PanelBody>
			</InspectorControls>
			<form action="" className="calculator">
				<label htmlFor="contribution-value" className="calculator-label">
					{__('Check the impact of your donation:', DOMAIN)}
				</label>
				<div class="calculator-input">$
					<input disabled value={exampleDonationAmount} className="calculator-input-form" type="number" id="contribution-value" />
				</div>
				<output className="calculator-output">
					{[
						__('Your '),
						<span>${exampleDonationAmount}</span>,
						__(' donation will enable us to plant '),
						<span>{trees}</span>,
						__(' trees.')
					]}
				</output>
			</form>


			{/* { __(
				'Donation Calculator – hello from the editor!',
				'donation-calculator'
			) } */}
		</div>
	);
}
