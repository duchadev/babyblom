function date_time(id)
{
        date = new Date;
        year = date.getFullYear();
        month = date.getMonth();
        months = new Array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
        d = date.getDate();
        day = date.getDay();
        days = new Array('Chủ nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        result =  ''+h+':'+m+':'+s+ ' - '+days[day]+' Ngày '+d+' Tháng '+months[month]+' Năm '+year;
        document.getElementById(id).innerHTML = result;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}

