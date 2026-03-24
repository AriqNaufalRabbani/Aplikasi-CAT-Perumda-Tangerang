
$(document).ready(function(){
    checkJnsOrder();

});

function checkJnsOrder() {
    var JnsOrder = $('#jns_order').val();

    if (JnsOrder === '2') {
        $('#second').prop('disabled', false);

        // $('#nama_1').hide();
        // $('#nama_1').prop('disabled', true);
        // $('#nama').next(".select2-container").show();
        // $('#nama').prop('disabled', false);
    } else {
        $('#second').prop('disabled', true);

        // $('#nama').next(".select2-container").hide();
        // $('#nama').prop('disabled', true);
        // $('#nama_1').show();
        // $('#nama_1').prop('disabled', false);
    }
}

$('#Reff').select2({
    placeholder: 'Reff',
    minimumInputLength: 1,
    allowClear: true,
    ajax: {
        dataType: 'json',
        url: BASE_URL + 'spk/getReff',
        delay: 1000,
        data: function (params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        }
    }
});

$('#nmlang').select2({
    minimumInputLength: 1,
    allowClear: false,
    ajax: {
        dataType: 'json',
        url: BASE_URL + 'spk/getCustomerByName',
        delay: 1000,
        data: function (params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        }
    }
});

$('#second').select2({
    minimumInputLength: 1,
    allowClear: false,
    ajax: {
        dataType: 'json',
        url: BASE_URL + 'spk/getJiByLike',
        delay: 1000,
        data: function (params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        }
    }
});

$('#nama').select2({
    minimumInputLength: 1,
    allowClear: false,
    tags: true,
    ajax: {
        dataType: 'json',
        url: BASE_URL + 'spk/getBarangByNmBar',
        delay: 1000,
        data: function (params) {
            return {
                search: params.term
            }
        },
        processResults: function (data, page) {
            return {
                results: data
            };
        }
    }
});

$('#nama').on("select2:selecting", function(e) { 
    var data = e.params.args.data;

    if (data.NoBar) {
        $('#NoBar').val(data.NoBar);
        $('#komposisi').val(data.Komposisi);
        $('#size').val(data.Pitch);
        $('#lebar').val(data.Width);
        $('#color').val(data.JmlWarna);
        $('#jenis').val(data.Satuan).trigger('change');
    } else {
        $('#NoBar').val('');
        $('#komposisi').val('');
        $('#size').val('');
        $('#lebar').val('');
        $('#color').val('');
        $('#jenis').val('').trigger('change');
    }
});

$('#jns_order').change(function() {
    $('#nama').val("").trigger('change');
    $('#nama_1').val('');

    checkJnsOrder();

    if ($(this).val() === '2') {
        $('input[name="No_Ji"]').val('');
        $('#NoBar').val('');
        $('#Reff').attr('disabled', false);
        $('#Reff').attr('required', true);
    } else {
        $('#second').val("").trigger('change');
        $('#Reff').val("").trigger('change');
        $('#NoBar').val('NEW');
        $('#Reff').attr('disabled', true);
        $('#Reff').attr('required', false);
    }
});

$('#second').change(function() {
    var v = $(this).val();
    $('input[name="No_Ji"]').val(v);
});

$('#nama_1').autocomplete({
    source: function(request, response) {
        $.getJSON(BASE_URL + 'spk/getBarangByNmBar', { 
            term        	: request.term,
        }, response);
    },
    minLength:1,
    select: function( event, ui ) {
        var data = ui.item;
        console.log(data)

        if (data.NoBar) {
            $('#NoBar').val(data.NoBar);
            $('#komposisi').val(data.Komposisi);
            $('#size').val(data.Pitch);
            $('#lebar').val(data.Width);
            $('#color').val(data.JmlWarna);
            $('#jenis').val(data.Satuan).trigger('change');

            // if(data.KdLang){
            //     var $newOption = $("<option selected='selected'></option>").val(data.KdLang).text(data.NmLang)
            //     $("#nmlang").append($newOption).trigger('change');
            // }

            if(!$('#second').is(':disabled')){
                if(data.NoJI){
                    var $newOption = $("<option selected='selected'></option>").val(data.NoJI).text(data.NoJI)
                    $("#second").append($newOption).trigger('change');
                }
            }
        } else {
            // $('#NoBar').val('');
            $('#komposisi').val('');
            $('#size').val('');
            $('#lebar').val('');
            $('#color').val('');
            $('#jenis').val('').trigger('change');
        }
    }
});




  