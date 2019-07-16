<canvas id="doughnut" width="200" height="200"></canvas>
<script>
    $(function () {

        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [
                        {{ $pay_stayus[0] }},
                        {{ $pay_stayus[1] }},
                        {{ $pay_stayus[2] }}
                    ],
                    backgroundColor: [
                        'rgb(226, 17, 34)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ]
                }],
                labels: [
                    '未支付',
                    '支付',
                    '已退款'
                ]
            },
            options: {
                maintainAspectRatio: false
            }
        };

        var ctx = document.getElementById('doughnut').getContext('2d');
        new Chart(ctx, config);
    });
</script>