 $(".statistic-chart .menu > ul > li").click(function(){
    $('.statistic-chart .menu ul li').removeClass('active');
    $(this).addClass('active');
})

 var day = new Date();
    // Thong ke cac thang trong nam
    $.get("functions/doanhthu/thongke_nam.php","json",function(dt){  
        var data =dt,
        json = JSON.parse(data);
        // 
        var buyerData = {
            type: 'bar',
            barPercentage: 1.5,
            labels : ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
            datasets : [
            {
                fillColor : "#87CEEB",
                strokeColor : "#3498db",
                pointColor : "#fff",
                pointStrokeColor : "#9DB86D",
                data : [json.thang1,json.thang2,json.thang3,json.thang4,json.thang5,json.thang6,json.thang7,json.thang8,json.thang9,json.thang10,json.thang11,json.thang12]
            }
            ],

        }

        // get line chart canvas
        var buyers = document.getElementById('buyers').getContext('2d');

        // draw line chart
        new Chart(buyers).Bar(buyerData); 
    }); // Ket thuc thong ke theo thang 
    // su kien click cho don hang
    $(".statistic-chart .menu .dh").click(function(){
        $(".statistic-chart .menu .sub-menu").html(' ');
        $(".statistic-chart .menu .sub-menu").html(`
           <ul>
           <li class="active year">Năm</li>
           <li class="month-ago">Tháng trước</li>
           <li class="this-month">Tháng này</li>
           <li class="day">7 ngày qua</li>
           </ul>
           <canvas id="buyers" width="900" height="500" ></canvas>
           `);
             // Thong ke cac thang trong nam
             $(".statistic-chart .menu .sub-menu .year").addClass('active');
             $.get("functions/doanhthu/thongke_nam.php","json",function(dt){  
                 var data =dt,
                 json = JSON.parse(data);
            // 
            var buyerData = {
                type: 'bar',
                barPercentage: 1.5,
                labels : ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
                datasets : [
                {
                    fillColor : "#87CEEB",
                    strokeColor : "#3498db",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [json.thang1,json.thang2,json.thang3,json.thang4,json.thang5,json.thang6,json.thang7,json.thang8,json.thang9,json.thang10,json.thang11,json.thang12]
                }
                ],

            }

            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');

            // draw line chart
            new Chart(buyers).Bar(buyerData); 
            }); // Ket thuc thong ke theo thang 
         })
    //  xu kien click don hon -> nam
    $(".statistic-chart ").on("click",'.menu .sub-menu .year',function(){
        if ( $('.statistic-chart .menu .dh').hasClass('active') ) {
            if (!$(this).hasClass('active')){
                $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
                $(this).addClass('active');
             // Thong ke cac thang trong nam
             $.get("functions/doanhthu/thongke_nam.php","json",function(dt){  
                 var data =dt,
                 json = JSON.parse(data);
            // 
            var buyerData = {
                type: 'bar',
                barPercentage: 1.5,
                labels : ["Tháng 1","Tháng 2","Tháng 3","Tháng 4","Tháng 5","Tháng 6","Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"],
                datasets : [
                {
                    fillColor : "#87CEEB",
                    strokeColor : "#3498db",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [json.thang1,json.thang2,json.thang3,json.thang4,json.thang5,json.thang6,json.thang7,json.thang8,json.thang9,json.thang10,json.thang11,json.thang12]
                }
                ],

            }

            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');

            // draw line chart
            new Chart(buyers).Bar(buyerData); 
            }); // Ket thuc thong ke theo thang 
         } 
     }
 })
    //  xu kien click don hon -> thang truoc
    $(".statistic-chart ").on("click",'.menu .sub-menu .month-ago',function(){
        if ( $('.statistic-chart .menu .dh').hasClass('active') ) {
            var month = ""; 
            if(day.getMonth() == 0) {
                month = 12;
                year = day.getFullYear() -1;
            } else {
                month = day.getMonth();
                year = day.getFullYear();
            }

            var date = new Date(year, month , 0).getDate();
            var array_date = new Array();
            for (var i = 1; i <= date; i++) {
                array_date.push(i);
            }

            if (!$(this).hasClass('active')){
                $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
                $(this).addClass('active');
             // Thong ke cac thang trong nam
             $.get("functions/doanhthu/thongke_thangago.php",{date:date},function(dt){  
                 var data =dt,
                 json = JSON.parse(data);
                 var data = new Array();
                 for(key in json) {
                    data.push(json[key]);
                }

            // var a= new Array("1", "2");
            var buyerData = {
                type: 'bar',
                barPercentage: 1.5,
                labels : array_date,
                datasets : [
                {
                    fillColor : "#87CEEB",
                    strokeColor : "#3498db",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : data
                }
                ],

            }

            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');

            // draw line chart
            new Chart(buyers).Bar(buyerData); 
            }); // Ket thuc thong ke theo thang truoc
         } 
     }
     }) // ket thuc thang truoc

    //  xu kien click don hon -> thang nay
    $(".statistic-chart ").on("click",'.menu .sub-menu .this-month',function(){
        if ( $('.statistic-chart .menu .dh').hasClass('active') ) {
            var month = ""; 
            month = day.getMonth();
            year = day.getFullYear();
            var date = new Date(year, month , 0).getDate();
            var array_date = new Array();
            for (var i = 1; i <= date; i++) {
                array_date.push(i);
            }

            if (!$(this).hasClass('active')){
                $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
                $(this).addClass('active');
                 // Thong ke cac thang trong nam
                 $.get("functions/doanhthu/thongke_thismonth.php",{date:date},function(dt){  
                     var data =dt,
                     json = JSON.parse(data);
                     var data = new Array();
                     for(key in json) {
                        data.push(json[key]);
                    }

                // var a= new Array("1", "2");
                var buyerData = {
                    type: 'bar',
                    barPercentage: 1.5,
                    labels : array_date,
                    datasets : [
                    {
                        fillColor : "#87CEEB",
                        strokeColor : "#3498db",
                        pointColor : "#fff",
                        pointStrokeColor : "#9DB86D",
                        data : data
                    }
                    ],

                }

                // get line chart canvas
                var buyers = document.getElementById('buyers').getContext('2d');

                // draw line chart
                new Chart(buyers).Bar(buyerData); 
                }); // Ket thuc thong ke theo thang 
             } 
         }
     }) // ket thuc thang nay
    /**************************
    xu kien click don hon -> day(7 ngay) */
    $(".statistic-chart ").on("click",'.menu .sub-menu .day',function(){
        if ( $('.statistic-chart .menu .dh').hasClass('active') ) {
            var date = day.getDate();
            var month = day.getMonth();
            var year = day.getFullYear();
            var date_now = date;
            var month_now = month +1;
            var year_now = year;
            var array_date = new Array();
            for (var i = 1; i <=7 ; i++) {
                if(date_now <= 0){
                    if( month > 0 ){
                        date_now = new Date(year_now, month -1, 0).getDate();
                        month_now++;
                    } else {
                        date_now = new Date(year_now-1, 12, 0).getDate();
                        month_now=12;
                        year_now--;
                    } 
                }
                array_date.push(year_now+"-"+month_now+"-"+date_now);
                date_now--; 
            }
            console.log(array_date);
        // console.log(array_date);
        if (!$(this).hasClass('active')){
            $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
            $(this).addClass('active');
             // Thong ke cac thang trong nam
             $.get("functions/doanhthu/thongke_day.php",{date:array_date},function(dt){  
               var data =dt,
               json = JSON.parse(data);

               console.log(dt);
               var data = new Array();
               var array_date = new Array();
               for(key in json) {
                    for(key1 in json[key]) {
                        array_date.push(key1);
                        data.push(json[key][key1]);
                    }
                }
                array_date = array_date.reverse();
                data = data.reverse();
                
            var buyerData = {   
                type: 'bar',
                barPercentage: 1.5,
                labels : array_date,
                datasets : [
                {
                    fillColor : "#87CEEB",
                    strokeColor : "#3498db",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : data
                }
                ],

            }

            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');

            // draw line chart
            new Chart(buyers).Bar(buyerData); 
            }); // Ket thuc thong ke theo thang 
         } 
     }
     }) // ket thuc 7 ngay 

    /* --------------------------------
            THONG KE KHO
            */
    //  click kho
    $(".statistic-chart .menu .kho").click(function(){
       // $('.statistic-chart .menu .sub-menu').html('');
       $('.statistic-chart .menu .sub-menu').html(`
        <ul>
        <li class="active shh">Sắp hết hàng</li>
        <li class="hh">Hết hàng</li>
        </ul>
        <div class="wrap-content"></div>
        `);
       $(".statistic-chart .menu .sub-menu .year").addClass('active');
       $.ajax({
        url: 'functions/kho/sap_het_hang.php',
        success: function(dt){
            $('.statistic-chart .menu .sub-menu .wrap-content').html(dt);
        }
    })
   });
    // Sắp hết hàng
    $('.statistic-chart ').on('click', '.menu .sub-menu .shh',function(){
        if( !$(this).hasClass('active')  ){
            $('.statistic-chart .menu .sub-menu .wrap-content').html('');
            $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
            $(this).addClass('active');
            $.ajax({
                url: 'functions/kho/sap_het_hang.php',
                success: function(dt){
                    $('.statistic-chart .menu .sub-menu .wrap-content').html(dt);
                }
            })
        }
    })
    // sắp hết hàng
    $('.statistic-chart ').on('click', '.menu .sub-menu .hh',function(){
        if( !$(this).hasClass('active') ){
            $('.statistic-chart .menu .sub-menu .wrap-content').html('');
            $(".statistic-chart .menu .sub-menu ul li").removeClass('active');
            $(this).addClass('active');
            $.ajax({
                url: 'functions/kho/het_hang.php',
                success: function(dt){
                    $('.statistic-chart .menu .sub-menu .wrap-content').html(dt);
                }
            })
        }
    })