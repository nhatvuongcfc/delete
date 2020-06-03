$(".test").click(function() {

    Swal.fire({
        text: 'Vui lòng nhập thông tin',
        icon: 'error',
        timer: 1500,
        showConfirmButton: false
    });
});

$(".search_tran").keydown(function(e) {
    var search = $(this).val();

    switch (e.which) {
        case 40:
            e.preventDefault(); // prevent moving the cursor
            $('li:not(:last-child).selected').removeClass('selected')
                .next().addClass('selected');
            var search_suggest = $('li.selected').text();
            $(this).val(search_suggest);
            break;
        case 38:
            e.preventDefault(); // prevent moving the cursor
            $('li:not(:first-child).selected').removeClass('selected')
                .prev().addClass('selected');
            var search_suggest = $('li.selected').text();
            $(this).val(search_suggest);
            break;
        case 13:
            if (search !== '') {
                e.preventDefault();
                if (/[a-z]/.test(search)) {
                    search_table(search);
                } else {
                    Swal.fire({
                        text: 'Thông tin không hợp lệ',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $(".search_tran").val(" ");
                    $(".ul_list-search").hide();

                }
            } else {
                e.preventDefault(); // prevent moving the cursor
                Swal.fire({
                    text: 'Vui lòng nhập thông tin',
                    icon: 'question',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
            break;

    }
});
$(".search_tran").keyup(function(e) {
    var search = $(this).val();
    if (e.which == 38 || e.which == 40) {
        return false;
    }
    if (search === '') {
        $(".ul_list-search").hide();
    } else {
        $(".ul_list-search").show();
        search_list(search);
    }
});

function search_list(search) {
    $.ajax({
        type: 'get',
        url: '/transcript/search?value=' + search,
        data: {
            'search': search
        },
        success: function(result) {
            // var transcript=JSON.parse(result);
            var content = '';

            if (result.status == '404') {
                content += '<li>Không có kết quả</li>';
                $(".ul_list-search").html(content);

            } else {
                var transcripts = result.data;
                // transcript=result.data;
                for (var transcript of transcripts) {
                    // console.log(transcript.id_transcript);
                    content += '<li class="item_search" id=' + transcript.id_transcript + ' onclick="get_item_search(' + transcript.id_transcript + ')" value=' + transcript.ten_mon_hoc + '>' + transcript.ten_mon_hoc + '</li>';

                }
                $(".ul_list-search").html(content);
                $(".item_search:first-child").addClass('selected');
            }
        }
    });
}

function search_table(search) {
    // alert('ok');
    $.ajax({
        type: 'get',
        url: '/transcript/search?value=' + search,
        data: {
            'search': search
        },
        success: function(result) {
            console.log(result);
            var content = '';

            if (result.status == '404') {
                // content+='<li>Không có kết quả</li>';
                // $(".ul_list-search").html(content);

            } else {
                var transcripts = result.data;
                // transcript=result.data;
                var key = 1;
                for (var transcript of transcripts) {
                    content += '<tr>' +
                        '<td><span class="custom-checkbox">' +
                        '<input type="checkbox" id="checkbox1" name="options[]" value="1">' +
                        '<label for="checkbox1"></label>' +
                        '</span></td>' +
                        '<td >' + key + '</td>' +
                        '<td >' + transcript.id_transcript + '</td>' +
                        '<td >' + transcript.ten_mon_hoc + '</td>' +
                        '<td >' + transcript.name_class + '</td>'; +
                    '</tr>';
                    key++;
                }
                $(".table_transcript").html(content);
                $(".ul_list-search").hide();
            }

        }
    });
}

function get_item_search($id) {
    $.ajax({
        type: 'get',
        url: '/transcript/' + $id,

        success: function(result) {
            if (result.status === '200') {
                var trans = result.data;
                var content = "";
                content +=
                    '<td>1</td>' +
                    '<td>' + trans.id_transcript + '</td>' +
                    '<td>' + trans.ten_mon_hoc + '</td>' +
                    '<td>' + trans.name_class + '</td>';
                // +'</tr>'; 

                $(".table_transcript").html(content);
                $(".ul_list-search").hide();
                $(".search_tran").val(" ");
            }
        }
    });

}
$('[data-toggle="tooltip"]').tooltip();

// Select/Deselect checkboxes
var checkbox = $('table tbody input[type="checkbox"]');
$("#selectAll").click(function() {
    if (this.checked) {
        checkbox.each(function() {
            this.checked = true;
        });
    } else {
        checkbox.each(function() {
            this.checked = false;
        });
    }
});
checkbox.click(function() {
    if (!this.checked) {
        $("#selectAll").prop("checked", false);
    }
});

function delete_one(id) {
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Bạn không thể khôi phục dữ liệu này ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'delete',
                url: '/transcript/' + id,
                dataType: "JSON",
                data: {
                    "id": id // method and token not needed in data
                },
                success: function(result) {
                    Swal.fire({
                        text: 'Xóa thành công',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 500);
                }
            });
        }
    });
}

function add_modal() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: ' transcript',
        data: {

            ten_mon_hoc: $("#ten_mon_hoc").val(),
            id_class: $("#id_class").val(),
        },
        success: function(result) {
            $("#add_modal").modal('hide');
            Swal.fire({
                text: 'Them thành công',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() { // wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 2000);
        },
        error: function(response) {
            var errors = response.responseJSON.errors;

            var errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>';
            });
            errorsHtml += '</ul></div';

            $('.messenger_add').html(errorsHtml);
        }


    });
}

function show_modal_update(id) {
    $.ajax({
        type: 'get',
        url: 'transcript/' + id + '/edit',
        dataType: "JSON",
        data: {
            "id": id // method and token not needed in data
        },
        success: function(result) {
            var transcript = result.transcripts;
            var clases = result.clases;
            $("#update_modal").modal('show');
            $("#update_ten_mon_hoc").val(transcript.ten_mon_hoc);
            $("#id_trans").val(transcript.id_transcript);
            var content = "";
            var id_class;
            var name_class;
            for (var value of clases) {
                if (id_class == transcript.id_class) {
                    content += '<option class="update_id_class" selected value="' + value.id_class + '">' + value.name_class + '</option>';
                } else {
                    content += '<option class="update_id_class" value="' + value.id_class + '">' + value.name_class + '</option>';
                }
            }
            $(".custom-select").html(content);
        }
    });
}

function update_transcripts() {
    var id_transcript = $("#id_trans").val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'put',
        dataType: 'json',
        url: ' transcript/' + id_transcript,
        data: {
            id: id_transcript,
            ten_mon_hoc: $("#update_ten_mon_hoc").val(),
            id_class: $(".update_id_class").val(),
        },
        success: function(result) {
            $("#update_modal").modal('hide');
            Swal.fire({
                text: 'Them thành công',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });

            setTimeout(function() { // wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
            }, 2000);
        },
        error: function(response) {
            var errors = response.responseJSON.errors;

            var errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>';
            });
            errorsHtml += '</ul></div';

            $('.messenger_update').html(errorsHtml);
        }
    });
}

function delete_mul() {
    var selectAll=$('#selectAll').is(':checked');
    if(selectAll==true)
    {
        delete_all();
    }else
    {
        delete_some();
    }
}
function delete_all(){
    Swal.fire({
        title: 'Bạn có chắc chắn xóa tất cả?',
        text: "Bạn không thể khôi phục dữ liệu này ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'get',
                url: '/transcript/destroy_all' ,
                dataType: "JSON",
                success: function(result) {
                    Swal.fire({
                        text: 'Xóa thành công',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function() { // wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 500);
                    checkbox.each(function() {
                        this.checked = false;
                    });
                    // $(".checkbox_some").checked=false; // Unchecks it
                }
            });
        }
    });

}
function delete_some(){
    var arr_delete=[];
    var checkbox=$(".checkbox_some") ;
    var checked=checkbox.filter(':checked');
    checked.map(function(){
        arr_delete.push(this.id);
    });
    // arr_delete=json_encode(arr_delete);
    // console.log(arr_delete);
    Swal.fire({
        title: 'Bạn có chắc chắn?',
        text: "Bạn không thể khôi phục dữ liệu này ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!',
        cancelButtonText: 'Hủy!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '/transcript/destroy_some' ,
                dataType: "JSON",
                data: {
                    "array":arr_delete
                },
                success: function(result) {
                    Swal.fire({
                        text: 'Xóa thành công',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload(); 
                    }, 500);
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
        }
    });
}
$(function() {
    $(".search_tran").blur();
    // var checkbox=$(".checkbox_some") ;
    $("input[type='checkbox']").each(function() {
        this.checked = false;
    });
});
function click_import_file(){
    $("#import_modal").modal('show');
};
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
    function import_file(){
        // var file_data = .prop('files')[0];  
        // var form_data = new FormData();                  
        // form_data.append('file', file_data);
        // var file=new FormData($("#form_import")[0]);
                // console.log(form_data); 

        // console.log(form_data);
        var file_data=new FormData();
        file_data.append('file', $('#customFile')[0].files[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/transcript/import' ,
            dataType: "JSON",
            processData: false,
            contentType: false,
            cache:false,
            data:{
                form_data:file_data,
            },
            success: function(result) {
                // Swal.fire({
                //     text: 'Xóa thành công',
                //     icon: 'success',
                //     timer: 2000,
                //     showConfirmButton: false
                // });
                // setTimeout(function() { // wait for 5 secs(2)
                //     location.reload(); // then reload the page.(3)
                // }, 500);
                // checkbox.each(function() {
                //     this.checked = false;
                // });
                // $(".checkbox_some").checked=false; // Unchecks it
            }
        });
    };
    

   