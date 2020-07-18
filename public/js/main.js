var d = new Date();
    $(function() {
        $.switcher();
    });
/*    if (localStorage.getItem('mood') != null) {
        if (localStorage.getItem('mood') == "day") {
            $('.form-check-input').attr('checked','true');
        }
    } else {
        localStorage.setItem('mood', 'day');
    }
    $('.form-check-input').on('change',function(){
        if($('body').hasClass('dark')){
            localStorage.setItem('mood','night');
        }else{
            localStorage.setItem('mood','day');
        }
         $('body').toggleClass('dark');
    });*/

function n(n){
    return n > 9 ? "" + n: "0" + n;
}
var ms,s;
$('#start').on('click',function(){

   if($(this).find('.fal').data('type')=="play")
    {

        $('#ms').text("00");
        ms=setInterval(function(){
            if(parseInt($('#sec').text())<60 ){
                $('#sec').text( n(parseInt($('#sec').text())+1 ));
            }else{
                $('#sec').text("00");
                if(parseInt($('#min').text())<59 ){
                    $('#min').text( n(parseInt($('#min').text())+1 ));
                }else{
                    $('#min').text("00");
                    if(parseInt($('#hour').text())<59 ){
                        $('#hour').text( n(parseInt($('#hour').text())+1 ));
                    }
                }
            }



            if(parseInt($('#sec').text())==0 && parseInt($('#min').text())==0 && parseInt($('#hour').text())==0){
                $('#notification_sound').trigger("play");
            }

        },1000);


        s=setInterval(function(){
            if(parseInt($('#ms').text())<90 ){
                $('#ms').text( n(parseInt($('#ms').text())+9 ));
            }else{
                $('#ms').text("00");
            }
        },10);

        $(this).find('.fal').removeClass('fa-play');
        $(this).find('.fal').addClass('fa-pause');
        $(this).find('.fal').data('type','pause');

    }else{
        clearInterval(s);
        clearInterval(ms);

        $(this).find('.fal').data('type','play');
        $(this).find('.fal').removeClass('fa-pause');
        $(this).find('.fal').addClass('fa-play');
    }



});
$('#reset').on('click',function(){
    $('#ms').text("00");
    $('#sec').text("00");
    $('#min').text("00");
    $('#hour').text("00");
    $('#start').removeClass('started');

    clearInterval(s);
    clearInterval(ms);

    $('#append').empty();

    $('#start').find('.fal').removeClass('fa-pause');
    $('#start').find('.fal').data('type','play');
    $('#start').find('.fal').addClass('fa-play');
});
$('#split').on('click',function(){
    $('#append').append(
        '<div class="col-12 row px-0 mb-3 appendable">\
             <div class="col px-0 pt-1"> \
                <span class="d-inline-block font-1 font-md-1 font-lg-3 list-num" style="background: #9ac143;border-radius: 6px;color: #fff;padding:1px 10px ">'+ parseInt(1+$('.appendable').length++) +'</span>\
             </div>\
             <div class="col-5 px-0 text-center main-font font-2 font-md-2 font-xl-3 harma list-res" style="direction: ltr;padding-top:6px" >\
                 '+$('#hour').text()+' : '+$('#min').text()+' : '+$('#sec').text()+' : '+$('#ms').text()+' \
             </div>\
             <div class="col-4 px-0">\
                 <div class="text-center main-font font-small font-md-1 list-time" style="direction: ltr;" >\
                     '+d.getHours()+':'+d.getMinutes()+'\
                 </div>\
                 <div style="direction: ltr;" class="main-font font-small font-lg-1 list-date">\
                     '+d.getDay()+'/'+d.getMonth()+'/'+d.getFullYear()+'\
                 </div>\
             </div>\
         </div>');
});

function convertToCSV(objArray) {
    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
    var str = '';

    for (var i = 0; i < array.length; i++) {
        var line = '';
        for (var index in array[i]) {
            if (line != '') line += ','

            line += array[i][index];
        }

        str += line + '\r\n';
    }

    return str;
}

function exportCSVFile(headers, items, fileTitle) {
    if (headers) {
        items.unshift(headers);
    }
    var jsonObject = JSON.stringify(items);

    var csv = this.convertToCSV(jsonObject);

    var exportedFilenmae = fileTitle + '.csv' || 'export.csv';

    var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    if (navigator.msSaveBlob) { // IE 10+
        navigator.msSaveBlob(blob, exportedFilenmae);
    } else {
        var link = document.createElement("a");
        if (link.download !== undefined) { // feature detection
            // Browsers that support HTML5 download attribute
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", exportedFilenmae);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
}
function trim_c(argument) {
    var x = argument;
    return $.trim(argument.replace(/(\r\n|\n|\r| )/gm, ''));
}
$('#toCsv').on('click',function(){
    var headers = {
        model: 'id'.replace(/,/g, ''), // remove commas to avoid errors
        chargers: "result",
        cases: "time",
        earphones: "date"
    };
    var itemsNotFormatted = [];
    $( ".appendable" ).each(function() {
        var x ={
            id: trim_c($(this).find('.list-num').text()),
            result:trim_c($(this).find('.list-res').text()),
            time:trim_c($(this).find('.list-time').text()),
            date:trim_c($(this).find('.list-date').text())
        }
        itemsNotFormatted.push(x);
    });
    console.log(itemsNotFormatted);
    var itemsFormatted = [];

    itemsNotFormatted.forEach((item) => {
        itemsFormatted.push({
            id: item.id,
            result: item.result,
            time: item.time,
            date: item.date
        });
    });
    var fileTitle = 'time'; // or 'my-unique-title'
    exportCSVFile(headers, itemsFormatted, fileTitle); // call the exportCSVFile() function
});

/*
if (localStorage.getItem('mood') != null) {
        if (localStorage.getItem('mood') == "day") {
            $('.form-check-input').attr('checked','true');
        }
    } else {
        localStorage.setItem('mood', 'day');
    }*/
    function n(n){
        return n > 9 ? "" + n: "0" + n;
    }
    var s ;
    $('#concern').on('click',function(){

        if($(this).find('.fal').data('type')=="play"){
            s=setInterval(function(){
                if(parseInt($('#timer-sec').text())>0)
                    $('#timer-sec').text( n(parseInt($('#timer-sec').text())-1 ));
                else{
                    console.log("else")
                    if(parseInt($('#timer-min').text())>0 ){
                        $('#timer-sec').text("59");
                        $('#timer-min').text( n(parseInt($('#timer-min').text())-1 ));
                    }else{
                        if(parseInt($('#timer-hour').text())>0 ){
                            console.log("here");
                            $('#timer-min').text("59");
                            $('#timer-sec').text("59");
                            $('#timer-hour').text( n(parseInt($('#timer-hour').text())-1 ));
                        }
                    }
                }
            if(parseInt($('#timer-sec').text())==0 && parseInt($('#timer-min').text())==0 && parseInt($('#timer-hour').text())==0){
                $('#notification_sound').trigger("play");
                clearInterval(s);
            }

            },1000);





            $(this).find('.fal').removeClass('fa-play');
            $(this).find('.fal').addClass('fa-pause');
            $(this).find('.fal').data('type','pause');
        }else{
            clearInterval(s);
            $(this).find('.fal').data('type','play');
            $(this).find('.fal').removeClass('fa-pause');
            $(this).find('.fal').addClass('fa-play');
        }

    });
    $('#choose').on('click',function(){
        clearInterval(s);
        $('#concern').find('.fal').removeClass('fa-pause');
        $('#concern').find('.fal').data('type','play');
        $('#concern').find('.fal').addClass('fa-play');

        $('#timer-hour').text(n(parseInt($('.hour-timer.active').text())));
        $('#timer-min').text(n(parseInt($('.min-timer.active').text())));
        $('#timer-sec').text(n(parseInt($('.sec-timer.active').text())));
    });
    $('#reset').on('click',function(){
        clearInterval(s);
        $('#concern').find('.fal').removeClass('fa-pause');
        $('#concern').find('.fal').data('type','play');
        $('#concern').find('.fal').addClass('fa-play');
        $('#timer-hour').text("00");
        $('#timer-min').text("00");
        $('#timer-sec').text("00");
    });
    var d = new Date();

    $('.hour-timer').on('click',function(){
        $('.hour-timer').removeClass('active');
        $(this).addClass('active');
    });
    $('.sec-timer').on('click',function(){
        $('.sec-timer').removeClass('active');
        $(this).addClass('active');
    });
    $('.min-timer').on('click',function(){
        $('.min-timer').removeClass('active');
        $(this).addClass('active');
    });
    const slider = document.getElementById("hour-scroll");
    let isDown = false;
    let startX;
    let scrollLeft;
    slider.addEventListener("mousedown", e => {
      isDown = true;
      slider.classList.add("active");
      startX = e.pageX - slider.offsetLeft;
      scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener("mouseleave", () => {
      isDown = false;
      slider.classList.remove("active");
    });
    slider.addEventListener("mouseup", () => {
      isDown = false;
      slider.classList.remove("active");
    });
    slider.addEventListener("mousemove", e => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - slider.offsetLeft;
      const walk = x - startX;
      slider.scrollLeft = scrollLeft - walk;
    });
    const slider8 = document.getElementById("min-scroll");
    let is_down8 = false;
    let start_x_8;
    let scroll_left_8;
    slider8.addEventListener("mousedown", e => {
      is_down8 = true;
      slider8.classList.add("active");
      start_x_8 = e.pageX - slider8.offsetLeft;
      scroll_left_8 = slider8.scrollLeft;
    });
    slider8.addEventListener("mouseleave", () => {
      is_down8 = false;
      slider8.classList.remove("active");
    });
    slider8.addEventListener("mouseup", () => {
      is_down8 = false;
      slider8.classList.remove("active");
    });
    slider8.addEventListener("mousemove", e => {
      if (!is_down8) return;
      e.preventDefault();
      const x = e.pageX - slider8.offsetLeft;
      const walk = x - start_x_8;
      slider8.scrollLeft = scroll_left_8 - walk;
    });
    const slider2 = document.getElementById("sec-scroll");
    let isDown2 = false;
    let startX2;
    let scrollLeft2;
    slider2.addEventListener("mousedown", e => {
      isDown2 = true;
      slider2.classList.add("active");
      startX2 = e.pageX - slider2.offsetLeft;
      scrollLeft2 = slider2.scrollLeft;
    });
    slider2.addEventListener("mouseleave", () => {
      isDown2 = false;
      slider2.classList.remove("active");
    });
    slider2.addEventListener("mouseup", () => {
      isDown2 = false;
      slider2.classList.remove("active");
    });
    slider2.addEventListener("mousemove", e => {
      if (!isDown2) return;
      e.preventDefault();
      const x = e.pageX - slider2.offsetLeft;
      const walk = x - startX2;
      slider2.scrollLeft = scrollLeft2 - walk;
    });

