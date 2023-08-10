<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="row">
            <!-- Order Statistics -->
            <div class="col-md-12 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Top sản phẩm bán chạy</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-column align-items-center gap-1">

                            </div>
                        </div>
                        <ul class="p-0 m-0">
                            <?php foreach ($topSales as $topSale): ?>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-mobile-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                <?php echo $topSale['productName'] ?>
                                            </h6>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">
                                                <?php echo $topSale['TotalSold'] ?> SP
                                            </h6>
                                        </div>
                                        <div class="user-progress">
                                            <h6 class="mb-0">
                                                <?php echo number_format($topSale['Revenue'], 0, '.'); ?> VND
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <h5 class="m-0 me-2">Tổng doanh thu:
                            <?php echo number_format($orders['TotalMoney'], 0, '.'); ?> VND
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0 mb-4">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Thống kê Đơn hàng thành công</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <?php foreach ($ordersSucess as $ordersSale): ?>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-mobile-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                #
                                                <?php echo $ordersSale['cateId'] ?>
                                            </h6>
                                        </div>
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                <?php echo $ordersSale['TotalQuantity'] ?> Sản phẩm
                                            </h6>
                                        </div>
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                <?php echo number_format($ordersSale['totalMoney'], 0, '.'); ?> VND
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>                        
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="d-flex flex-column  align-items-center gap-1">
                                <h2 class="mb-2">
                                    <?php echo $orders['TotalDistinctCount'] ?>
                                </h2>
                                <span>Tổng số đơn hàng thành công</span>
                            </div>
                        </div>
                        <h5 class="m-0 me-2">Tổng doanh thu:
                            <?php echo number_format($orders['TotalMoney'], 0, '.'); ?> VND
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0 mb-4">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Thống kê Đơn hàng thất bại</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <?php foreach ($ordersUnSucess as $ordersSale): ?>
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-mobile-alt"></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                #
                                                <?php echo $ordersSale['cateId'] ?>
                                            </h6>
                                        </div>
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                <?php echo $ordersSale['TotalQuantity'] ?> Sản phẩm
                                            </h6>
                                        </div>
                                        <div class="me-2">
                                            <h6 class="mb-0">
                                                <?php echo number_format($ordersSale['totalMoney'], 0, '.'); ?> VND
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>                        
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="d-flex flex-column  align-items-center gap-1">
                                <h2 class="mb-2">
                                    <?php $totalOderUnsucess=0; foreach ($ordersUnSucess as $ordersSale): $totalOderUnsucess+=$ordersSale['total']; ?> <?php endforeach; echo $totalOderUnsucess; ?>
                                </h2>
                                <span>Tổng số đơn hàng thất bại</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h5 class="m-0 me-2">Doanh thu theo ngày</h5>
        <div id="chartDay"></div>
    </div>
    <div class="row">
        <h5 class="m-0 me-2">Doanh thu theo Tuần</h5>
        <div id="chartWeek"></div>
    </div>
    <div class="row">
        <h5 class="m-0 me-2">Doanh thu theo Tháng</h5>
        <div id="chartMonth"></div>
    </div>

    <?php
    $chart_data_day = '';
    foreach ($ordersByDays as $ordersByDay) {
        $chart_data_day .= "{ year:'" . $ordersByDay["Date"] . "', totalSale:" . $ordersByDay["Revenue"] . ", totalSold:" . $ordersByDay["TotalProductsSold"] . "},";
    }
    $chart_data_day = rtrim($chart_data_day, ",");

    $chart_data_week = '';
    foreach ($ordersByWeeks as $ordersByWeek) {
        $chart_data_week .= "{ Tuần:'" . $ordersByWeek["Year"] . " / " . $ordersByWeek["Week"] . "', totalSale:" . $ordersByWeek["Revenue"] . ", totalSold:" . $ordersByWeek["TotalProductsSold"] . "},";
    }
    $chart_data_week = rtrim($chart_data_week, ",");

    $chart_data_month = '';
    foreach ($ordersByMonths as $ordersByMonth) {
        $chart_data_month .= "{ year:'" . $ordersByMonth["Year"] . " / " . $ordersByMonth["Month"] . "', totalSale:" . $ordersByMonth["Revenue"] . ", totalSold:" . $ordersByWeek["TotalProductsSold"] . "},";
    }
    $chart_data_month = rtrim($chart_data_month, ",");
    ?>

    <script>
        var day = new Morris.Bar({
            element: 'chartDay',
            data: [<?php echo $chart_data_day; ?>],
            xkey: 'year',
            ykeys: ['totalSale', 'totalSold'],
            labels: ['Doanh thu:', 'Tổng sản phẩm bán:'],
            hideHover: 'auto',
            stacked: true
        });

        var week = new Morris.Bar({
            element: 'chartWeek',
            data: [<?php echo $chart_data_week; ?>],
            xkey: 'Tuần',
            ykeys: ['totalSale', 'totalSold'],
            labels: ['Doanh thu:', 'Tổng sản phẩm bán:'],
            hideHover: 'auto',
            stacked: true
        });

        var month = new Morris.Bar({
            element: 'chartMonth',
            data: [<?php echo $chart_data_month; ?>],
            xkey: 'year',
            ykeys: ['totalSale', 'totalSold'],
            labels: ['Doanh thu:', 'Tổng sản phẩm bán:'],
            hideHover: 'auto',
            stacked: true
        });
    </script>