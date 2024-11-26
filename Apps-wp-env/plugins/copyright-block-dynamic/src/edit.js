import { __ } from '@wordpress/i18n';
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';
import { PanelBody } from "@wordpress/components";


const currentYear = new Date().getFullYear().toString();

export default function Edit({attribute, setAttribute}) {
	const { showStartingYear, startingYear } = attribute;
	return (
		<>
			<InspectorControls>
				<PanelBody title={__("Settings", "copyright-date-block")}>

				</PanelBody>
			</InspectorControls>
			<p {...useBlockProps()}>
				{__(
					`©${currentYear} hello from the editor! aka edit.js`,
					'copyright-block-dynamic'
				)}
			</p>
		</>
	);
}
