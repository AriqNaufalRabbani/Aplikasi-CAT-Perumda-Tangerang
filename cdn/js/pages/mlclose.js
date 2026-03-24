$(document).ready(function() {
    fetchMLClose(); 
});

function RefreshSelect2(){
    $('.select2').select2();

    $('#TbMlClose').DataTable().$(".Act").each(function(){
        ColorAct(this);
    })
}

$('#BtnRefresh').on('click', function(){
    $('#TbMlClose').DataTable().destroy();
    fetchMLClose(); 
})

$('.filter').on('change', function(){
    $('#TbMlClose').DataTable().destroy();
    fetchMLClose(); 
})

// function fetch(){
//     var StartDate	=	$("#StartDate").val();
//     var EndDate	    =	$("#EndDate").val();
//     var FStatus	    =	$("#FStatus").val();

//     $('#TbMlClose').DataTable({
//         // lengthChange: false,
//         "pageLength": 10,
//         pagingType: "simple_numbers",
//         columnDefs: [
//             { targets: 0,	className: "half-width-mobile darkLayer", width: "200px"},
//             { targets: 1,	className: "text-center", width: "80px"},
//             { targets: 2,	className: "text-left", width: "200px"},
//             { targets: 3,	className: "text-center", width: "80px"},
//             { targets: 4,	className: "text-center", width: "100px"},
//             { targets: 5,	className: "text-center", width: "100px"},
//             { targets: 6,	className: "text-center", width: "100px"},
//             { targets: 7,	className: "text-center", width: "100px"},
//             { targets: 8,	className: "text-center", width: "100px"},
//             { targets: 9,	className: "text-center", width: "100px"},
//             { targets: 10,	className: "text-left", width: "100px"},
//         ],
//         // scrollY:        "300px",
//         scrollX:        true,
//         scrollCollapse: true,
//         // paging:         false,
//         fixedColumns:   {
//             left: 1,
//             bottom: 3,
//         },
//         // fixedHeader: {
//         //     header: true,
//         //     headerOffset: 50,
//         //     // headerOffset: $('.navbar-static-top').height(),
//         //     // footer: true,
//         // },
//         // "ordering": false,
//         "searching": true,
//         // "serverSide": true,
//         "processing": true,
//         "order":[],
//         destroy: true,
//         "ajax":{
//             async: true,
//             url: BASE_URL + "mlclose/fetch",
//             type: "POST",
//             data: { 
//                 StartDate   : StartDate,
//                 EndDate     : EndDate, 
//                 FStatus     : FStatus, 
//             },
//             complete: function(data) {
//                 RefreshSelect2();

//             }
//         }, initComplete: function () {
//             $('#TbMlClose').on('draw.dt', function() {
//                 RefreshSelect2();

//             });
//             $('.dataTables_scrollFoot').css("overflow", "unset");
//         },
//     }); 

//     DragScroll();
// }

function fetchMLClose(){
    var StartDate	=	$("#StartDate").val();
    var EndDate	    =	$("#EndDate").val();
    var FStatus	    =	$("#FStatus").val();

    if($('#TbMlClose').hasClass("dataTable")){
        $('#TbMlClose').DataTable().destroy();
    }

    $.ajax({
        async		: true,
        url 		: BASE_URL + 'mlclose/fetch',
        type		: 'POST',
        dataType	: "json",
        data		: { 
            StartDate   : StartDate, 
            EndDate     : EndDate, 
            FStatus     : FStatus, 
        },
        beforeSend: function(){
            $('#TbMlClose tbody').html("<tr><td colspan='100%' style='text-align:center;'><i class='fa fa-spinner fa-spin fa-pulse' style='font-size:30px; color:#3c6fe9;'></i></td></tr>");	
            // $('#data').DataTable().ajax.reload(); 
        },
        success: function(data) {
            $('#TbMlClose tbody').html('');

            // Loop Row
            data['data'].forEach(SetDataTable);

            InitializeDataTable();
        },
    })

    function SetDataTable(item, index, arr){
        var row  =   '<tr>';
        for (var i = 0; i < arr[index].length; i++) {
            row  += `<td> ${arr[index][i]} </td>`;
        }
        row  += '</tr>';

        $('#TbMlClose tbody').append(row);
    }
}

function InitializeDataTable(){
    if($('#TbMlClose').hasClass("dataTable")){
        $('#TbMlClose').DataTable().destroy();
    }

    setTimeout(function(){
        $('#TbMlClose').DataTable({
            "pageLength": 10,
            pagingType: "simple_numbers",
            columnDefs: [
                { targets: 0,	className: "half-width-mobile darkLayer", width: "200px"},
                { targets: 1,	className: "text-center", width: "80px"},
                { targets: 2,	className: "text-left", width: "200px"},
                { targets: 3,	className: "text-center", width: "80px"},
                { targets: 4,	className: "text-center", width: "100px"},
                { targets: 5,	className: "text-center", width: "100px"},
                { targets: 6,	className: "text-center", width: "100px"},
                { targets: 7,	className: "text-center", width: "100px"},
                { targets: 8,	className: "text-center", width: "100px"},
                { targets: 9,	className: "text-center", width: "100px"},
                { targets: 10,	className: "text-left", width: "100px"},
            ],
            // scrollY:        "300px",
            scrollX:        true,
            scrollCollapse: true,
            // paging:         false,
            fixedColumns:   {
                left: 1,
                bottom: 3,
            },
            "searching": true,
            // "serverSide": true,
            // "processing": true,
            "order":[],
            // destroy: true,
        });

        DragScroll();
    }, 1000);
}

$(document).on('click', '.ActRadio', function(){
    var str         = this;
    var Coid        = $(this).closest('div').attr("data-coid");
    var NoBar       = $(this).closest('div').attr("data-nobar");
    var DoD         = $(this).closest('div').attr("data-dod");
    var KdSales     = $(this).closest('div').attr("data-kdsales");
    var KdLang      = $(this).closest('div').attr("data-kdlang");

    var OKQty       = $(this).closest("tr").find(".OKQty").val();
    var OKQtykg     = $(this).closest("tr").find(".OKQtykg").val();
    var OKQtyMtr    = $(this).closest("tr").find(".OKQtyMtr").val();
    var BPYBQty     = $(this).closest("tr").find(".BPYBQty").val();
    var BPYBQtykg   = $(this).closest("tr").find(".BPYBQtykg").val();
    var BPYBQtyMtr  = $(this).closest("tr").find(".BPYBQtyMtr").val();

    var Act         = $(this).val();
    var td			= $(this).closest('td').get(0);

    $.ajax({
        url 		: BASE_URL + 'MLClose/InputMLClose',
        type		: 'POST',
        dataType	: "json",
        data		: { 
            Coid        : Coid, 
            NoBar       : NoBar, 
            DoD         : DoD, 
            KdSales     : KdSales,
            KdLang      : KdLang, 
            OKQty       : OKQty, 
            OKQtykg     : OKQtykg, 
            OKQtyMtr    : OKQtyMtr, 
            BPYBQty     : BPYBQty, 
            BPYBQtykg   : BPYBQtykg, 
            BPYBQtyMtr  : BPYBQtyMtr, 
            Act         : Act,  
        },
        beforeSend: function(){
            // $("#custom-loader1").show();
        },
        success: function(data) {
            console.log(data)
            // $('#TbMlClose').DataTable().destroy();
            // fetch(); 
                if(data.result == 'error'){
                    var color = '#C0392B';
                }else{
                    var color = '#2ECC71';
                }
                doBlink(td, 1, color);

            // Toast.fire({
            // 	icon: data.result,
            // 	title: data.msg,
            // });
        },
        complete: function(){
            // $("#custom-loader1").hide();
        }
    })
})

function pushNoty(text, color) {
    new Noty({
        type: color,
        layout: 'bottomRight',
        theme: 'relax',
        timeout: 1000,
        // sources: 'cdn/sounds/windows_10_notify.mp3',
        closeWith: ['click', 'button'],
        callbacks: {
            onShow: function() {
                // updateNotifOnShow(IdNotif);
            },
            onClick: function() {
                // window.location.href = 'notifikasi';
            }
        },
        text: '<i class="fa fa-bell"></i> ' + text
    }).show();
};

function ColorAct(str){
    var Act = $(str).val();
    // console.log(Act)

    if(Act == 'PENUHI'){
        $(str).parent().find(".select2-selection").css({"background-color":"#00a65a !important"});
        $(str).parent().find(".select2-selection__rendered").css({"color":"white"});
    }else if(Act == 'TIDAK'){
        $(str).parent().find(".select2-selection").css({"background-color":"#dd4b39 !important"});
        $(str).parent().find(".select2-selection__rendered").css({"color":"white"});
    }else{
        if(!$(str).is(':disabled') && !$(str).is('[readonly]')){
            $(str).parent().find(".select2-selection").css({"background-color":"#fff !important"});
            $(str).parent().find(".select2-selection__rendered").css({"color":"black"});
        }else{
            $(str).parent().find(".select2-selection").css({"background-color":"#eee !important"});
            $(str).parent().find(".select2-selection__rendered").css({"color":"#444"});
        }
    }
}

function doBlink(id, count, color) {
    $(id).animate({ backgroundColor: color }, {
        duration: 100, 
        complete: function() {

            // reset
            $(id).delay(100).animate({ backgroundColor: "#eee" }, {
                duration: 1000,
                complete: function() {

                    // maybe call next round
                    if(count > 1) {
                        doBlink(id, --count);
                    }
                }
            });

        }
    });
}


function format(number, decimals = 0, decimalSeparator = ',', thousandsSeparator = '.') {
    const roundedNumber = number.toFixed(decimals);
    let integerPart = '',
        fractionalPart = '';
    if (decimals == 0) {
        integerPart = roundedNumber;
        decimalSeparator = '';
    } else {
        let numberParts = roundedNumber.split('.');
        integerPart = numberParts[0];
        fractionalPart = numberParts[1];
    }
    integerPart = integerPart.replace(/(\d)(?=(\d{3})+(?!\d))/g, `$1${thousandsSeparator}`);
    return `${integerPart}${decimalSeparator}${fractionalPart}`;
}
