import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './editor.scss';


const currentYear = new Date().getFullYear().toString();

export default function Edit() {
	return (
		<p { ...useBlockProps() }>
			{ __(
				`©${currentYear} hello from the editor! aka edit.js`,
				'copyright-block-dynamic'
			) }
		</p>
	);
}
