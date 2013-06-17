
define(["jquery","info_panel_content"],function($,INFO_PANEL_CONTENT) {

    var INFO_PANEL= {
        //id : '#info',
        show: function() {
            $(this.id).show();
        },

        hide : function() {
            $(this.id).hide();
        },

        /**
         *  关闭信息版事件功能
         */
        disableEvent : function() {
            this.instInfoContent.disableEvent();
        },

        /**
         *  关闭信息版发送数据功能
         */
        disablePostData: function() {
            this.instInfoContent.disablePostData();
        },

        /**
         *  初始化 信息版展现，事件绑定
         */
        init : function(naireid) {
            this.instInfoContent.init(naireid);
        },

    };

    return function(panelId) {
        function f() {};
        f.prototype = INFO_PANEL;
        var inst = new f();
        inst.id = panelId;
        inst.instInfoContent = INFO_PANEL_CONTENT(panelId);
        return inst;
    };
});

