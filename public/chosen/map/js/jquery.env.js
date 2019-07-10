$(document).ready(function() {

	var env = {
		development: {
			url: {
				domain: 'http://localhost',
				defaultBaselayer: 'https://map.ir/shiveh',
				static: 'https://map.ir/static',
				downloads: {
					apps: {
						android: 'http://corp.map.ir/دانلود-اپلیکیشن-مپ/',
						ios: '#',
					},
				},
				route: 'https://map.ir/routes/',
				search: {
					geocode: 'search-geocode.json',
					reverse: 'search-reverse.json',
					poi: 'search-poi.json',
					gnaf: {
						toLatlng: 'gnaf-latlng.json',
						toStatic: 'gnaf-static.json',
						toAddress: 'gnaf-address.json',
						toTelephone: 'gnaf-telephone.json',
						toUnit: 'gnaf-postcode.json',
					},
					postcode: {
						toLatlng: 'postcode-latlng.json',
						toStatic: 'postcode-static.json',
						toParcel: 'postcode-parcel.json',
						toGnaf: 'postcode-gnaf.json',
					},
					gas: {
						toLatlng: 'gas-latlng.json',
						toStatic: 'gas-static.json',
						toParcel: 'gas-parcel.json',
					},
					water: {
						toLatlng: 'water-latlng.json',
						toStatic: 'water-static.json',
						toParcel: 'water-parcel.json',
					},
					electricity: {
						toLatlng: 'electricity-latlng.json',
						toStatic: 'electricity-static.json',
						toParcel: 'electricity-parcel.json',
					},
					renovation: {
						toLatlng: 'renovation-latlng.json',
						toStatic: 'renovation-static.json',
						toParcel: 'renovation-parcel.json',
					},
					mobile: {
						toLatlng: 'mobile-latlng.json',
						toStatic: 'mobile-static.json',
						toParcel: 'mobile-parcel.json',
					},
					telephone: {
						toLatlng: 'telephone-latlng.json',
						toStatic: 'telephone-static.json',
						toParcel: 'telephone-parcel.json',
						toGnaf: 'telephone-gnaf.json',
					},
					parcel: {
						toLatlng: 'parcel-latlng.json',
						toStatic: 'parcel-static.json',
						toParcel: 'parcel-parcel.json',
						toGnaf: 'parcel-gnaf.json',
					},
				},
				layerManagement: {
					server: 'http://geo.shiveh.com/geoserver/Shiveh/wms',
					dataStore: {
						shapeFile: 'layer-management-datastore-shapefile.json',
						database: 'layer-management-datastore-database.json',
						layer: 'layer-management-database-layers.json',
					},
					layerGroup: {
						layerGroup: '',
						layer: '',
					},
					identify: 'layer-management-identify.json',
				},
				auth            : {
                    server        : '',
                    signUp        : 'https://map.ir/auth/users',
                    login         : 'https://map.ir/auth/authenticate',
                    logout        : 'https://map.ir/auth/authenticate',
                    validate      : 'https://map.ir/auth/validate',
                    settings      : 'https://map.ir/auth/users',
                    readUser      : 'https://map.ir/auth/users',
                    forgotPassword: 'https://map.ir/auth/forgot-password',
                    validateForgot: 'https://map.ir/auth/validate-forgot',
                    resetPassword : 'https://map.ir/auth/forgetToken',
                    changePassword: 'https://map.ir/auth/change-password',
                    googleAuth    : 'https://map.ir/social/web/redirect',
                    sms           : 'https://map.ir/auth/sms'
                },
                feedback        : 'http://support.map.ir/api/index.php/Tickets/Ticket',
                routing         : {
                    primary : 'https://map.ir/routes/route/v1',
                    foot    : 'https://map.ir/routes/foot/v1',
                    bicycle : 'https://map.ir/routes/bicycle/v1',
                    zojofard: 'https://map.ir/routes/zojofard/v1',
                    tarh    : 'https://map.ir/routes/tarh/v1'
                },
			},
		},
		test: {
			url: {
				domain: 'http://localhost',
				defaultBaselayer: 'https://map.ir/shiveh',
				static: 'https://map.ir/static',
				downloads: {
					apps: {
						android: 'http://corp.map.ir/دانلود-اپلیکیشن-مپ/',
						ios: '#',
					},
				},
				route: 'https://map.ir/routes/',
				search: {
					geocode: 'https://map.ir/search',
					reverse: 'https://map.ir/reverse',
					poi: 'https://map.ir/search',
					gnaf: {
						toLatlng: 'http://post.shiveh.com/post-search/search/gnaf/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/gnaf/map/',
						toAddress: 'http://post.shiveh.com/post-search/search/gnaf/standard_address/',
						toTelephone: 'http://post.shiveh.com/post-search/search/gnaf/telephone',
						toUnit: 'http://post.shiveh.com/post-search/search/gnaf/floor_unit_postcode/',
					},
					postcode: {
						toLatlng: 'http://post.shiveh.com/post-search/search/postcode/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/postcode/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/postcode/parcel_postcode_address/',
						toGnaf: 'http://post.shiveh.com/post-search/search/postcode/gnaf/',
					},
					gas: {
						toLatlng: 'http://post.shiveh.com/post-search/search/gaz/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/gaz/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/gaz/parcel_postcode_address/',
					},
					water: {
						toLatlng: 'http://post.shiveh.com/post-search/search/water/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/water/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/water/parcel_postcode_address/',
					},
					electricity: {
						toLatlng: 'http://post.shiveh.com/post-search/search/bargh/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/bargh/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/bargh/parcel_postcode_address/',
					},
					renovation: {
						toLatlng: 'http://post.shiveh.com/post-search/search/renovation/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/renovation/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/renovation/parcel_postcode_address/',
					},
					mobile: {
						toLatlng: 'http://post.shiveh.com/post-search/search/mobile/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/mobile/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/mobile/parcel_postcode_address/',
					},
					telephone: {
						toLatlng: 'http://post.shiveh.com/post-search/search/telephone/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/telephone/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/telephone/parcel_postcode_address/',
						toGnaf: 'http://post.shiveh.com/post-search/search/telephone/gnaf/',
					},
					parcel: {
						toLatlng: 'http://post.shiveh.com/post-search/search/parcel/location/',
						toStatic: 'http://post.shiveh.com/post-search/search/parcel/map/',
						toParcel: 'http://post.shiveh.com/post-search/search/parcel/parcel_postcode_address/',
						toGnaf: 'http://post.shiveh.com/post-search/search/parcel/gnaf/',
					},
				},
				layerManagement: {
					server: 'http://geo.shiveh.com/geoserver/Shiveh/wms',
					dataStore: {
						shapeFile: 'http://dev.shiveh.com/layer-management/datastores/shapefiles',
						database: 'http://dev.shiveh.com/layer-management/datastores/databases',
						layer: 'http://dev.shiveh.com/layer-management/datastores',
					},
					layerGroup: {
						layerGroup: 'http://dev.shiveh.com/layer-management/layergroups',
						layer: 'http://dev.shiveh.com/layer-management/layergroups',
					},
					identify: 'http://dev.shiveh.com/layer-management/identify',
				},
				auth            : {
                    server        : '',
                    signUp        : 'https://map.ir/auth/users',
                    login         : 'https://map.ir/auth/authenticate',
                    logout        : 'https://map.ir/auth/authenticate',
                    validate      : 'https://map.ir/auth/validate',
                    settings      : 'https://map.ir/auth/users',
                    readUser      : 'https://map.ir/auth/users',
                    forgotPassword: 'https://map.ir/auth/forgot-password',
                    validateForgot: 'https://map.ir/auth/validate-forgot',
                    resetPassword : 'https://map.ir/auth/forgetToken',
                    changePassword: 'https://map.ir/auth/change-password',
                    googleAuth    : 'https://map.ir/social/web/redirect',
                    sms           : 'https://map.ir/auth/sms'
                },
                feedback        : 'http://support.map.ir/api/index.php/Tickets/Ticket',
                routing         : {
                    primary : 'https://map.ir/routes/route/v1',
                    foot    : 'https://map.ir/routes/foot/v1',
                    bicycle : 'https://map.ir/routes/bicycle/v1',
                    zojofard: 'https://map.ir/routes/zojofard/v1',
                    tarh    : 'https://map.ir/routes/tarh/v1'
                },
			},
		},
		production: {
			url: {
				domain: 'http://localhost',
				defaultBaselayer: 'https://map.ir/shiveh',
				static: 'https://map.ir/static',
				downloads: {
					apps: {
						android: 'http://corp.map.ir/دانلود-اپلیکیشن-مپ/',
						ios: '#',
					},
				},
				route: 'https://map.ir/routes/',
				search: {
					geocode: 'https://map.ir/search',
					reverse: 'https://map.ir/reverse',
					poi: 'https://map.ir/search',
					gnaf: {
						toLatlng: '/post-search/search/gnaf/location/',
						toStatic: '/post-search/search/gnaf/map/',
						toAddress: '/post-search/search/gnaf/standard_address/',
						toTelephone: '/post-search/search/gnaf/telephone',
						toUnit: '/post-search/search/gnaf/floor_unit_postcode/',
					},
					postcode: {
						toLatlng: '/post-search/search/postcode/location/',
						toStatic: '/post-search/search/postcode/map/',
						toParcel: '/post-search/search/postcode/parcel_postcode_address/',
						toGnaf: '/post-search/search/postcode/gnaf/',
					},
					gas: {
						toLatlng: '/post-search/search/gaz/location/',
						toStatic: '/post-search/search/gaz/map/',
						toParcel: '/post-search/search/gaz/parcel_postcode_address/',
					},
					water: {
						toLatlng: '/post-search/search/water/location/',
						toStatic: '/post-search/search/water/map/',
						toParcel: '/post-search/search/water/parcel_postcode_address/',
					},
					electricity: {
						toLatlng: '/post-search/search/bargh/location/',
						toStatic: '/post-search/search/bargh/map/',
						toParcel: '/post-search/search/bargh/parcel_postcode_address/',
					},
					renovation: {
						toLatlng: '/post-search/search/renovation/location/',
						toStatic: '/post-search/search/renovation/map/',
						toParcel: '/post-search/search/renovation/parcel_postcode_address/',
					},
					mobile: {
						toLatlng: '/post-search/search/mobile/location/',
						toStatic: '/post-search/search/mobile/map/',
						toParcel: '/post-search/search/mobile/parcel_postcode_address/',
					},
					telephone: {
						toLatlng: '/post-search/search/telephone/location/',
						toStatic: '/post-search/search/telephone/map/',
						toParcel: '/post-search/search/telephone/parcel_postcode_address/',
						toGnaf: '/post-search/search/telephone/gnaf/',
					},
					parcel: {
						toLatlng: '/post-search/search/parcel/location/',
						toStatic: '/post-search/search/parcel/map/',
						toParcel: '/post-search/search/parcel/parcel_postcode_address/',
						toGnaf: '/post-search/search/parcel/gnaf/',
					},
				},
				layerManagement: {
					server: 'http://geo.shiveh.com/geoserver/Shiveh/wms',
					dataStore: {
						shapeFile: '/layer-management/datastores/shapefiles',
						database: '/layer-management/datastores/databases',
						layer: '/layer-management/datastores',
					},
					layerGroup: {
						layerGroup: '/layer-management/layergroups',
						layer: '/layer-management/layergroups',
					},
					identify: '/layer-management/identify',
				},
				auth            : {
                    server        : '',
                    signUp        : '/auth/users',
                    login         : '/auth/authenticate',
                    logout        : '/auth/authenticate',
                    validate      : '/auth/validate',
                    settings      : '/auth/users',
                    readUser      : '/auth/users',
                    forgotPassword: '/auth/forgot-password',
                    validateForgot: '/auth/validate-forgot',
                    resetPassword : '/auth/forgetToken',
                    changePassword: '/auth/change-password',
                    googleAuth    : '/social/web/redirect',
                    sms           : '/auth/sms'
                },
                feedback        : '/api/index.php/Tickets/Ticket',
                routing         : {
                    primary : '/routes/route/v1',
                    foot    : '/routes/foot/v1',
                    bicycle : '/routes/bicycle/v1',
                    zojofard: '/routes/zojofard/v1',
                    tarh    : '/routes/tarh/v1'
                },
			},
		},
	}

	var options;

	$.env = function(opt) {
		options = $.extend(true, {
			mode: 'production',
		}, opt);

		return env[options.mode];
	}

})

function getSmapWd(opt){
	var html = '<div class="mapp-path-finder"></div>';

	$('body').append(html);

	var img = document.querySelector('.mapp-path-finder');
	var style = img.currentStyle || window.getComputedStyle(img, false);
	var backgroundImage = style.backgroundImage;
	var url = backgroundImage.slice(4, -1).replace(/"/g, '');
	var extract = url.substring(0, url.lastIndexOf(opt));
	// var slash = extract.lastIndexOf('/');
	// var wd = url.substring(slash, extract.length) + '/';
	var wd = extract + '/';

	$('.mapp-path-finder').remove();

	return wd;
}

var smapWd = getSmapWd('/assets/images/');

// console.log(smapWd);
