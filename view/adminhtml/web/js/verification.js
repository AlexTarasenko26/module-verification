define(['uiComponent', 'ko', 'mage/storage', 'mage/url'], function (Component, ko, storage, urlBuilder) {
    'use strict';
    //needs to return a js object extended from uiElement that
    //defines a template.  Magento and Knockout.js will use
    //the returned object as a view model constructor
    return Component.extend({
        defaults: {
            template: 'Epam_Verification/verification_checkbox'
        },
        message: ko.observable("Verification"),
        /**
         * Verify order
         * @var int isChecked
         */
        onChangeCheckbox: function (isChecked) {
            this.setOrderVerification(isChecked.order, isChecked.value, isChecked.url);
            // Handle the onChange event of the checkbox
            console.log('Checkbox changed, order id=' + isChecked.order + ' status=' + isChecked.value);
        },

        setOrderVerification: function (id, status, url) {
            var requestUrl = urlBuilder.build(url + "rest/V1/orders/setVerification");
            var data =
                {
                    "orderData":
                        {
                            "entity_id": id,
                            "require_verification": status ? 1 : 0
                        }
                }
            return storage.put(requestUrl, JSON.stringify(data))
                .done(function (response) {
                    console.log(response);
                })
                .fail(function (response) {
                    console.log(response);
                });
        }
    });
});
