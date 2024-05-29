/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from "@wordpress/block-editor";

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import "./editor.scss";

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit(props) {
	function updateSkyColor(e) {
		props.setAttributes({ skyColor: e.target.value });
	}

	function updateGrassColor(e) {
		props.setAttributes({ grassColor: e.target.value });
	}

	return (
		<div {...useBlockProps()}>
			<input
				type="text"
				value={props.attributes.skyColor}
				onChange={updateSkyColor}
				placeholder="sky color..."
			/>
			<input
				type="text"
				value={props.attributes.grassColor}
				onChange={updateGrassColor}
				placeholder="grass color..."
			/>
		</div>
	);
}
