(function ($) {
    var topics = {};
    $.publish = function (topic, args) {
        if (topics[topic]) {
            var currentTopic = topics[topic],
                    args = args || {};

            for (var i = 0, j = currentTopic.length; i < j; i++) {
                currentTopic[i].call($, args);
            }
        }
    };
    $.subscribe = function (topic, callback) {
        if (!topics[topic]) {
            topics[topic] = [];
        }
        topics[topic].push(callback);
        return {
            "topic": topic,
            "callback": callback
        };
    };
})(jQuery);
(function ($) {
    $(document).ready(function () {
        /*setTimeout(function(){
        var $sigdiv = $("#signature").jSignature({'UndoButton': true})
                , $tools = $('#tools')
                , $extraarea = $('#displayarea')
                , pubsubprefix = 'jSignature.demo.'
        $('#signature').bind('change', function (e) {
            if (e.target.value !== '') {
                var data = $sigdiv.jSignature('getData', e.target.value)
                $('#signature_image_path').val(data)
            }
        }).appendTo($tools)
        
        $.subscribe(pubsubprefix + 'formatchanged', function () {
            $extraarea.html('')
        })
        }, 2000);*/
//        if (Modernizr.touch) {
//            $('#scrollgrabber').height($('#content').height())
//        }
    })
})(jQuery)