import config  from '../_config';
import { buildClasses } from '../_library';
import assign from 'lodash.assign';

const { addFilter } = wp.hooks;
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, InnerBlocks } = wp.editor;
const { PanelBody, TextControl, SelectControl, Button, ResponsiveWrapper } = wp.components;

/**
 * Add group control attribute to block.
 *
 * @param {object} settings Current block settings.
 * @param {string} name Name of block.
 *
 * @returns {object} Modified block settings.
 */
const addgroupControlAttribute = ( settings, name ) => {
	if ( name !== 'core/group' ) {
		return settings;
	}

	let options = ['col','offset','h','align-items','justify-content'];

	// Use Lodash's assign to gracefully handle if attributes are undefined
	settings.attributes = assign( settings.attributes, {
		mediaId: {
			type: 'number',
			default: 0
		},
		mediaUrl: {
			type: 'string',
			default: ''
		},
		container: {
			type: 'string',
			default: 'container-fluid',
		},
		screen: {
			type: 'string',
			default: 'sm',
		},
		group: {
			type: 'object',
			default: {
				lg: Object.fromEntries( options.map( o => [o, '-'] ) ),
				md: Object.fromEntries( options.map( o => [o, '-'] ) ),
				sm: Object.fromEntries( options.map( o => {
					if( o == 'col' )
						return [o, ''];
						
					return [o, '-'];
				} ) )
			}
		},
		builtClasses: {
			container: '',
			row: '',
			col: ''
		}

	} );
	
	return settings;
};

addFilter( 'blocks.registerBlockType', 'extend-block-example/attribute/group', addgroupControlAttribute );


/**
 * Create HOC to add group control to inspector controls of block.
 */
const withgroupControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		// Do nothing if it's another block than our defined ones.
		if ( props.name !== 'core/group' ) {
			return (
				<BlockEdit { ...props } />
			);
		}

		const removeMedia = () => {
			props.setAttributes({
				mediaId: 0,
				mediaUrl: ''
			});
		}
	 
		 const onSelectMedia = (media) => {
			props.setAttributes({
				mediaId: media.id,
				mediaUrl: media.url
			});
		}
	 
		const blockStyle = {
			backgroundImage: props.attributes.mediaUrl != '' ? 'url("' + props.attributes.mediaUrl + '")' : 'none'
		};
		
		const changeScreen = ( screen ) => {
			
			props.setAttributes( {
				screen
			} );
			
		}

		const { 
			container, 
			screen,
			group,
			className,
			builtClasses
			} = props.attributes;
	
		
		const changeCol = ( v, attr ) => {
			props.setAttributes( {
				group: {
					...group,
					[screen]: {
						...group[screen],
						[attr]: v
					}
				}
			} );
		}
		
		let col = buildClasses(group);
			col += className ? ' ' + className : '';
		
		const height100 = col.indexOf('h-') !== -1 ? ' h-100' : ''; 
		
		return (
			<Fragment>
				<div className={ container + height100 }>
					<div className={ 'row g-0' + height100 }>
						<div className={ col } style={ blockStyle }>		
							<BlockEdit { ...props } />		
						</div>
					</div>
				</div>
				<InspectorControls>
					<PanelBody
					title={__('Background settings', 'icepick')}
					initialOpen={ true }
				>
					<div className="editor-post-featured-image">
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectMedia}
								value={props.attributes.mediaId}
								allowedTypes={ ['image'] }
								render={({open}) => (
									<Button 
										className={props.attributes.mediaId == 0 ? 'editor-post-featured-image__toggle' : 'editor-post-featured-image__preview'}
										onClick={open}
									>
										{props.attributes.mediaId == 0 && __('Choose an image', 'icepick')}
										{props.attributes.mediaUrl != undefined && 
											<ResponsiveWrapper
												naturalWidth={ 500 }
												naturalHeight={ 300 }
											>
												<img src={props.attributes.mediaUrl} />
											</ResponsiveWrapper>
											}
									</Button>
								)}
							/>
						</MediaUploadCheck>
						{props.attributes.mediaId != 0 && 
							<MediaUploadCheck>
								<MediaUpload
									title={__('Replace image', 'icepick')}
									value={props.attributes.mediaId}
									onSelect={onSelectMedia}
									allowedTypes={['image']}
									render={({open}) => (
										<Button onClick={open} isDefault isLarge>{__('Replace image', 'icepick')}</Button>
									)}
								/>
							</MediaUploadCheck>
						}
						{props.attributes.mediaId != 0 && 
							<MediaUploadCheck>
								<Button onClick={removeMedia} isLink isDestructive>{__('Remove image', 'icepick')}</Button>
							</MediaUploadCheck>
						}
					</div>
				</PanelBody>
				
					<PanelBody
						title={ __( 'Group settings' ) }
						initialOpen={ true }
						className="icepick-options group"
						>
						<SelectControl
							label={ __( 'Container' ) }
							value={ container }
							options={ config.container }
							onChange={ container => props.setAttributes({ container } ) }
						/>

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
								label={ __( 'Column' ) }
								value={ group[screen].col }
								options={ config.col }
								onChange={ v => changeCol( v, 'col' ) }
								/>
						</div>
						<div className="col-half">
							<SelectControl
								label={ __( 'Offset' ) }
								value={  group[screen].offset }
								options={ config.offset }
								onChange={ v => changeCol( v, 'offset' ) }
								/>
						</div>	
						<div className="col-half">
							<SelectControl
								label={ __( 'Height' ) }
								value={  group[screen].h }
								options={ config.h }
								onChange={ v => changeCol( v, 'h' ) }
								/>
						</div>
						<div className="col-half">
							<SelectControl
								label={ __( 'Vertical Align' ) }
								value={  group[screen]['align-items'] }
								options={ config['align-items'] }
								onChange={ v => changeCol( v, 'align-items' ) }
								/>
						</div>	
						<div className="col-half">
							<SelectControl
								label={ __( 'Horizontal Align' ) }
								value={  group[screen]['justify-content'] }
								options={ config['justify-content'] }
								onChange={ v => changeCol( v, 'justify-content' ) }
								/>
						</div>	
								
												
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, 'withgroupControl' );

addFilter( 'editor.BlockEdit', 'icepick/with-group-control', withgroupControl );


const groupClasses = ( props, blockType, attributes ) => {

	if ( blockType.name !== 'core/group' ) {
		return props;
	}
	
	const col = buildClasses( attributes.group );
	const height100 = col.indexOf('h-') !== -1 ? ' h-100' : ''; 

	attributes.builtClasses = {
		col,
		container: attributes.container + height100,
		row: `row g-0${height100}`
	};

	return props;

};

addFilter( 'blocks.getSaveContent.extraProps', 'icepick/get-save-content/extra-props', groupClasses );



