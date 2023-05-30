document.addEventListener('turbo:load', loadAnalytics)

let chartType = 'line'
let start = ''
let end = ''
function loadAnalytics(){
    let timeRange = $('#timeRange');
    let isPickerApply = true;
    const today = moment();
    start = moment().subtract('30','days');
    end = today.clone().endOf('days');

    timeRange.on('apply.daterangepicker', function (ev, picker) {
        isPickerApply = true;
        start = picker.startDate;
        end = picker.endDate;
        loadDashboardData(start.format('YYYY-MM-D  H:mm:ss'), end.format('YYYY-MM-D  H:mm:ss'));
    });

    window.cb = function (start, end) {
        timeRange.find('span').
        html(
            start.format('MMM D, YYYY') + ' - ' +
            end.format('MMM D, YYYY'));
    };

    timeRange.daterangepicker({
        startDate: start,
        endDate: end,
        opens: 'left',
        showDropdowns: true,
        autoUpdateInput: false,
        locale: {
            customRangeLabel: Lang.get('messages.common.custom'),
            applyLabel:Lang.get('messages.common.apply'),
            cancelLabel: Lang.get('messages.common.cancel'),
            fromLabel:Lang.get('messages.common.from'),
            toLabel: Lang.get('messages.common.to'),
            monthNames: [
                Lang.get('messages.months.jan'),
                Lang.get('messages.months.feb'),
                Lang.get('messages.months.mar'),
                Lang.get('messages.months.apr'),
                Lang.get('messages.months.may'),
                Lang.get('messages.months.jun'),
                Lang.get('messages.months.jul'),
                Lang.get('messages.months.aug'),
                Lang.get('messages.months.sep'),
                Lang.get('messages.months.oct'),
                Lang.get('messages.months.nov'),
                Lang.get('messages.months.dec')
            ],

            daysOfWeek: [
                Lang.get('messages.weekdays.sun'),
                Lang.get('messages.weekdays.mon'),
                Lang.get('messages.weekdays.tue'),
                Lang.get('messages.weekdays.wed'),
                Lang.get('messages.weekdays.thu'),
                Lang.get('messages.weekdays.fri'),
                Lang.get('messages.weekdays.sat')],
        },
        ranges: {
            [ Lang.get('messages.placeholder.this_week')]: [moment().startOf('week'), moment().endOf('week')],
            [ Lang.get('messages.placeholder.last_week')]: [
                moment().startOf('week').subtract(7, 'days'),
                moment().startOf('week').subtract(1, 'days')],
        },
    }, cb);

    cb(start, end);
    

    loadDashboardData(start.format('YYYY-MM-D H:mm:ss'),
        end.format('YYYY-MM-D H:mm:ss'));


    let applyBtn = $('.range_inputs > button.applyBtn');
    $(document).on('click', '.ranges li', function () {
        if ($(this).data('range-key') === 'Custom Range') {
            applyBtn.css('display', 'initial');
        } else {
            applyBtn.css('display', 'none');
        }
    });
    applyBtn.css('display', 'none');
}

listenClick('#changeChart', function () {
    if (chartType === 'bar') {
        chartType = 'line'
        $('.chart').removeClass('fa-chart-line');
        $('.chart').addClass('fa-chart-bar');
        loadDashboardData(start.format('YYYY-MM-D H:mm:ss'),
            end.format('YYYY-MM-D H:mm:ss'))
    } else {
        chartType = 'bar'
        $('.chart').addClass('fa-chart-line');
        $('.chart').removeClass('fa-chart-bar');
        loadDashboardData(start.format('YYYY-MM-D H:mm:ss'),
            end.format('YYYY-MM-D H:mm:ss'))
    }
})

function loadDashboardData (startDate, endDate) {
    if (!$('#analyticVcardId').length) {
        return
    }
    let analyticVcardId = $('#analyticVcardId').val();
    $.ajax({
        type: 'GET',
        url: route('vcard.chart', analyticVcardId),
        dataType: 'json',
        data: {
            start_date: startDate,
            end_date: endDate,
            vcardId: analyticVcardId,
        },
        success: function (result) {
            WeeklyBarChart(result);
        },
        cache: false,
    });
};

function WeeklyBarChart (result) {
    if (!$('#weeklyUserBarChartContainer').length) {
        return
    }
    let visitors = $('#analyticVisitors').val();
    $('#weeklyUserBarChartContainer').html('');
    $('canvas#weeklyUserBarChart').remove();
    $('#weeklyUserBarChartContainer').
        append(
            '<canvas id="weeklyUserBarChart" height="275" width="905" style="display: block; width: 905px; height: 500px;"></canvas>');

    let data = result.data;
    const weeklyData = {
        labels: data.weeklyLabels,
        datasets: [
            {
                label: visitors,
                backgroundColor: 'rgba(0,158,247)',
                data: data.totalVisitorCount,
                lineTension: 0.5,
                borderColor: '#009EF7A3',
                radius: 4
            }],
    };
    let ctx = $('#weeklyUserBarChart');
    let config = new Chart(ctx, {
        type: chartType,
        data: weeklyData,
        options: {
            scales: {
                y: {
                    ticks: {
                        min: 0,
                        precision: 0,
                    },
                    min: 0
                },
            },
        },
    });
};
