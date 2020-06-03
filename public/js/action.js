    var div = document.getElementById('addCH');
    document.getElementById('TL').onclick = function(e){
        if (this.checked){
            div.innerHTML = "<div class='col-sm-12'>"+
                            "<strong class='col-sm-12'>Đáp án: </strong>"+
                            "<textarea name='dapanTL' rows='5' cols='25'></textarea>"+
                            "</div>"
        }
    };
    document.getElementById('TN').onclick = function(e){
        if (this.checked){
            div.innerHTML = "<strong class='col-sm-4 mt-1'>Đáp án 1: </strong>"+
                            "<input type='text' name='a' style='height: 25px; margin-top: 5px' id='a'/><br>"+
                            "<strong class='col-sm-4 mt-1'>Đáp án 2:</strong>"+
                            "<input type='text' name='b' style='height: 25px; margin-top: 5px' id='b'><br>"+
                            "<strong class='col-sm-4 mt-1'>Đáp án 3  :</strong>"+
                            "<input type='text' name='c' style='height: 25px;  margin-top: 5px' id='c'><br>"+
                            "<strong class='col-sm-4 mt-1'>Đáp án 4: </strong>"+
                            "<input type='text' name='d' style='height: 25px; margin-top: 5px' id='d'><br>"
        }
    };