import config  from '../_config';
import { buildClasses } from '../_library';

import assign from 'lodash.assign';
const { addFilter } = wp.hooks;
const { __ } = wp.i18n;


/**
 * Add row control attribute to block.
 *
 * @param {object} settings Current block settings.
 * @param {string} name Name of block.
 *
 * @returns {object} Modified block settings.
 */
const addrowControlAttribute = ( settings, name ) => {
	if ( name !== 'core/columns' ) {
		return settings;
	}

	let options = ['g'];
	
	// Use Lodash's assign to gracefully handle if attributes are undefined
	settings.attributes = assign( settings.attributes, {
		screen: {
			type: 'string',
			default: 'sm',
		},
		row: {
			type: 'object',
			default: {
				lg: Object.fromEntries( options.map( o => [o, '-'] ) ),
				md: Object.fromEntries( options.map( o => [o, '-'] ) ),
				sm: Object.fromEntries( options.map( o => {
					if( o == 'col' )
						return [o, '12'];
						
					return [o, '-'];
				} ) )
			}
		},
		builtClasses: {
			row: ''
		}

	} );
	
	return settings;
};

addFilter( 'blocks.registerBlockType', 'icepick/attribute/row', addrowControlAttribute );


const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, InnerBlocks } = wp.editor;
const { PanelBody, SelectControl, Button, ResponsiveWrapper } = wp.components;


/**
 * Create HOC to add row control to inspector controls of block.
 */
const withrowControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		if ( props.name !== 'core/columns' ) {
			return (
				<BlockEdit { ...props } />
			);
		}
		
		const changeScreen = ( screen ) => {
			
			props.setAttributes( {
				screen
			} );
			
		}

		const { 
			screen,
			row,
			className
			} = props.attributes;
	

		const setRow = g => {
			let rowTmp = {
				...row,
				[screen]: {
					...row[screen],
					g
				}
			}
			
			let gutters = buildClasses(rowTmp, 'g');
	
			let classes = 'row ' + buildClasses(rowTmp, false, 'g');
				classes += className ? ' ' + className : '';
				classes += gutters;
			
			props.setAttributes( {
				row: rowTmp,
				className: classes
			} );
			
		} 
		
		return (
			<Fragment>
				<BlockEdit { ...props } />		
				<InspectorControls>
					<PanelBody
						title={ __( 'Columns settings' ) }
						initialOpen={ true }
						className="icepick-options row"
						>
						<div class="screen-tabs">
							{ config.sizes.map( 
								s => <div 
										onClick={() => changeScreen(s.value)} 
										class={ screen == s.value ? 'active' : ''}>
										{s.label}
									</div>
							 ) }
						</div>
						<SelectControl
							label={ __( 'Gutters' ) }
							value={  row[screen].g }
							options={ config.g }
							onChange={ v => setRow(v) }
							/>						

					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withrowControl' );

addFilter( 'editor.BlockEdit', 'icepick/with-row-control', withrowControl );


const rowClasses = ( props, blockType, attributes ) => {
	if ( blockType.name !== 'core/columns' ) {
		return props;
	}
	
	let gutters = buildClasses(attributes.row, 'g');
	
	// replace duplicates
	props.className = props.className.replace('row','').replace(gutters, '');
	
	props.className += ' row ' + gutters;

	return props;

};

addFilter( 'blocks.getSaveContent.extraProps', 'icepick/get-save-content/extra-props', rowClasses );

