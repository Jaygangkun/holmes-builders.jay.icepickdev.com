import config  from '../_config';
import { buildClasses } from '../_library';
import assign from 'lodash.assign';

const { addFilter } = wp.hooks;
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls } = wp.editor;
const { PanelBody, SelectControl } = wp.components;

// Disable box control on the following blocks
const disableBoxControlOnBlocks = [
	'core/column'
];

/**
 * Add box control attribute to block.
 *
 * @param {object} settings Current block settings.
 * @param {string} name Name of block.
 *
 * @returns {object} Modified block settings.
 */
const addBoxControlAttribute = ( settings, name ) => {

	if(name.indexOf('core/') === -1 ) return settings;
		
	settings.supports = assign( settings.supports, {
		anchor: true
	} );
	
	let options = ['mt','me','mb','ms','pt','pe','pb','ps','opacity','float'];
	
	// Use Lodash's assign to gracefully handle if attributes are undefined
	settings.attributes = assign( settings.attributes, {
		screen: {
			type: 'string',
			default: 'sm',
		},
		box: {
			type: 'object',
			default: {
				lg: Object.fromEntries( options.map( o => [o, '-'] ) ),
				md: Object.fromEntries( options.map( o => [o, '-'] ) ),
				sm: Object.fromEntries( options.map( o => [o, '-'] ) )
			}
		}

	} );

	return settings;
};

addFilter( 'blocks.registerBlockType', 'icepick/attribute/box', addBoxControlAttribute );


/**
 * Create HOC to add box control to inspector controls of block.
 */
const withBoxControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		// Do nothing if it's another block than our defined ones.
		if ( disableBoxControlOnBlocks.includes( props.name ) || props.name.indexOf('core/') === -1 ) {
		 	return (
		 		<BlockEdit { ...props } />
		 	);
		}
		
		const changeScreen = ( screen ) => {
			
			props.setAttributes( {
				screen: screen
			} );
			
		}
		
		const setSpace = ( val, attr ) => {
			
			props.setAttributes( {
				box: {
					...box,
					[screen]: {
						...box[screen],
						[attr]: val
					}
				}
			} );
			
		}
		
		const { 
			screen,
			box
		} = props.attributes;

		const classes = buildClasses(box);

		return (
			<Fragment>
				<div className={ classes }>		
					<BlockEdit { ...props } />		
				</div>
				<InspectorControls>
					<PanelBody
						title={ __( 'Box settings' ) }
						initialOpen={ true }
						className="icepick-options box"
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
						<div className="col-half">
							<SelectControl
								label={ __( 'Opacity' ) }
								value={ box[screen].opacity }
								options={ config.opacity }
								onChange={ s => setSpace(s, 'opacity') }
							/>	
						</div>
						<div className="col-half">
							<SelectControl
								label={ __( 'Float' ) }
								value={ box[screen].float }
								options={ config.float }
								onChange={ s => setSpace(s, 'float') }
							/>							
						</div>
						<div className="box-control-label">Margin / Padding</div>	
						<div className="box-control">
							<div className="top-space">
								<div>
									<SelectControl
										value={ box[screen].mt }
										options={ config.margin }
										onChange={ s => setSpace(s, 'mt') }
									/>
								</div>
								<div>
									<SelectControl
										value={ box[screen].pt }
										options={ config.padding }
										onChange={ s => setSpace(s, 'pt') }
									/>
								</div>
							</div>
							<div className="side-space">
								<div>
									<SelectControl
										value={ box[screen].ms }
										options={ config.margin }
										onChange={ s => setSpace(s, 'ms') }
									/>
								</div>
								<div>
									<SelectControl
										value={ box[screen].ps }
										options={ config.padding }
										onChange={ s => setSpace(s, 'ps') }
									/>
								</div>
								<div></div>
								<div>
									<SelectControl
										value={ box[screen].pe }
										options={ config.padding }
										onChange={ s => setSpace(s, 'pe') }
									/>
								</div>
								<div>
									<SelectControl
										value={ box[screen].me }
										options={ config.margin }
										onChange={ s => setSpace(s, 'me') }
									/>
								</div>
							</div>
							<div className="bottom-space">
								<div>
									<SelectControl
										value={ box[screen].pb }
										options={ config.padding }
										onChange={ s => setSpace(s, 'pb') }

									/>
								</div>
								<div>
									<SelectControl
										value={ box[screen].mb }
										options={ config.margin }
										onChange={ s => setSpace(s, 'mb') }
									/>
								</div>
							</div>
						</div>
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withBoxControl' );

addFilter( 'editor.BlockEdit', 'icepick/with-box-control', withBoxControl );


/**
 * Add margin style attribute to save element of block.
 *
 * @param {object} saveElementProps Props of save element.
 * @param {Object} blockType Block type information.
 * @param {Object} attributes Attributes of block.
 *
 * @returns {object} Modified props of save element.
 */
const elementClasses = ( props, blockType, attributes ) => {
	if(blockType.name == 'core/group' || blockType.name.indexOf('core/') === -1 ) return props;
	
	const classes = buildClasses( attributes.box );

	props.className = props.className === undefined ? '' : props.className;
	props.className += ' ' + classes;
	
	return props;

};

addFilter( 'blocks.getSaveContent.extraProps', 'icepick/get-save-content/extra-props', elementClasses );