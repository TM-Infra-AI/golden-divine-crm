$(document).ready(function(){
    $('.datatable').DataTable();
    //reload page every 5 minutes

    var position = getHtmlPosition();
    deleteHtmlPosition();
    if(position){
        var container = $('.main-panel');
        position = parseInt(position);
        position = 70 - position;
        container.scrollTop(position);
        container.perfectScrollbar('update');
    }
 
    //onclick table in dashboard
    $('.table-dashboard tbody tr').on('click',function(){
        var url = $(this).data('url');
        if($(this).hasClass('row-highlighted')){
            if(url !='' && url != undefined) {
                location.href = url;
            }
        }
        else {
            $('.table-dashboard tbody tr').removeClass('row-highlighted');
            $(this).addClass('row-highlighted');
        }
    });
    makeSameHeight('.widget-metric_sameheight');
    $('.table-dashboard').fixedHeader();

    
    jQuery('.card-stats .iw-next').on('click', function(){
        showSbContent('next', $(this));
    });

    jQuery('.card-stats .iw-previous').on('click', function(){
        showSbContent('previous',$(this));
    });
});
function makeSameHeight(class_name){
    var height = 0;
    jQuery(class_name).each(function(index, element){
        var element_height = jQuery(this).height();
        if(height < element_height){
            height = element_height;
        }
    });
    height = height + 20;
    jQuery(class_name).css({height: height + 'px'});
}

function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}

function showSbContent(type, obj){
    var tabObject = {
        yesterday: 'Yesterday',
        today: 'Today',
        wtd: 'WTD',
        mtd: 'MTD',
        qtd: 'QTD',
        ytd: 'YTD'
    };
    var tabs = Object.keys(tabObject);
    var tabTitle = Object.values(tabObject);
    var enviroment = $('#enviroment').val();
    var parent_element = obj.closest('.widget-filter-list');
    var current = parent_element.find('.iw-current-tab').val();
    current = parseInt(current);

    var new_tabs = parent_element.find('.iw-current-tab').data('tabs');
    if (new_tabs){
        tabs = new_tabs.split(',');
        tabTitle = [];
        tabs.forEach(function(val, key){
            tabTitle.push(tabObject[val])
        });
    }

    var tab_length = Object.keys(tabs).length;
    tab_length = tab_length - 1;
    if(type == 'previous'){
        var change = current - 1;
        if(change < 0){
            change = tab_length;
        }
    } else {
        var change = current + 1;
        if(change > tab_length){
            change = 0;
        }
    }
    parent_element.find('.iw-current-tab').val(change);
    parent_element.find('.period-name').html(tabTitle[change]);
    parent_element.find('.iw-tab').css({display: 'none'});
    parent_element.find('.iw-' + tabs[change]).css({display: 'block'});
}

function saveHtmlPosition(value) {
    var date = new Date();
    date.setTime(date.getTime() + (24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
    document.cookie = "html_position=" + value + expires + "; path=/";
}

function getHtmlPosition() {
    var nameEQ = "html_position=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function deleteHtmlPosition() {
    var date = new Date();
    date.setTime(date.getTime() + (-1 * 24 * 60 * 60 * 1000));
    var expires = "; expires=" + date.toGMTString();
    document.cookie = "html_position=" + expires + "; path=/";
}
