<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ config('app.name', 'Laravel') }}@hasSection('title')
            - @yield('title')
        @endif
    </title>

    <link href="{{ env('APP_URL') }}/assets/css/tabler.min.css" rel="stylesheet" />
    <link href="{{ env('APP_URL') }}/assets/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="{{ env('APP_URL') }}/assets/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="{{ env('APP_URL') }}/assets/css/tabler-vendors.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<div class="page">
    @include('layouts.header-menu')

    <div class="page-wrapper">

        @yield('content')

        @include('layouts.footer')
    </div>

</div>

@include('layouts.modal.request-modal')

<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/jquery.dataTables.min.js"></script>
<!-- Libs JS -->
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/apexcharts/dist/apexcharts.min.js" defer></script>
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/jsvectormap/dist/js/jsvectormap.min.js" defer>
</script>
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/jsvectormap/dist/maps/world.js" defer></script>
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/libs/jsvectormap/dist/maps/world-merc.js" defer>
</script>
<!-- Tabler Core -->
<script type="text/javascript" src="{{ env('APP_URL') }}/assets/js/tabler.min.js" defer></script>

@if (isset($chart_summary_addition) &&
        isset($chart_summary_exclude) &&
        isset($chart_summary_dates) &&
        isset($chart_countries))
    <script type="text/javascript">
        function generateRandomColors() {
            const colors = [];
            for (let i = 0; i < Object.keys(@json($chart_countries)).length; i++) {
                const randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
                colors.push(randomColor);
            }
            return colors;
        }

        const chart1 = document.getElementById('chart-mentions');

        if (chart1) {
            document.addEventListener("DOMContentLoaded", () => {
                window.ApexCharts && (new ApexCharts(chart1, {
                    chart: {
                        type: "bar",
                        fontFamily: 'inherit',
                        height: 240,
                        parentHeightOffset: 0,
                        toolbar: {
                            show: false,
                        },
                        animations: {
                            enabled: false
                        },
                        stacked: true,
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '50%',
                        }
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    series: [{
                        name: "Exclude",
                        data: @json($chart_summary_exclude),
                    }, {
                        name: "Addition",
                        data: @json($chart_summary_addition),
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        padding: {
                            top: -20,
                            right: 0,
                            left: -4,
                            bottom: -4
                        },
                        strokeDashArray: 4,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                        },
                        tooltip: {
                            enabled: false
                        },
                        axisBorder: {
                            show: false,
                        },
                        type: 'datetime',
                    },
                    yaxis: {
                        labels: {
                            padding: 4
                        },
                    },
                    labels: @json($chart_summary_dates),
                    colors: [tabler.getColor("primary"), tabler
                        .getColor(
                            "green", 0.8)
                    ],
                    legend: {
                        show: false,
                    },
                })).render();
            });

            document.addEventListener("DOMContentLoaded", () => {
                const map = new jsVectorMap({
                    selector: '#map-world',
                    map: 'world',
                    backgroundColor: 'transparent',
                    regionStyle: {
                        initial: {
                            fill: tabler.getColor('body-bg'),
                            stroke: tabler.getColor('border-color'),
                            strokeWidth: 1,
                        },
                        // initial: {
                        //     "fill": '#265cff',
                        //     "fill-opacity": 1,
                        //     "stroke": '#265cff',
                        //     "stroke-width": 0,
                        //     "stroke-opacity": 0
                        // },
                        // hover: {
                        //     "fill-opacity": 0.8,
                        //     "fill": '#FFFB00',
                        //     "stroke": '#FFFB00'
                        // },
                        // selected: {
                        //     "fill": '#FFFB00'
                        // }
                    },
                    zoomOnScroll: true,
                    zoomButtons: true,
                    // -------- Series --------
                    series: {
                        regions: [{
                            values: @json($chart_countries),
                            scale: generateRandomColors(),
                            // scale: [tabler.getColor('bg-surface'), tabler.getColor('primary')],
                            normalizeFunction: 'polynomial',
                        }]
                    },
                    onRegionLabelShow: function(event, label, code) {
                        $(label).append($("<br/>"));
                        $(label).append($("<span/>", {
                            'class': 'population',
                            'html': 'Populație: ' + parseInt(Math.random() * (1000000 -
                                1000) + 1000)
                        }));
                    },
                    onRegionTipShow: function(event, element, code) {
                        console.log('Region code:', code);
                        const countryName = map.getRegionName(code);
                        const count = map.series.regions[0].values[code];
                        console.log('Country:', countryName);
                        console.log('Count:', count);

                        element.html(countryName + ': ' + count);
                    },
                });
                window.addEventListener("resize", () => {
                    map.updateSize();
                });
            });
        }
    </script>
@endif

@yield('scripts')

</html>
