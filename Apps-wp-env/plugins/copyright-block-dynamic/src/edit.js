import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import { PanelBody } from "@wordpress/components";
import { TextControl } from "@wordpress/components";
import { DOMAIN } from ".";
import { ToggleControl } from "@wordpress/components";
import { useEffect } from "react"


const currentYear = new Date().getFullYear().toString();

export default function Edit({ attributes, setAttributes }) {
	const { showStartingYear, startingYear } = attributes;
	// console.log(showStartingYear, startingYear);

	// useEffect(() => {
	// 	console.log(`useEffect showStartingYear = ${showStartingYear}`)
	// 	if (!showStartingYear) setAttributes({ startingYear: "" })
	// }, [showStartingYear]);
	

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", DOMAIN)}>

					<ToggleControl
					checked={ !! showStartingYear }
					label={__("Show Starting Year", DOMAIN)}
					onChange={(value) => {
						setAttributes({showStartingYear: value})
						if (value == false) setAttributes({ startingYear: "" })
					}}
					/>

					{ showStartingYear && (
						<TextControl
						__nextHasNoMarginBottom
						__next40pxDefaultSize
						label={
							__("Starting year", DOMAIN)
						}
						value={startingYear || ""}
						onChange={(value) => setAttributes({ startingYear: value })}
					/>
					)}
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
