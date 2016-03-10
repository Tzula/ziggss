var dealMaps = [];

(function(window,undefined){
	// Bind to StateChange Event
	History.Adapter.bind(window,'statechange',function(){
		var State = History.getState();
	});
})(window);

jQuery(document).ready(function() {
	jQuery('.deal-carousel').carousel();

	jQuery('.location-tab').on('click', function (e) {
		initMap(jQuery(this));
	});

	jQuery('.deal-modal').one('shown', function (e) {
		dealId = jQuery(this).attr('data-dealId');
		dealTitle = jQuery(this).attr('data-dealtitle');
		dealUrl = jQuery(this).attr('data-dealurl');
		openModal(dealId, dealTitle, dealUrl);
	});

	jQuery('.deal-modal').on('shown.bs.modal', function (e) {
		dealId = jQuery(this).attr('data-dealId');
		dealTitle = jQuery(this).attr('data-dealtitle');
		dealUrl = jQuery(this).attr('data-dealurl');
		openModal(dealId, dealTitle, dealUrl);
	})

	jQuery('.deal-modal').on('hidden', function () {
		History.pushState({state:dealId}, defaultTitle, defaultUrl);
	});

	jQuery('.deal-modal').on('hidden.bs.modal', function () {
		History.pushState({state:dealId}, defaultTitle, defaultUrl);
	});
});

function openModal(dealId, dealTitle, dealUrl) {
	trackClick(dealId);
	History.pushState({state:dealId}, dealTitle, dealUrl);
}

function initMap(locationTab) {
	dealId = locationTab.find('input.deal-id').val();

	if (dealMaps[dealId]) return;

	setTimeout(function() {
		lat = locationTab.find('input.latitude').val();
		lng = locationTab.find('input.longitude').val();

		latlng = new google.maps.LatLng(lat, lng);

		mapOptions = {
			zoom: zoomLevel,
			center: latlng
		};

		dealMaps[dealId] = new google.maps.Map(
			document.getElementById('mapCanvas' + dealId),
			mapOptions
		);

		marker = new google.maps.Marker({
			position: latlng,
			map: dealMaps[dealId],
		});
	}, 500);
}

function getCoupon(dealId) {
	//window.location = siteUrl + '/index.php?option=com_cmlivedeal&task=coupon.capture&deal_id=' + parseInt(dealId);
}

function viewDeal(dealId, dealUrl) {
	trackClick(dealId);
	window.location = dealUrl;
}

function trackClick(dealId) {
	jQuery.ajax({
		url: siteUrl + '/index.php?option=com_cmlivedeal&task=deal.track&format=json&' + token + '=1',
		data: {
			deal_id: parseInt(dealId),
		},
		type: 'POST',
		dataType: 'json',
	});
}