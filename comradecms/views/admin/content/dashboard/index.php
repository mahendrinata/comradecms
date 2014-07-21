<div class="dashboard-widget">
    <div class="row-fluid">
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors graphic_design_sl"></i> <span class="dasboard-icon-title">Dashboard</span> </a> </div>
            </div>
        </div>
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors settings_sl"></i> <span class="dasboard-icon-title">Settings</span> </a> </div>
            </div>
        </div>
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors customers_sl"></i> <span class="dasboard-icon-title">Users Lits</span> </a> </div>
            </div>
        </div>
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors current_work_sl"></i> <span class="dasboard-icon-title">Statistics</span> </a> </div>
            </div>
        </div>
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors archives_sl"></i> <span class="dasboard-icon-title">Content</span> </a> </div>
            </div>
        </div>
        <div class="span2">
            <div class="dashboard-wid-wrap">
                <div class="dashboard-wid-content"> <a href="#"> <i class="dashboard-icons-colors lightbulb_sl"></i> <span class="dasboard-icon-title">Suport</span> </a> </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="switch-board-round">
        <ul class="clearfix">
            <li><a href="#" class="tip-top" title="Add User"><span class="srabon-sprite plus_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Add Post"><span class="srabon-sprite cv_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Recent Order"><span class="srabon-sprite bank_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Address Book"><span class="srabon-sprite address_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Advance Search"><span class="srabon-sprite search_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Events"><span class="srabon-sprite full_time_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Upload Files"><span class="srabon-sprite upcoming_work_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="File Explorer "><span class="srabon-sprite category_sl"></span></a></li>
            <li><a href="#" class="tip-top" title="Print"><span class="srabon-sprite print_sl"></span></a></li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span9">
        <div class="index-graph">
            <div class="chart-block">
                <div id="chart1"> </div>
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="summary">
            <ul>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>user-accounts.png" width="36" height="36" alt="New Accounts"></span><span class="count">3645</span><span class="summary-title"> New Accounts</span></li>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>items.png" width="36" height="36" alt="New Items"></span><span class="count">250</span><span class="summary-title"> New Items</span></li>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>posts.png" width="36" height="36" alt="New Posts"></span><span class="count">123</span><span class="summary-title"> New Post</span></li>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>orders.png" width="36" height="36" alt="New Orders"></span><span class="count">215</span><span class="summary-title"> New Orders</span></li>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>shipped.png" width="36" height="36" alt="Order Shipped"></span><span class="count">124</span><span class="summary-title"> Orders Shipped</span></li>
                <li><span class="summary-icon"><img src="<?php echo admin_base_url('img'); ?>complete.png" width="36" height="36" alt="Order Completed"></span><span class="count">100</span><span class="summary-title"> Orders Completed</span></li>
            </ul>
        </div>
    </div>
</div>

<script>
    $(function() {
        var line1 = [['23-May-08', 299.14], ['20-Jun-08', 320.45], ['25-Jul-08', 480.88], ['22-Aug-08', 509.84],
            ['26-Sep-08', 654.13], ['24-Oct-08', 779.75], ['21-Nov-08', 803], ['26-Dec-08', 908.56],
            ['23-Jan-09', 501.14], ['20-Feb-09', 1056.51], ['20-Mar-09', 1225.99], ['24-Apr-09', 1386.15]];
        var plot1 = $.jqplot('chart1', [line1], {
            title: 'THIS MONTH REVENUE',
            axes: {
                xaxis: {
                    renderer: $.jqplot.DateAxisRenderer,
                    tickOptions: {
                        formatString: '%b&nbsp;%#d'
                    }
                },
                yaxis: {
                    tickOptions: {
                        formatString: '$%.2f'
                    }
                }
            },
            seriesDefaults: {
                show: true, // wether to render the series.
                xaxis: 'xaxis', // either 'xaxis' or 'x2axis'.
                yaxis: 'yaxis', // either 'yaxis' or 'y2axis'.
                color: '#196795', // CSS color spec to use for the line.  Determined automatically.
                lineWidth: 3, // Width of the line in pixels.
                shadow: false  // show shadow or not.
            },
            highlighter: {
                show: true,
                sizeAdjust: 7.5
            },
            grid: {
                background: '#fff',
                drawBorder: false,
                shadow: false,
                gridLineColor: '#ccc',
                gridLineWidth: 1
            },
            cursor: {
                show: false
            }
        });
    });
    $(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        $('#calendar-widget').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                prev: 'Prev',
                next: 'Next',
                today: 'Today',
                month: 'Month',
                week: 'Week',
                day: 'Day'
            },
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d - 5),
                    end: new Date(y, m, d - 2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d - 3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d + 4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d + 1, 19, 0),
                    end: new Date(y, m, d + 1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });
    });
</script>