document.addEventListener('turbo:load', loadDashboardData);

function loadDashboardData() {
    clickDayData();
    appointmentsDataAjax();
    datePickerInitialise();
    loadAdminDashboardData();
}
let dashboardChartType = 'line';
let dashboardStacked = false;
let dashboardWeeklyBarChartResult = '';
let dashboardPlanIncomeChartData = '';
listenClick('#dayData', function (e) {
    e.preventDefault();
    $.ajax({
        url: route('usersData.dashboard'),
        type: 'GET',
        data: { day: 'day' },
        success: function (result) {
            if (result.success) {
                $('#dailyReport').empty();
                $(document).find('#month').removeClass('show active');
                $(document).find('#week').removeClass('show active');
                $(document).find('#day').addClass('show active');
                if (result.data.users.data != '') {
                    $.each(result.data.users.data, function (index, value) {
                        let data = [
                            {
                                'name': value.first_name + ' ' +
                                    value.last_name,
                                'email': value.email,
                                'contact': !isEmpty(value.contact)
                                    ? '+' + value.region_code + ' ' +
                                    value.contact
                                    : 'N/A',
                                'registered': value.multi_language_date,
                            }];
                        $(document).find('#dailyReport').append(
                            prepareTemplateRender('#sadminDashboardTemplate',
                                data));
                    });
                } else {
                    $(document).find('#dailyReport').append(`
                    <tr class="text-center">
                        <td colspan="5" class="text-muted fw-bold">${noData}</td>
                    </tr>`);
                }
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

function clickDayData () {
    if (!$('#dayData').length) {
        return;
    }
    $('#dayData').click();
}

listenClick('#weekData', function (e) {
    e.preventDefault();
    $.ajax({
        url: route('usersData.dashboard'),
        type: 'GET',
        data: { week: 'week' },
        success: function (result) {
            if (result.success) {
                $('#weeklyReport').empty();
                $(document).find('#month').removeClass('show active');
                $(document).find('#week').addClass('show active');
                $(document).find('#day').removeClass('show active');
                if (result.data.users.data != '') {
                    $.each(result.data.users.data, function (index, value) {
                        let data = [
                            {
                                'name': value.first_name + ' ' +
                                    value.last_name,
                                'email': value.email,
                                'contact': !isEmpty(value.contact)
                                    ? '+' + value.region_code + ' ' +
                                    value.contact
                                    : 'N/A',
                                'registered': moment.parseZone(
                                    value.created_at).
                                    format('Do MMM Y hh:mm A'),
                            }];
                        $(document).find('#weeklyReport').append(
                            prepareTemplateRender('#sadminDashboardTemplate',
                                data));
                    });
                } else {
                    $(document).find('#weeklyReport').append(`
                    <tr class="text-center">
                        <td colspan="5" class="text-muted fw-bold">${noData}</td>
                    </tr>`);
                }
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});
listenClick('#monthData', function (e) {
    e.preventDefault();
    $.ajax({
        url: route('usersData.dashboard'),
        type: 'GET',
        data: { month: 'month' },
        success: function (result) {
            if (result.success) {
                $('#monthlyReport').empty();
                $(document).find('#month').addClass('show active');
                $(document).find('#week').removeClass('show active');
                $(document).find('#day').removeClass('show active');
                if (result.data.users.data != '') {
                    $.each(result.data.users.data, function (index, value) {
                        let data = [
                            {
                                'name': value.first_name + ' ' +
                                    value.last_name,
                                'email': value.email,
                                'contact': !isEmpty(value.contact)
                                    ? '+' + value.region_code + ' ' +
                                    value.contact
                                    : 'N/A',
                                'registered': moment.parseZone(
                                    value.created_at).
                                    format('Do MMM Y hh:mm A'),
                            }];
                        $(document).find('#monthlyReport').append(
                            prepareTemplateRender('#sadminDashboardTemplate',
                                data));
                    });
                } else {
                    $(document).find('#monthlyReport').append(`
                    <tr class="text-center">
                        <td colspan="5" class="text-muted fw-bold">${noData}</td>
                    </tr>`);
                }
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
});

function appointmentsDataAjax () {
    if (!$('#appointmentReport').length) {
        return
    }
    $.ajax({
        url: route('appointmentsData.data'),
        type: 'GET',
        success: function (result) {
            $(document).find('#appointmentReport').children().remove()
            if (result.data.data != '') {
                $.each(result.data.data, function (index, value) {
                    let data = [
                        {
                            'vcardname': value.vcard.name,
                            'name': value.name,
                            'phone': !isEmpty(value.phone) ? '+' + value.phone : 'N/A',
                            'email': value.email,
                        }];
                    $(document).find('#appointmentReport').append(
                        prepareTemplateRender('#appointmentTemplate',
                            data));
                });
            }
            else
            {
                $(document).find('#appointmentReport').append(`
                    <tr class="text-center">
                        <td colspan="5" class="text-muted fw-bold">${noData}</td>
                    </tr>`);
            }
        },
        error: function (result) {
            displayErrorMessage(result.responseJSON.message);
        },
    });
}
let start = '';
let end = '';
const datePickerInitialise = () => {
    if (!$('#dashboardTimeRange').length) {
        return
    }
    let timeRange = $('#dashboardTimeRange');
    let isPickerApply = true;
    const today = moment();
    start = moment().subtract('30', 'days');
    end = today.clone().endOf('days');
    timeRange.on('apply.daterangepicker', function (ev, picker) {
        isPickerApply = true;
        start = picker.startDate;
        end = picker.endDate;
        loadDashboardChart(start.format('YYYY-MM-D  H:mm:ss'), end.format('YYYY-MM-D  H:mm:ss'));
    });
    

    window.cb = function (start, end) {
        timeRange.find('span').html(start.format('MMM D, YYYY') + ' - ' +end.format('MMM D, YYYY'));
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

    loadDashboardChart(start.format('YYYY-MM-D H:mm:ss'),
        end.format('YYYY-MM-D H:mm:ss'));
};


const loadDashboardChart = (startDate, endDate) => {
    $.ajax({
        type: 'GET',
        url: route('dashboard.vcard.chart'),
        dataType: 'json',
        data: {
            start_date: startDate,
            end_date: endDate,
        },
        success: function (result) {
            dashboardWeeklyBarChartResult = result
            dashboardWeeklyBarChart(result);
        },
        cache: false,
    });
}

const dashboardWeeklyBarChart = (result) => {
    const dashboardWeeklyUserBarChartContainer = $('#dashboardWeeklyUserBarChartContainer')
    if (!dashboardWeeklyUserBarChartContainer.length) {
        return
    }
    
    dashboardWeeklyUserBarChartContainer.html('');
    $('canvas#dashboardWeeklyUserBarChart').remove();
    dashboardWeeklyUserBarChartContainer.append('<canvas id="dashboardWeeklyUserBarChart" height="275" width="905" style="display: block; width: 905px; height: 500px;"></canvas>');

    let data = result.data;
    let barChartData = {
        labels: data.weeklyLabels,
        datasets: data.data,
    };
    let ctx = $('#dashboardWeeklyUserBarChart');
    let config = new Chart(ctx, {
        type: dashboardChartType,
        data: barChartData,
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y:{
                    stacked: dashboardStacked,
                    ticks: {
                        min: 0,
                        precision: 0,
                    },
                    min: 0
                },
                x:{
                    stacked: dashboardStacked,
                },
            },
        },
    });
}

listenClick('#dashboardChangeChart', function () {
    if (dashboardChartType === 'bar') {
        dashboardChartType = 'line';
        dashboardStacked = false;
        $('.chart').removeClass('fa-chart-line')
        $('.chart').addClass('fa-chart-column')
        dashboardWeeklyBarChart(dashboardWeeklyBarChartResult)
    } else {
        dashboardChartType = 'bar'
        dashboardStacked = true
        $('.chart').addClass('fa-chart-line')
        $('.chart').removeClass('fa-chart-column')
        dashboardWeeklyBarChart(dashboardWeeklyBarChartResult)
    }
})

window.statiscticsColors = [
    'rgb(245, 158, 11)',
    'rgb(77, 124, 15)',
    'rgb(254, 199, 2)',
    'rgb(80, 205, 137)',
    'rgb(16, 158, 247)',
    'rgb(241, 65, 108)',
    'rgb(80, 205, 137)',
    'rgb(245, 152, 280)',
    'rgb(13, 148, 136)',
    'rgb(59, 130, 246)',
]

let incomeChartCanvasAttr = ''

function loadAdminDashboardData () {
    if (!$('#incomeChartCanvas').length) {
        return;
    }
    
    incomeChartCanvasAttr = $('#incomeChartCanvas');
    dashboardPlanChart();
    dashboardIncomeChart();
}

const dashboardPlanChart = () => {
    $.ajax({
        type: 'post',
        url: route('dashboard.plan-chart'),
        dataType: 'json',
        success: function (result) {
            dashboardPlanPieChart(result.data.breakDown ,result.data.labels);
        },
        cache: false,
    });
}

const dashboardPlanPieChart = (data, labels) => {
    if (!$('#dashboardPlanPieChart').length) {
        return
    }
    let ctx = document.getElementById('dashboardPlanPieChart').getContext('2d')
    new Chart(ctx, {
        type: 'pie',
        options: {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            return labels[context.dataIndex] + ' ' + context.formattedValue + '%'
                        },
                    },
                },
            },
        },
        data: {
            datasets: [
                {
                    data: data,
                    backgroundColor: statiscticsColors,
                }],
        },
    });
}

let dashboardIncomeChartType = 'line'
const dashboardIncomeChart = () => {
    $.ajax({
        type: 'post',
        url: route('dashboard.income-chart'),
        dataType: 'json',
        success: function (result) {
            incomeChartCanvasAttr.empty()
            dashboardPlanIncomeChartData = result.data;
            dashboardPlanIncomeChart(dashboardPlanIncomeChartData);
        },
        cache: false,
    });
}

const dashboardPlanIncomeChart = (data) => {
    incomeChartCanvasAttr.empty()
    incomeChartCanvasAttr.append(
        '<canvas id="dashboardIncomeChart" class="mh-350px pt-0"></canvas>')
    let ctx = document.getElementById('dashboardIncomeChart').getContext('2d')
    let incomeChartObj = new Chart(ctx, {
        type: dashboardIncomeChartType,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            responsiveAnimationDuration: 500,
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.dataset.label ||
                                '';


                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += getCurrencyAmount(context.parsed.y.toFixed(2),getCurrencyCode);
                            }
                            return label;
                        }
                    }
                },
            },
            scales: {
                y:{
                    title: {
                        display: true,
                        text: Lang.get('messages.subscription.amount'),
                    },
                    min: 0
                },
                x:{ 
                    title: {
                        display: true,
                        text: Lang.get('messages.sadmin_dashboard.month'),
                    },
                },
            },
        },
        data: {
            labels: data.labels,
            datasets: data.breakDown,
        },
    });

    incomeChartObj.canvas.parentNode.style.height = '334px'
}

listenClick('#dashboardChangeIncomeChart', function () {
    if (dashboardIncomeChartType === 'bar') {
        dashboardIncomeChartType = 'line'
        $('.income-chart').removeClass('fa-chart-line')
        $('.income-chart').addClass('fa-chart-bar')
        dashboardPlanIncomeChart(dashboardPlanIncomeChartData)
    } else {
        dashboardIncomeChartType = 'bar'
        $('.income-chart').addClass('fa-chart-line')
        $('.income-chart').removeClass('fa-chart-bar')
        dashboardPlanIncomeChart(dashboardPlanIncomeChartData)
    }
})
