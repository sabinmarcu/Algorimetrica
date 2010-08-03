(function() {
    var __selectedText;
    jQuery.fn.editableText = function(args) {
        if (args == undefined) args = {};
        if (args["trigger"] == undefined) { args["trigger"] = this; }
        if (args["label"] == undefined) { args["label"] = "done"; }
        var target = this;
        $(args["trigger"]).click(function() {
            if (__selectedText != target) {
                $("#__ta").remove();
                $("#__ta-but").remove();
            }
            else if(__selectedText == target) { return; } 
            __selectedText = target;

            var baseText = __selectedText.html();
            var effect = args["effect"] ? args["effect"] : [];
            if (args["before"] != undefined) { baseText = args["before"](baseText); }

            baseText = baseText.replace(/<br>/gi, "\r");

            var pure = __selectedText.get()[0];
            var node = args["parent"] ? pure.parentNode : pure;

            $(node).after(
                "<textarea id='__ta' class='editable-text'></textarea>" + 
                "<button id='__ta-but' class='editable-text-but'>" + args["label"] + "</button>");

            $("#__ta").css({
                top: node.offsetTop,
                left: node.offsetLeft,
                width: node.offsetWidth,
                height: node.offsetHeight,
                display: "none",
                position: "absolute"
            }).text(baseText).show(effect[0], effect[1], effect[2]);

            $("#__ta-but").click(function() {
                var text = $("#__ta").get()[0].value;

                if (args["after"] != undefined) { text = args["after"](text); }

                if ($.browser.opera) { text = text.replace(/\r?\n/g, "<br>"); }
                else { text = text.replace(/\r?\n/g, "<br>\r"); }
                __selectedText.height($("#__ta").get()[0].scrollHeight);
                __selectedText.html(text);

                __selectedText = undefined;
                $("#__ta").remove();
                $("#__ta-but").remove();
            });
        });
    };
})(jQuery);