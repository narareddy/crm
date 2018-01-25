define(function(require) {
    'use strict';

    var AccountMulticustomerView;
    var _ = require('underscore');
    var $ = require('jquery');
    var BaseView = require('oroui/js/app/views/base/view');

    AccountMulticustomerView = BaseView.extend({

        activeTab: null,

        customerType: 'sales_b2bcustomer',

        useChannel: true,

        events: {
            'shown.bs.tab .tab-content': 'onTabShown',
            'shown.bs.tab >.oro-tabs>ul': 'onCustomerShown'
        },

        listen: {
            'customer-info-widget:init mediator': function(widget, options) {
                if (this.$(options.container || options.el).length !== 0) {
                    widget.setActiveTab(this.activeTab);
                }
            }
        },

        initialize: function(options) {
            _.extend(this, _.pick(options, ['customerType', 'useChannel']));
            AccountMulticustomerView.__super__.initialize.call(this, options);
        },

        onTabShown: function(e) {
            var contentId = this.$(e.target).data('target');
            var targetRegExp = this.makeTargetRegExp('(.*)');
            this.activeTab = _.result(contentId.match(targetRegExp), 1, null);
        },

        onCustomerShown: function(e) {
            if (this.activeTab) {
                var targetRegExp = this.makeTargetRegExp(this.activeTab);
                var $link = this.$('a[data-target]:visible').filter(function() {
                    return targetRegExp.test($(this).data('target'));
                });
                if ($link.length === 1 && !$link.parent().hasClass('active')) {
                    $link.click();
                }
            }
        },

        makeTargetRegExp: function(activeTabPlaceholder) {
            var pattern = '#oro_' + this.customerType + '_' + activeTabPlaceholder + '_customer_\\d+';
            if (this.useChannel) {
                pattern += '_channel_\\d+';
            }
            return new RegExp(pattern);
        }
    });

    return AccountMulticustomerView;
});
