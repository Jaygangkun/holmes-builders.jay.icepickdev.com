import config  from '../_config';
import { buildClasses } from '../_library';
import assign from 'lodash.assign';

const { addFilter } = wp.hooks;
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, SelectControl } = wp.components;

/**
 * Add column control attribute to core/column block.
 *
 * @param {object} settings Current block settings.
 * @param {string} name Name of block.
 *
 * @returns {object} Modified block settings.
 */
const addColumnControlAttribute = ( settings, name ) => {
	if (  name !== 'core/column' ) {
		return settings;
	}
	
	let options = ['col'];

	// Use Lodash's assign to gracefully handle if attributes are undefined
	settings.attributes = assign( settings.attributes, {
		screen: {
			type: 'string',
			default: 'sm',
		},
		column: {
			type: 'object',
			default: {
				lg: Object.fromEntries( options.map( o => [o, '-'] ) ),
				md: Object.fromEntries( options.map( o => [o, '-'] ) ),
				sm: Object.fromEntries( options.map( o => {
					// default to "col"
					if( o == 'col' )
						return [o, ''];
						
					return [o, '-'];
				} ) )
			}
		}

	} );

	return settings;
};

addFilter( 'blocks.registerBlockType', 'icepick/attribute/column', addColumnControlAttribute );


/**
 * Create HOC to add column control to inspector controls of block.
 */
const withColumnControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		if ( props.name !== 'core/column' ) {
			return (
				<BlockEdit { ...props } />
			);
		}

		const { screen, column} = props.attributes;
		
		const changeScreen = ( screen ) => {
			
			props.setAttributes( {
				screen
			} );
			
		}
		
		const classes = buildClasses(column);
						
		return (
			<Fragment>
					<div className={ classes }>		
						<BlockEdit { ...props } />		
					</div>
				<InspectorControls>
					<PanelBody
						title={ __( 'column Control' ) }
						initialOpen={ true }
						className="icepick-options"
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
							label={ __( 'Column' ) }
							value={ column[screen].col }
							options={ config.col }
							onChange={ ( selectedWidthOption ) => {
								props.setAttributes( {
									column: {
										...column,
										[screen]: {
											...column[screen],
											col: selectedWidthOption
										}
										
									}
								} );
							} }
							/>

					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withColumnControl' );

addFilter( 'editor.BlockEdit', 'icepick/with-column-control', withColumnControl );



const columnClasses = ( props, blockType, attributes ) => {
	
	if ( blockType.name !== 'core/column' ) {
		return props;
	}
	
	const classes = buildClasses( attributes.column );

	props.className = classes;
	props.style = {};
	
	return props;

};

addFilter( 'blocks.getSaveContent.extraProps', 'icepick/get-save-content/extra-props', columnClasses );

