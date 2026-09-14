/**
 * Wiring for the theme's own Customizer controls.
 *
 * Each control renders real inputs and keeps a hidden field holding the value in
 * the shape the theme already reads. Writing to that field and firing `change`
 * is what tells the Customizer the setting moved, so the shape stays in one
 * place -- the PHP that reads it -- rather than being reinvented here.
 */
( function () {
	'use strict';

	var setValue = function ( hidden, value ) {
		if ( ! hidden || hidden.value === value ) {
			return;
		}
		hidden.value = value;
		hidden.dispatchEvent( new Event( 'change', { bubbles: true } ) );
	};

	var initTypography = function ( root ) {
		var family = root.querySelector( '.bonkers-typography__family' );
		var size = root.querySelector( '.bonkers-typography__size' );
		var hidden = root.querySelector( '.bonkers-typography__value' );

		if ( ! family || ! hidden ) {
			return;
		}

		var write = function () {
			var json = { 'font-family': family.value };

			if ( size ) {
				json[ 'font-size' ] = String( size.value || '16' );
			}

			setValue( hidden, JSON.stringify( { json: json } ) );
		};

		family.addEventListener( 'change', write );

		if ( size ) {
			size.addEventListener( 'input', write );
			size.addEventListener( 'change', write );
		}
	};

	var initLayouts = function ( root ) {
		var hidden = root.querySelector( '.bonkers-layouts__value' );
		var options = root.querySelectorAll( 'input[type="radio"]' );

		if ( ! hidden || ! options.length ) {
			return;
		}

		Array.prototype.forEach.call( options, function ( input ) {
			input.addEventListener( 'change', function () {
				var count = Math.max( 1, Math.min( 4, parseInt( input.value, 10 ) || 4 ) );
				var span = Math.floor( 12 / count );
				var columns = {};

				for ( var i = 1; i <= count; i++ ) {
					columns[ i ] = { index: i, span: span };
				}

				setValue( hidden, JSON.stringify( { columnsCount: count, columns: columns } ) );

				Array.prototype.forEach.call(
					root.querySelectorAll( '.bonkers-layouts__option' ),
					function ( label ) {
						label.classList.toggle( 'is-active', label.contains( input ) );
					}
				);
			} );
		} );
	};

	var init = function ( scope ) {
		( scope || document ).querySelectorAll( '.bonkers-typography' ).forEach( initTypography );
		( scope || document ).querySelectorAll( '.bonkers-layouts' ).forEach( initLayouts );
	};

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', function () { init(); } );
	} else {
		init();
	}

	// Sections render lazily, so controls can appear after the first pass.
	if ( window.wp && window.wp.customize ) {
		window.wp.customize.bind( 'ready', function () { init(); } );
	}
}() );
