( function (blocks, editor, components, i18n, element ) {

	var el = wp.element.createElement
	var registerBlockType = wp.blocks.registerBlockType
	var BlockControls = wp.editor.BlockControls
	var InspectorControls = wp.editor.InspectorControls
	var TextControl = components.TextControl

	registerBlockType( 'privacy/form', {
	title: i18n.__('Privacy Request Form'),
	description: i18n.__('A block to display a Privacy Data Request Form.'),
	icon: 'feedback',
	keywords: [ i18n.__( 'data request' ), i18n.__( 'form' ), i18n.__( 'privacy' ) ],
	category: 'widgets',
	attributes: {
		labelSelectRequest: {
			type: 'string',
			source: 'attribute',
			selector: 'a',
			attribute: 'data-width'
		},
	},
*/
	edit: function (props) {
		var attributes = props.attributes
		var mediaWidth = props.attributes.mediaWidth
		var mediaHeight = props.attributes.mediaHeight
		var alignment = props.attributes.alignment

		return [
			el(BlockControls, { key: 'controls' },
				el(
					'div', { className: 'components-toolbar' },
				),
			),
			el(
				InspectorControls,
				{ key: 'inspector' },
				el(
					components.PanelBody, {
						title: i18n.__('Privacy Request Form'),
						className: 'block-privacy-request-form',
						initialOpen: true
					},
					el('p', {}, i18n.__('Privacy Request Form Settings.')),
					el(
						TextControl, {
							type: 'string',
							label: i18n.__('Label for Data Request radio button field (leave empty to use the default "Select your request:" label'),
							value: mediaHeight,
							onChange: function (newMediaHeight) {
								props.setAttributes({ mediaHeight: newMediaHeight })
							}
						}
					),
				)
			),
			el(
				'div', { className: props.className },
				el(
					'div', {
						className: attributes.mediaID ? 'pdf-viewer pdf-upload-active' : 'pdf-viewer pdf-upload-inactive',
						style: { textAlign: alignment },
					},
					el(
						MediaUpload, {
							onSelect: onSelectPDF,
							type: 'application/pdf',
							value: attributes.mediaID,
							render: function (obj) {
								return el(
									components.Button, {
										className: attributes.mediaID ? 'pdf-button' : 'button button-large',
										onClick: obj.open
									},
									!attributes.mediaID ? i18n.__('Upload PDF') : 
									el(
										'a', { 
											href: attributes.mediaURL,
											'data-width': attributes.mediaWidth ? attributes.mediaWidth : '',
											'data-height': attributes.mediaHeight ? attributes.mediaHeight : '',
										}
									)
								)
							}
						}
					)
				),
			)
		]
	},

	save: function (props) {
		var attributes = props.attributes
		var mediaWidth = props.attributes.mediaWidth
		var mediaHeight = props.attributes.mediaHeight
		var alignment = props.attributes.alignment

		return (
			el(
				'div', { 
					className: props.className, 
					style: { textAlign: alignment } 
				},
				el(
					'div', { className: 'uploaded-pdf' },
					el(
						'a', { 
							href: attributes.mediaURL,
							'data-width': attributes.mediaWidth ? attributes.mediaWidth : '',
							'data-height': attributes.mediaHeight ? attributes.mediaHeight : '',
	        			}
					)
				),
			)
		)
	}

})

})(
	window.wp.blocks,
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element
)