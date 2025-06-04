



class InsightsFilter {

	constructor() {
		const insightsFilter = document.querySelector( '.insights-filter' );

		if ( ! insightsFilter ) {
			return;
		}



		this.filters = insightsFilter.querySelectorAll( '.insights-filter .tag' );
		this.initTogglers();
		this.updateCount();
		insightsFilter.addEventListener( 'change', (event) => this.updateCount() );
		
		const sumbit = document.querySelector( '.insights-filter__submit' );
		if ( sumbit ) {
			sumbit.addEventListener( 'click', (event) => this.reload() );
		}

		if ( window.location.href.indexOf('pos_y') != -1 ) {
			const match = window.location.href.split('?')[1].split("&")[0].split("=");
			$('html, body').scrollTop( match[1] );
		}
	}

	initTogglers() {
		if ( this.filters.length < 1 ) {
			return;
		}

		this.filters.forEach( filter => {
			const children = filter.querySelectorAll( 'ul.children' );
			if ( children.length < 1 ) {
				return;
			}
			children.forEach( child => {
				const parent = child.parentElement;
				parent.classList.add( 'has-children' );
				const toggler = document.createElement( 'span' );
				toggler.innerHTML = '+';
				toggler.classList.add( 'toggler' );
				const label = parent.querySelector( 'label' );
				label.appendChild( toggler );
				toggler.addEventListener( 'click', (event) => {
					event.preventDefault();
					label.classList.toggle( 'open' );
					if ( label.classList.contains( 'open' ) ) {
						const height = child.querySelector( 'li').offsetHeight + 'px;'
						child.setAttribute( 'style', 'height: ' + height );
						// child.setAttribute( 'style', 'overflow: visible;' );
						setTimeout( () => child.setAttribute( 'style', 'height: auto; overflow: visible;' ), 250);
					} else {
						child.removeAttribute( 'style' );
					}
				})
			} );
		});

		const togglers = document.querySelectorAll( '.tag__title .toggler' )
		
		togglers.forEach( toggler => {
			toggler.addEventListener( 'click', (event) => {
				event.preventDefault();
				togglers.forEach(t => {
					if (t !== toggler) {
						t.parentElement.classList.remove('open');
					}
				});
				toggler.parentElement.classList.toggle( 'open' );
			});
		});
	}

	reload() {
		const verticalOffset = window.pageYOffset;
		const posY = document.getElementById( 'pos-y' );
		const filterForm = document.querySelector( '.insights-filter' );
		const checkboxes = filterForm.querySelectorAll('input[type="checkbox"]');

		console.log( verticalOffset );
		posY.value = verticalOffset;
		console.log( posY, posY.value );
		checkboxes.forEach(function(checkbox) {
			checkbox.classList.add('disabled');
			checkbox.addEventListener( 'click', (event) => event.preventDefault())
		});
		filterForm.submit();
	}


	updateCount() {
		if ( this.filters.length < 1 ) {
			return;
		}

		this.filters.forEach( filter => {
			const count = filter.querySelectorAll( 'input[type="checkbox"]:checked' ).length;
			if ( count > 0 ) {
				const counter = filter.querySelector( '.count' );
				counter.innerText = count;
				counter.classList.add( 'active' );
			} else {
				const counter = filter.querySelector( '.count' );
				counter.innerText = '';
				counter.classList.remove( 'active' );
			}
		} );
	}
			
}

addEventListener( 'DOMContentLoaded', () => {
	new InsightsFilter();
});