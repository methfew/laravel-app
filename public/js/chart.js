(function ($) {

	var charts = {
		init: function() {
			this.ajaxGetCarMonthlyData();

		},

        ajaxGetCarMonthlyData: function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var urlPath = 'http://' + window.location.hostname + '/admin/getMonthlyCarData';
            var request = $.ajax( {
                method: 'GET',
                url: urlPath
            });

            request.done(function (response){
				charts.createCompletedJobsChart(response);
            });
        },

        /**
		 * Created the Completed Jobs Chart
		 */
        createCompletedJobsChart: function (response) {

            var ctx = document.getElementById('carChart').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
					labels: response.months, // The response got from the ajax request containing all month names in the database
					datasets: [{
						label: "Sessions",
						lineTension: 0.3,
						backgroundColor: "#f5925d",
						borderColor: "#ffa778",
						pointRadius: 5,
						pointBackgroundColor: "#ffa778",
						pointBorderColor: "#ffffff",
						pointHoverRadius: 5,
						pointHoverBackgroundColor: "#e55305",
						pointHitRadius: 20,
						pointBorderWidth: 2,
						data: response.car_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
					}],
                },

                // Configuration options go here
                options: {
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
							},
							gridLines: {
								color: "rgba(0, 0, 0, .125)",
							}
						}],
					},
					legend: {
						display: false
					}
				}
            });
        }
	};

	charts.init();

} )( jQuery );