/**
 * Registers a new block style variation for the given block.
 *
 * @param {string} blockName      Name of block (example: “core/latest-posts”).
 * @param {Object} styleVariation Object containing `name` which is the class name applied to the block and `label` which identifies the variation to the user.
 */
wp.blocks.registerBlockStyle( 'core/button', {
	name: 'btn-primary',
	label: 'Primary'
} );

wp.blocks.registerBlockStyle( 'core/button', {
	name: 'btn-secondary',
	label: 'Secondary'
} );


wp.blocks.registerBlockStyle( 'core/button', {
	name: 'btn-light',
	label: 'Light'
} );

wp.blocks.registerBlockStyle( 'core/button', {
	name: 'btn-dark',
	label: 'Dark'
} );

wp.domReady(() => {

	wp.blocks.unregisterBlockStyle('core/button', 'fill');
	wp.blocks.unregisterBlockStyle('core/button', 'outline');

});

import assign from 'lodash.assign';
const { addFilter } = wp.hooks;
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck } = wp.editor;
const { PanelBody, SelectControl, Button, ResponsiveWrapper } = wp.components;
/**
 * Add margin style attribute to save element of block.
 *
 * @param {object} saveElementProps Props of save element.
 * @param {Object} blockType Block type information.
 * @param {Object} attributes Attributes of block.
 *
 * @returns {object} Modified props of save element.
 */
const buttonClasses = ( element, blockType, attributes ) => {
	// Do nothing if it's another block than our defined ones.
	if ( blockType.name !== 'core/button' ) {
		return element;
	}
	
	if( element.props.className.indexOf('is-style-btn-') !== false ){
			
		let stylename = 'btn ' + element.props.className.replace('is-style-btn-','btn-');
			
		if( element.props.children ){
			Object.assign( element.props.children.props, { className: stylename } );
		}
				
	}
	
	return element;

};
addFilter( 'blocks.getSaveElement', 'icepick/get-save-content/extra-props', buttonClasses );


/**
 * Create HOC to add button control to inspector controls of block.
 */
const withbuttonControl = createHigherOrderComponent( ( BlockEdit ) => {

	
	return ( props ) => {

		if ( props.name != 'core/button') {
			return (
				<BlockEdit { ...props } />
			);
		}

		let stylename = 'btn ' + props.attributes.className;
		
		if( props.attributes.className && props.attributes.className.indexOf('is-style-btn-') !== false ){
			stylename = stylename.replace('is-style-btn-','btn-');
		}
								
		return (
			<Fragment>
				<div className={stylename}>
					<BlockEdit { ...props } />
				</div>
			</Fragment>
		);
	};
}, 'withbuttonControl' );

addFilter( 'editor.BlockEdit', 'icepick/with-button-control', withbuttonControl );





