import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import { PanelBody } from "@wordpress/components";
import { TextControl } from "@wordpress/components";


const currentYear = new Date().getFullYear().toString();

export default function Edit({ attributes, setAttributes }) {
	const { showStartingYear, startingYear } = attributes;
	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "copyright-date-block")}>
					<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						label={
							__("Starting year", "copyright-date-block")
						}
						value={startingYear || ""}
						onChange={(value) => setAttributes({ startingYear: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<p {...useBlockProps()}>
				{__(
					`©${startingYear}${startingYear == "" ? "" : "-" }${currentYear} hello from the editor! aka edit.js`,
					'copyright-block-dynamic'
				)}
			</p>
		</>
	);
}
