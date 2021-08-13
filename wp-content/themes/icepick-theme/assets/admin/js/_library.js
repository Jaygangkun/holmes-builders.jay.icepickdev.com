import config  from './_config';

export const buildClasses = ( collectedClasses, pluck = false, exclude = false ) => {
	
	var classes = [];
	
	config.sizes.forEach( (size, i) => {
		size = size.value;
		
		let str = Object.keys(collectedClasses[size]).map((k) => {
			if( k == 0 || k == null ) 
				return false;
				
			if( collectedClasses[size][k] == '-' )
			 	return false;
			
			if( pluck && k !== pluck )
				return false;
			
			if ( exclude && k == exclude )
				return false;
					
			let smaller = config.sizes.slice(0, i).map( smr => {
				return collectedClasses[smr.value][k];
			})	
						
			if( smaller.includes( collectedClasses[size][k] ) === false ){
				let glue = i == 0 ? '-' : `-${size}-`;
					
					//remove glue if no value selected (e.g col)
					if( collectedClasses[size][k] === '' ){
						
						glue = i == 0 ? '' : `-${size}`;
						
					}
				
				return k + glue + collectedClasses[size][k];
			}

		}).filter(Boolean).join(' ');

		classes.push(str);
		
	} );
	
	return injector(classes.join(' '));
	
}


const injector = classesStr => {
	
	if (/align-items|justify-content/.test(classesStr)) {
	   classesStr += ' d-flex';
	}
	
	return classesStr;
}
	
	

