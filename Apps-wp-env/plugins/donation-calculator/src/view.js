/**
 * WordPress dependencies
 */
import { store, getContext } from '@wordpress/interactivity';

const { state } = store( 'create-block', {
	state: {
		get themeText() {
			return state.isDark ? state.darkText : state.lightText;
		},
		get donation() {
			const context = getContext();
			return `$${context.contribution}`;
		},
		get trees() {
			const context = getContext();
			return Math.floor(context.contribution / context.price);
		},
		get show() {
			const context = getContext();
			return context.contribution > 0;
		}
	},
	actions: {
		toggleOpen() {
			const context = getContext();
			context.isOpen = ! context.isOpen;
		},
		toggleTheme() {
			state.isDark = ! state.isDark;
		},
		calculate(e) {
			const context = getContext();
			context.contribution = Number(e.target.value)
		},
	},
	callbacks: {
		logIsOpen: () => {
			const { isOpen } = getContext();
			// Log the value of `isOpen` each time it changes.
			console.log( `Is open: ${ isOpen }` );
		},
	},
} );
